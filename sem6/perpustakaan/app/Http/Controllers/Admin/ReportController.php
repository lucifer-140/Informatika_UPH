<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function index()
    {
        $mostPopularBooks = DB::table('book_user')
            ->join('books', 'book_user.book_id', '=', 'books.id')
            ->select('books.title', 'books.author', DB::raw('count(book_user.book_id) as borrow_count'))
            ->groupBy('books.title', 'books.author')
            ->orderBy('borrow_count', 'desc')
            ->limit(10)
            ->get();

        $mostActiveUsers = DB::table('book_user')
            ->join('users', 'book_user.user_id', '=', 'users.id')
            ->select('users.name', 'users.email', DB::raw('count(book_user.user_id) as borrow_count'))
            ->groupBy('users.name', 'users.email')
            ->orderBy('borrow_count', 'desc')
            ->limit(10)
            ->get();

        $borrowsLast7Days = DB::table('book_user')->where('borrowed_date', '>=', Carbon::now()->subDays(7))->count();
        $borrowsLast30Days = DB::table('book_user')->where('borrowed_date', '>=', Carbon::now()->subDays(30))->count();

        return view('admin.reports.index', compact(
            'mostPopularBooks',
            'mostActiveUsers',
            'borrowsLast7Days',
            'borrowsLast30Days'
        ));
    }
}
