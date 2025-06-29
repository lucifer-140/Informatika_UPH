@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section for Book -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-blue-900 text-white">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-purple-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-indigo-300 rounded-full animate-float-slow"></div>
            <div class="absolute bottom-32 right-1/3 w-20 h-20 bg-white rounded-full animate-float"></div>
        </div>

        <!-- Breadcrumb Navigation -->
        <div class="relative z-10 px-4 pt-8">
            <div class="max-w-7xl mx-auto">
                <nav class="flex items-center space-x-2 text-blue-200">
                    <a href="/" class="flex items-center space-x-1 hover:text-white transition-colors group">
                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Library</span>
                    </a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-yellow-300 font-medium">{{ $book->title }}</span>
                </nav>
            </div>
        </div>

        <!-- Book Hero Content -->
        <div class="relative z-10 px-4 py-16">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <!-- Book Cover Section with Image Support -->
                    <div class="lg:col-span-4">
                        <div class="relative group">
                            <div class="aspect-[3/4] bg-gradient-to-br from-white/20 to-white/5 rounded-2xl shadow-2xl backdrop-blur-sm border border-white/20 overflow-hidden transform group-hover:scale-105 transition-all duration-500">
                                @if ($book->cover_image_path)
                                    <img src="{{ asset('storage/' . $book->cover_image_path) }}"
                                         alt="Cover for {{ $book->title }}"
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

                                    <!-- Book Info Overlay for Images -->
                                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                        <div class="space-y-2">
                                            <p class="text-white/90 font-semibold text-lg">{{ $book->category }}</p>
                                            <p class="text-white/70 text-sm">Published {{ $book->published_year }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center p-8">
                                            <svg class="w-24 h-24 text-white/80 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                            </svg>
                                            <div class="space-y-2">
                                                <p class="text-white/90 font-semibold text-lg">{{ $book->category }}</p>
                                                <p class="text-white/70 text-sm">Published {{ $book->published_year }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Status Badges -->
                                <div class="absolute top-4 right-4 flex flex-col space-y-2">
                                    @php
                                        $isBorrowedByAnyone = $book->borrowingUsers()->whereNull('returned_date')->exists();
                                        $isBorrowedByMe = Auth::check() ? Auth::user()->borrowedBooks()->where('book_id', $book->id)->whereNull('returned_date')->exists() : false;
                                    @endphp

                                    @if($isBorrowedByMe)
                                        <span class="px-3 py-1 text-xs font-bold bg-orange-500 text-white rounded-full shadow-lg animate-pulse">
                                            📖 You're Reading
                                        </span>
                                    @elseif(!$isBorrowedByAnyone)
                                        <span class="px-3 py-1 text-xs font-bold bg-green-500 text-white rounded-full shadow-lg animate-pulse">
                                            ✅ Available
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-bold bg-red-500 text-white rounded-full shadow-lg">
                                            🔒 Borrowed
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Glow effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-blue-500/20 rounded-2xl blur-xl transform scale-110 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                    </div>

                    <!-- Book Details Section -->
                    <div class="lg:col-span-8 space-y-6">
                        <div class="parallax-content" data-speed="0.3">
                            <h1 class="text-5xl lg:text-6xl font-bold tracking-tight mb-4 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                {{ $book->title }}
                            </h1>
                            <p class="text-2xl text-blue-100 mb-6">by <span class="font-semibold text-yellow-300">{{ $book->author }}</span></p>
                        </div>

                        <!-- Book Meta Information -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                                <div class="flex items-center space-x-2 mb-2">
                                    <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-2 9a1 1 0 001 1h8a1 1 0 001-1l-2-9m-6 0V7"></path>
                                    </svg>
                                    <span class="text-white/80 text-sm font-medium">Published</span>
                                </div>
                                <p class="text-white font-semibold">{{ $book->published_year }}</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                                <div class="flex items-center space-x-2 mb-2">
                                    <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span class="text-white/80 text-sm font-medium">Category</span>
                                </div>
                                <p class="text-white font-semibold">{{ $book->category }}</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                                <div class="flex items-center space-x-2 mb-2">
                                    <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="text-white/80 text-sm font-medium">ISBN</span>
                                </div>
                                <p class="text-white font-semibold text-sm">{{ $book->isbn }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="rgb(249 250 251)"/>
            </svg>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Book Description -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900">About This Book</h2>
                        </div>

                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <p class="text-lg">{{ $book->excerpt }}</p>
                        </div>

                        <!-- Additional Book Stats -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl">
                                    <div class="text-2xl font-bold text-blue-600">{{ $book->borrowingUsers()->count() }}</div>
                                    <div class="text-sm text-gray-600">Total Borrows</div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
                                    <div class="text-2xl font-bold text-green-600">
                                        @if($isBorrowedByAnyone)
                                            Borrowed
                                        @else
                                            Available
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-600">Current Status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Panel -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        <!-- Borrow/Return Section -->
                        @auth
                            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                                <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Book Actions
                                </h3>

                                @if ($isBorrowedByMe)
                                    <!-- Return Book -->
                                    <div class="space-y-4">
                                        <div class="bg-orange-50 border border-orange-200 rounded-xl p-4">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-orange-800 font-semibold">Currently Reading</span>
                                            </div>
                                            <p class="text-orange-700 text-sm">You have this book checked out</p>
                                        </div>

                                        <form action="{{ route('books.return', $book) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white font-bold py-4 px-6 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center space-x-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                                </svg>
                                                <span>Return This Book</span>
                                            </button>
                                        </form>
                                    </div>
                                @elseif (!$isBorrowedByAnyone)
                                    <!-- Borrow Book -->
                                    <div class="space-y-4">
                                        <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-green-800 font-semibold">Available Now</span>
                                            </div>
                                            <p class="text-green-700 text-sm">Ready to be borrowed</p>
                                        </div>

                                        <form action="{{ route('books.borrow', $book) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-4 px-6 rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center space-x-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                                <span>Borrow This Book</span>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <!-- Book Unavailable -->
                                    <div class="space-y-4">
                                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                                </svg>
                                                <span class="text-gray-800 font-semibold">Currently Borrowed</span>
                                            </div>
                                            <p class="text-gray-700 text-sm">This book is checked out by another reader</p>
                                        </div>

                                        <div class="w-full bg-gray-200 text-gray-700 font-bold py-4 px-6 rounded-xl text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>Currently Unavailable</span>
                                            </div>
                                        </div>

                                        <button class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5a7.5 7.5 0 00-15 0v5h5l-5 5-5-5h5V7a9.5 9.5 0 0119 0v10z"></path>
                                            </svg>
                                            <span>Add to Wishlist</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Login Required -->
                            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                                <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Account Required
                                </h3>

                                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-4">
                                    <p class="text-blue-800 text-sm">Sign in to borrow books and track your reading progress</p>
                                </div>

                                <div class="space-y-3">
                                    <a href="{{ route('login') }}"
                                       class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 px-6 rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                        <span>Sign In</span>
                                    </a>

                                    <a href="{{ route('register') }}"
                                       class="w-full bg-white text-gray-700 font-semibold py-3 px-6 rounded-xl border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-all duration-300 text-center">
                                        Create Account
                                    </a>
                                </div>
                            </div>
                        @endauth

                        <!-- Quick Actions -->
                        <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <button class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-pink-100 to-pink-200 text-pink-700 py-3 px-4 rounded-xl hover:from-pink-200 hover:to-pink-300 transition-all duration-300 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    <span>Add to Favorites</span>
                                </button>

                                <button class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-green-100 to-green-200 text-green-700 py-3 px-4 rounded-xl hover:from-green-200 hover:to-green-300 transition-all duration-300 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                    <span>Share Book</span>
                                </button>

                                <a href="/" class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 py-3 px-4 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    <span>Back to Library</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS for Animations -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        </div>

        <!-- Custom CSS for Animations -->
        <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float-slow 10s ease-in-out infinite;
        }

        .parallax-content {
            transform: translateZ(0);
        }

        /* Scroll-based parallax effect */
        @media (prefers-reduced-motion: no-preference) {
            .parallax-content {
                will-change: transform;
            }
        }
    </style>

    <!-- Parallax JavaScript -->
    <script>
        // Simple parallax effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax-content');

            parallaxElements.forEach(element => {
                const speed = element.dataset.speed || 0.3;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    </script>
@endsection
