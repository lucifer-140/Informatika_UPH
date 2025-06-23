<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'id' => 1,
                'title' => 'Judul 1',
                'author' => 'john doe',
                'published_year' => 2025,
                'category' => 'Fiction',
                'isbn' => '978-1-23456-789-0',
                'excerpt' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => '2025-06-17 18:31:36',
                'updated_at' => '2025-06-17 18:31:39',
            ],
            [
                'id' => 2,
                'title' => 'Judul 2',
                'author' => 'jane doe',
                'published_year' => 2024,
                'category' => 'Science',
                'isbn' => '978-1-23456-789-1',
                'excerpt' => 'dolor sit amet',
                'created_at' => '2024-05-17 12:15:00',
                'updated_at' => '2024-05-17 12:15:00',
            ],
            [
                'id' => 3,
                'title' => 'Judul 3',
                'author' => 'alice smith',
                'published_year' => 2023,
                'category' => 'History',
                'isbn' => '978-1-23456-789-2',
                'excerpt' => 'consectetur adipiscing elit',
                'created_at' => '2023-04-17 10:00:00',
                'updated_at' => '2023-04-17 10:00:00',
            ],
            [
                'id' => 4,
                'title' => 'Judul 4',
                'author' => 'bob johnson',
                'published_year' => 2022,
                'category' => 'Biography',
                'isbn' => '978-1-23456-789-3',
                'excerpt' => 'ut enim ad minim veniam',
                'created_at' => '2022-03-17 09:00:00',
                'updated_at' => '2022-03-17 09:00:00',
            ],
        ]);
    }
}
