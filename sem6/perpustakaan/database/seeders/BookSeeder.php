<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('book_user')->truncate();
        DB::table('books')->truncate();

        Schema::enableForeignKeyConstraints();


        Book::create([
            'title' => 'The Lord of the Rings',
            'author' => 'J.R.R. Tolkien',
            'published_year' => 1954,
            'category' => 'Fantasy',
            'isbn' => '978-0618640157',
            'excerpt' => 'A young hobbit, Frodo Baggins, inherits a ring of immense power and must journey across Middle-earth to destroy it in the fires of Mount Doom.',
            'cover_image_path' => 'book-covers/The Lord of the Rings_J.R.R. Tolkien.jpg'
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'published_year' => 1960,
            'category' => 'Classic',
            'isbn' => '978-0446310789',
            'excerpt' => 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it.',
            'cover_image_path' => 'book-covers/To Kill a Mockingbird_Harper Lee.jpg'
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'published_year' => 1949,
            'category' => 'Dystopian',
            'isbn' => '978-0451524935',
            'excerpt' => 'A startlingly original and haunting novel that creates an imaginary world that is completely convincing, from the first sentence to the last four words.',
            'cover_image_path' => 'book-covers/1984_George Orwell.png'
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'category' => 'Classic',
            'isbn' => '978-0743273565',
            'excerpt' => 'A novel about the American dream, the Jazz Age, and the destructive power of wealth and illusion.',
            'cover_image_path' => 'book-covers/The Great Gatsby_F. Scott Fitzgerald.jpg'
        ]);

        Book::create([
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'published_year' => 1965,
            'category' => 'Science Fiction',
            'isbn' => '978-0441013593',
            'excerpt' => 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange.',
            'cover_image_path' => 'book-covers/Dune_Frank Herbert.jpg'
        ]);

        Book::create([
            'title' => 'The Hitchhiker\'s Guide to the Galaxy',
            'author' => 'Douglas Adams',
            'published_year' => 1979,
            'category' => 'Science Fiction',
            'isbn' => '978-0345391803',
            'excerpt' => 'Seconds before the Earth is demolished to make way for a galactic freeway, Arthur Dent is plucked off the planet by his friend Ford Prefect, a researcher for the revised edition of The Hitchhiker\'s Guide to the Galaxy.',
            'cover_image_path' => 'book-covers/The Hitchhiker\'s Guide to the Galaxy_Douglas Adams.jpg'
        ]);

        Book::create([
            'title' => 'Sapiens: A Brief History of Humankind',
            'author' => 'Yuval Noah Harari',
            'published_year' => 2011,
            'category' => 'History',
            'isbn' => '978-0062316097',
            'excerpt' => 'A groundbreaking narrative of humanity’s creation and evolution—a #1 international bestseller that explores the ways in which biology and history have defined us and enhanced our understanding of what it means to be “human.”',
            'cover_image_path' => 'book-covers/Sapiens A Brief History of Humankind_Yuval Noah Harari.jpg'
        ]);

        Book::create([
            'title' => 'The Da Vinci Code',
            'author' => 'Dan Brown',
            'published_year' => 2003,
            'category' => 'Mystery',
            'isbn' => '978-0307474278',
            'excerpt' => 'A murder inside the Louvre, and clues in Da Vinci paintings, lead to the discovery of a religious mystery protected by a secret society for two thousand years, which could shake the foundations of Christianity.',
            'cover_image_path' => 'book-covers/The Da Vinci Code_Dan Brown.jpg'
        ]);

        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'published_year' => 2018,
            'category' => 'Self-Help',
            'isbn' => '978-0735211292',
            'excerpt' => 'An easy & proven way to build good habits & break bad ones. Tiny Changes, Remarkable Results.',
            'cover_image_path' => 'book-covers/Atomic Habits_James Clear.jpg'
        ]);

        Book::create([
            'title' => 'Clean Code: A Handbook of Agile Software Craftsmanship',
            'author' => 'Robert C. Martin',
            'published_year' => 2008,
            'category' => 'Technology',
            'isbn' => '978-0132350884',
            'excerpt' => 'Even a bad code can function. But if code isn’t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code.',
            'cover_image_path' => 'book-covers/Clean Code_Robert C. Martin.jpg'
        ]);
    }
}
