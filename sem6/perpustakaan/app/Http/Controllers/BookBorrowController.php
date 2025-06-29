<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class BookBorrowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the borrowing of a book by the authenticated user.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function borrow(Book $book)
    {
        $user = Auth::user();

        $isAvailable = !$book->borrowingUsers()->whereNull('returned_date')->exists();

        if (!$isAvailable) {
            return back()->with('error', 'This book is already borrowed by someone else.');
        }

        $borrowDate = Carbon::now();
        $dueDate = $borrowDate->copy()->addDays(14);

        $user->borrowedBooks()->attach($book->id, [
            'borrowed_date' => $borrowDate,
            'due_date' => $dueDate,
        ]);

        return back()->with('success', 'You have successfully borrowed the book! It is due on ' . $dueDate->format('F j, Y') . '.');
    }

    /**
     * Handle the returning of a book by the authenticated user.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function returnBook(Book $book)
    {
        $user = Auth::user();


        $borrowRecord = $user->borrowedBooks()
            ->where('book_id', $book->id)
            ->whereNull('returned_date')
            ->first();

        if (!$borrowRecord) {
            return back()->with('error', 'You cannot return a book you have not borrowed.');
        }

        $user->borrowedBooks()->updateExistingPivot($book->id, [
            'returned_date' => Carbon::now()
        ]);

        return back()->with('success', 'You have successfully returned the book!');
    }
}
