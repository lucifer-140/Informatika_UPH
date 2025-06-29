<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $totalBooks = Book::count();
        $totalUsers = User::whereHas('roles', fn($q) => $q->where('name', 'user'))->count(); // Count only 'user' roles
        $activeLoans = DB::table('book_user')->whereNull('returned_date')->count();


        $recentBooks = Book::latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalUsers',
            'activeLoans',
            'recentBooks',
            'recentUsers'
        ));
    }
    public function activeLoans()
    {
        $loans = DB::table('book_user')
            ->join('users', 'book_user.user_id', '=', 'users.id')
            ->join('books', 'book_user.book_id', '=', 'books.id')
            ->whereNull('book_user.returned_date')
            ->select('users.name as user_name', 'books.title as book_title', 'book_user.borrowed_date', 'book_user.due_date')
            ->orderBy('book_user.due_date', 'asc')
            ->paginate(15);

        return view('admin.loans.index', compact('loans'));
    }
}
