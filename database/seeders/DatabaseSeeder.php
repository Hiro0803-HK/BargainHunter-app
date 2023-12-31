<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // CategiesTableSeederファイルをシーディングの対象にする
        //$this->call(CategoriesTableSeeder::class);

        // AuthorsTableSeederファイルをシーディングの対象にする
        //$this->call(AuthorsTableSeeder::class);

        $this->call([
            AuthorsTableSeeder::class,
            BooksTableSeeder::class,
            AuthorBookTableSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
