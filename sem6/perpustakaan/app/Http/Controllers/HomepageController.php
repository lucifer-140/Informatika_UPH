<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('author', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $books = $query->latest()->paginate(8);

        $categories = Book::select('category')->distinct()->orderBy('category')->get();

        return view('homepage.index', [
            'books' => $books,
            'categories' => $categories
        ]);
    }

    public function book(Book $book)
    {
        return view('homepage.book', ['book' => $book]);
    }
}
