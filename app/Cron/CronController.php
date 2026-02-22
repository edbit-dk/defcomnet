<?php

namespace App\Cron;

use ZipArchive;
use Lib\Input;
use App\AppController;
use App\Cron\CronService as Cron;

class CronController extends AppController
{
    public function minify()
    {
        return Cron::minify();
    }

    public function stats()
    {
        return Cron::stats(1);
    }

    public function update()
    {
        $secretKey = config('key');
        $providedKey = Input::get('key'); // Eller $_GET['key']

        if ($providedKey !== $secretKey) {
            die('UNAUTHORIZED!');
        }

        // Definer projektets rodmappe (Vigtigt!)
        $basePath = config('path'); // Juster så den peger på din rod
        $tempZip  = $basePath . '/package.zip';
        
        $repoUser = config('repo_user');
        $repoName = config('repo_name');
        $zipUrl   = "https://github.com/$repoUser/$repoName/archive/refs/heads/main.zip";

        if (copy($zipUrl, $tempZip)) {
            $zip = new ZipArchive;
            if ($zip->open($tempZip) === TRUE) {
                $rootInZip = $zip->getNameIndex(0);

                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $zipEntry = $zip->getNameIndex($i);
                    $relativePath = substr($zipEntry, strlen($rootInZip));

                    if (empty($relativePath)) continue;

                    // Beskyt config-mappen
                    if (strpos($relativePath, 'config/') === 0) continue;

                    $fullPath = $basePath . '/' . $relativePath;

                    if (substr($zipEntry, -1) === '/') {
                        if (!is_dir($fullPath)) mkdir($fullPath, 0755, true);
                    } else {
                        copy("zip://".$tempZip."#".$zipEntry, $fullPath);
                    }
                }
                $zip->close();
                unlink($tempZip);
                return "SYSTEM UPDATED!";
            }
        }
        return "UPDATE FAILED!";
    }



}