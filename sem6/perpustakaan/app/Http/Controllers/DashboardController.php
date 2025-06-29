<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $borrowedBooks = Auth::user()
            ->borrowedBooks()
            ->whereNull('returned_date')
            ->latest('pivot_borrowed_date')
            ->get();

        return view('dashboard', ['borrowedBooks' => $borrowedBooks]);
    }

    public function history()
    {
        $history = Auth::user()
            ->borrowedBooks()
            ->orderBy('pivot_borrowed_date', 'desc')
            ->get();

        return view('history', ['history' => $history]);
    }
}
