<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = DB::table('people');

        $table->insert([
            'name' => '山田太郎',
            'mail' => 'taro@yamada',
            'age' => 35,
        ]);
        $table->insert([
            'name' => '田中花子',
            'mail' => 'hanako@flower',
            'age' => 24,
        ]);
        $table->insert([
            'name' => '鈴木さちこ',
            'mail' => 'sachico@happy',
            'age' => 47,
        ]);
        $table->insert([
            'name' => '斉藤洋子',
            'mail' => 'yoko@saito',
            'age' => 36,
        ]);
        $table->insert([
            'name' => 'ロキい',
            'mail' => 'rokey@rororo',
            'age' => 100,
        ]);
        $table->insert([
            'name' => 'サブロー',
            'mail' => 'low@sub',
            'age' => 55,
        ]);
        $table->insert([
            'name' => '佐藤苺',
            'mail' => 'strawberry@sato',
            'age' => 3,
        ]);
        $table->insert([
            'name' => '遠藤裕翔',
            'mail' => 'yuto@end',
            'age' => 16,
        ]);
    }
}
