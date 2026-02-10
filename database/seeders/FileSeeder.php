<?php

namespace DB\Seeders;

use Illuminate\Database\Capsule\Manager as DB;
use DB\Migrations\FileTable;

class FileSeeder extends FileTable
{
    /**
     * Seed the application's database.
     */
    public static function run(): void
    {
        DB::table((new self)->table)->insert([
            ['filename' => 'trace.log'],
            ['filename' => 'config.sys'],
            ['filename' => 'notes.txt']
        ]);
    }

}