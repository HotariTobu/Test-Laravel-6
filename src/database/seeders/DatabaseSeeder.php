<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Mime\BodyRendererInterface;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(PeopleTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
        $this->call(RestdataTableSeeder::class);

        $this->call(TasksTableSeeder::class);
    }
}
