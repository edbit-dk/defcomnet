<?php

namespace App\File;

use App\AppController;

use App\File\FileService as File;

use App\User\UserService as User;
use App\Host\HostService as Host;

class FileController extends AppController
{

    public function files()
    {
       $files = Host::data()->files()->get();

        // Loop through each top-level file
        foreach ($files as $file) {
            echo "$file->filename\n";
        }
    }

    public function ls()
    {
        return $this->files(); 
    }


    public function cat()
    {
        $file = Host::data()->file($$this->request[0]);

        if($file) {
            echo $file->content;
        } else {
            echo 'ERROR: UNKNOWN FILE';
        }
    }

    public function open()
    {
        return File::open($this->request[0], Host::data()->id);
    }

    public function echo()
    {
        $data = request()->get('data');

        $input = explode('>', $data);

        $file_content = str_replace("'", '', trim($input[0]));
        $file_name = trim($input[1]);

        File::create(
            User::data()->id, 
            Host::data()->id,
            0,
            $file_name,
            $file_content
        );
    }

    public function ftp()
    {
       echo ftp_transfer('test.txt', 'Hello World', 'put');
    }

}