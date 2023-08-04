<?php

namespace Database\Seeders;

use App\Models\Restdata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Restdata([
            'message' => 'Google Japan',
            'url' => 'https://www.google.co.jp',
        ]))->save();
        (new Restdata([
            'message' => 'Yahoo Japan',
            'url' => 'https://www.yahoo.co.jp/',
        ]))->save();
        (new Restdata([
            'message' => 'MSN Japan',
            'url' => 'https://www.msn.com/ja-jp',
        ]))->save();
    }
}
