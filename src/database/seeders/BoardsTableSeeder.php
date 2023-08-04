<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Board([
            'person_id' => 2,
            'title' => '初めて',
            'message' => '初めまして',
        ]))->save();
        (new Board([
            'person_id' => 1,
            'title' => 'やられた',
            'message' => 'こんにちは',
        ]))->save();
        (new Board([
            'person_id' => 3,
            'title' => 'オッス',
            'message' => 'オラ悟空',
        ]))->save();
        (new Board([
            'person_id' => 4,
            'title' => 'イライラ',
            'message' => 'らいらい',
        ]))->save();
    }
}
