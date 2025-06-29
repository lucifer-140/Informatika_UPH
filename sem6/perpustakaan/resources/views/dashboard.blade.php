@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-emerald-900 via-teal-800 to-blue-900 text-white">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-emerald-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-teal-300 rounded-full animate-float-slow"></div>
            <div class="absolute bottom-32 right-1/3 w-20 h-20 bg-white rounded-full animate-float"></div>
        </div>

        <!-- Welcome Content -->
        <div class="relative z-10 px-4 py-16">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- User Avatar & Welcome -->
                    <div class="lg:col-span-8">
                        <div class="parallax-content" data-speed="0.3">
                            <div class="flex items-center space-x-6 mb-6">
                                <div class="relative">
                                    <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow-2xl">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-yellow-800" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h1 class="text-4xl lg:text-5xl font-bold tracking-tight mb-2 bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent">
                                        Welcome back, {{ Auth::user()->name }}! 👋
                                    </h1>
                                    <p class="text-xl text-emerald-100">Ready to continue your reading journey?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $borrowedBooks->count() }}</div>
                                <div class="text-emerald-200 text-sm">Currently Reading</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ Auth::user()->borrowedBooks()->count() }}</div>
                                <div class="text-emerald-200 text-sm">Total Borrowed</div>
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

    <!-- Main Dashboard Content -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Quick Actions Bar -->
            <div class="mb-12">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Quick Actions</h2>
                            <p class="text-gray-600 text-sm">Manage your library experience</p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="/"
                               class="flex items-center space-x-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg transform hover:scale-105 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span>Browse Books</span>
                            </a>
                            <a href="{{ route('dashboard.history') }}"
                               class="flex items-center space-x-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 shadow-lg transform hover:scale-105 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>View History</span>
                            </a>
                            <button class="flex items-center space-x-2 bg-gradient-to-r from-pink-500 to-pink-600 text-white px-6 py-3 rounded-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-300 shadow-lg transform hover:scale-105 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span>My Favorites</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Currently Reading Section -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                            <svg class="w-8 h-8 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                            </svg>
                            Currently Reading
                        </h2>
                        <p class="text-gray-600">Books you have checked out</p>
                    </div>
                    @if($borrowedBooks->count() > 0)
                        <div class="text-sm text-gray-500">
                            {{ $borrowedBooks->count() }} {{ $borrowedBooks->count() === 1 ? 'book' : 'books' }}
                        </div>
                    @endif
                </div>

                @if ($borrowedBooks->count() > 0)
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach ($borrowedBooks as $index => $book)
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 transform hover:scale-105 transition-all duration-300 book-card"
                                 style="animation-delay: {{ $index * 0.1 }}s">

                                <div class="p-6">
                                    <div class="flex items-start justify-between mb-4">
                                        <!-- Book Info -->
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3 mb-3">
                                                <div class="w-12 h-12 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-xl flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-xl font-bold text-gray-900 hover:text-emerald-600 transition-colors">
                                                        {{ $book->title }}
                                                    </h3>
                                                    <p class="text-gray-600">by {{ $book->author }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status Badge -->
                                        <div class="flex flex-col items-end space-y-2">
                                            @if ($book->pivot->due_date && \Carbon\Carbon::now()->gt($book->pivot->due_date))
                                                <span class="px-3 py-1 text-xs font-bold bg-red-500 text-white rounded-full shadow-lg animate-pulse">
                                                    ⚠️ OVERDUE
                                                </span>
                                            @elseif ($book->pivot->due_date && \Carbon\Carbon::now()->diffInDays($book->pivot->due_date) <= 3)
                                                <span class="px-3 py-1 text-xs font-bold bg-yellow-500 text-white rounded-full shadow-lg">
                                                    ⏰ DUE SOON
                                                </span>
                                            @else
                                                <span class="px-3 py-1 text-xs font-bold bg-green-500 text-white rounded-full shadow-lg">
                                                    ✅ ACTIVE
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Date Information -->
                                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl p-4 mb-4">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-2 9a1 1 0 001 1h8a1 1 0 001-1l-2-9m-6 0V7"></path>
                                                </svg>
                                                <div>
                                                    <div class="font-semibold text-gray-700">Borrowed</div>
                                                    <div class="text-gray-600">{{ \Carbon\Carbon::parse($book->pivot->borrowed_date)->format('M j, Y') }}</div>
                                                </div>
                                            </div>

                                            @if($book->pivot->due_date)
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <div>
                                                        <div class="font-semibold text-gray-700">Due Date</div>
                                                        <div class="text-gray-600">{{ \Carbon\Carbon::parse($book->pivot->due_date)->format('M j, Y') }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        @if($book->pivot->due_date)
                                            @php
                                                $daysLeft = \Carbon\Carbon::now()->diffInDays($book->pivot->due_date, false);
                                            @endphp
                                            <div class="mt-3 pt-3 border-t border-gray-200">
                                                @if($daysLeft < 0)
                                                    <div class="text-red-600 font-semibold text-sm">
                                                        📅 {{ abs($daysLeft) }} {{ abs($daysLeft) === 1 ? 'day' : 'days' }} overdue
                                                    </div>
                                                @elseif($daysLeft === 0)
                                                    <div class="text-orange-600 font-semibold text-sm">
                                                        📅 Due today!
                                                    </div>
                                                @else
                                                    <div class="text-green-600 font-semibold text-sm">
                                                        📅 {{ $daysLeft }} {{ $daysLeft === 1 ? 'day' : 'days' }} remaining
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3">
                                        <form action="{{ route('books.return', $book) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white font-bold py-3 px-4 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                                </svg>
                                                <span>Return Book</span>
                                            </button>
                                        </form>

                                        <a href="{{ route('homepage.book', $book) }}"
                                           class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 font-semibold py-3 px-4 rounded-xl hover:from-blue-200 hover:to-blue-300 transition-all duration-300 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Enhanced Empty State -->
                    <div class="text-center bg-gradient-to-br from-blue-50 to-indigo-100 p-16 rounded-3xl shadow-xl border border-blue-200">
                        <div class="max-w-md mx-auto">
                            <div class="relative mb-8">
                                <svg class="w-32 h-32 text-blue-300 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                </svg>
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">No Books Currently Borrowed</h3>
                            <p class="text-gray-600 mb-8 text-lg">Ready to start your next reading adventure?</p>
                            <div class="space-y-4">
                                <a href="/"
                                   class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 font-semibold text-lg shadow-lg transform hover:scale-105">
                                    🔍 Browse Our Collection
                                </a>
                                <p class="text-sm text-gray-500">Discover thousands of books waiting for you</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Reading Statistics -->
            @if($borrowedBooks->count() > 0)
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Your Reading Stats
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="text-center p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                            <div class="text-3xl font-bold text-blue-600">{{ $borrowedBooks->count() }}</div>
                            <div class="text-blue-700 font-medium">Currently Reading</div>
                        </div>

                        <div class="text-center p-6 bg-gradient-to-r from-green-50 to-green-100 rounded-xl">
                            <div class="text-3xl font-bold text-green-600">
                                {{ $borrowedBooks->where('pivot.due_date', '>', now())->count() }}
                            </div>
                            <div class="text-green-700 font-medium">On Time</div>
                        </div>

                        <div class="text-center p-6 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl">
                            <div class="text-3xl font-bold text-yellow-600">
                                {{ $borrowedBooks->filter(function($book) {
                                    return $book->pivot->due_date && \Carbon\Carbon::now()->diffInDays($book->pivot->due_date) <= 3 && \Carbon\Carbon::now()->lt($book->pivot->due_date);
                                })->count() }}
                            </div>
                            <div class="text-yellow-700 font-medium">Due Soon</div>
                        </div>

                        <div class="text-center p-6 bg-gradient-to-r from-red-50 to-red-100 rounded-xl">
                            <div class="text-3xl font-bold text-red-600">
                                {{ $borrowedBooks->filter(function($book) {
                                    return $book->pivot->due_date && \Carbon\Carbon::now()->gt($book->pivot->due_date);
                                })->count() }}
                            </div>
                            <div class="text-red-700 font-medium">Overdue</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
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

        .book-card {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.book-card').forEach(card => {
            observer.observe(card);
        });
    </script>
@endsection
