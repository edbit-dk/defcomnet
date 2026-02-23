<?php

namespace DB\Seeders;

use Illuminate\Database\Capsule\Manager as DB;
use DB\Migrations\LevelTable;

class LevelSeeder extends LevelTable
{
    /**
     * Seed the application's database.
     */
    public static function run(): void
    {
        DB::table((new self)->table)->insert([
            ['id' => 1, 'status' => 'BEGINNER', 'level' => 0,'credit' => 1,'min' => 2,'max' => 3],
            ['id' => 2, 'status' => 'NOVICE', 'level' => 15,'credit' => 2,'min' => 4,'max' => 5],
            ['id' => 3, 'status' => 'SKILLED', 'level' => 25,'credit' => 3,'min' => 6,'max' => 8],
            ['id' => 4, 'status' => 'ADVANCED', 'level' => 50,'credit' => 4,'min' => 8,'max' => 10],
            ['id' => 5, 'status' => 'EXPERT', 'level' => 76,'credit' => 5,'min' => 10,'max' => 12],
            ['id' => 6, 'status' => 'MASTER', 'level' => 100,'credit' => 10,'min' => 12,'max' => 15]
        ]);
    }

}