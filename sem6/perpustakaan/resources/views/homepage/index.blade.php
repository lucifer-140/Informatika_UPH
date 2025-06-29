@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-blue-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-indigo-300 rounded-full animate-float-slow"></div>
            <div class="absolute bottom-32 right-1/3 w-20 h-20 bg-white rounded-full animate-float"></div>
        </div>

        <!-- Parallax Content -->
        <div class="relative z-10 px-4 py-24 sm:py-32">
            <div class="max-w-7xl mx-auto text-center">
                <div class="parallax-content" data-speed="0.5">
                    <h1 class="text-6xl sm:text-7xl font-bold tracking-tight mb-6 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                        Discover Your Next
                        <span class="block text-yellow-300">Great Read</span>
                    </h1>
                    <p class="text-xl sm:text-2xl text-blue-100 max-w-3xl mx-auto mb-8 leading-relaxed">
                        Explore our curated collection of <span class="font-semibold text-yellow-300">{{ $books->total() ?? 0 }}</span> books and embark on countless adventures
                    </p>
                </div>

                <!-- Floating Book Icons -->
                <div class="absolute inset-0 pointer-events-none">
                    <svg class="absolute top-1/4 left-1/4 w-8 h-8 text-blue-300 animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <svg class="absolute top-1/3 right-1/4 w-6 h-6 text-yellow-300 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <svg class="absolute bottom-1/3 left-1/3 w-10 h-10 text-indigo-300 animate-spin-slow" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120 960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="rgb(249 250 251)"/>
            </svg>
        </div>
    </div>

    <!-- Search Section with Parallax -->
    <div class="relative bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Floating Search Card -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 transform rotate-1 rounded-2xl opacity-10"></div>
                <div class="relative bg-white p-8 rounded-2xl shadow-2xl border border-gray-100 transform hover:scale-105 transition-transform duration-300">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Find Your Perfect Book</h2>
                        <p class="text-gray-600">Search through our extensive collection</p>
                    </div>

                    <form action="{{ route('homepage.index') }}" method="GET" class="space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-end">
                            <!-- Enhanced Search Input -->
                            <div class="lg:col-span-6">
                                <label for="search" class="block text-sm font-semibold text-gray-700 mb-3">Search Books</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                                           placeholder="Search by title, author, or ISBN..."
                                           class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-lg">
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="lg:col-span-3">
                                <label for="category" class="block text-sm font-semibold text-gray-700 mb-3">Category</label>
                                <select name="category" id="category"
                                        class="block w-full px-4 py-4 border-2 border-gray-200 bg-white rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-lg">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category }}" {{ request('category') == $category->category ? 'selected' : '' }}>
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Action Buttons -->
                            <div class="lg:col-span-3 flex space-x-3">
                                <a href="{{ route('homepage.index') }}"
                                   class="flex-1 px-6 py-4 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 text-center font-semibold transform hover:scale-105">
                                    Reset
                                </a>
                                <button type="submit"
                                        class="flex-1 px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 font-semibold shadow-lg transform hover:scale-105">
                                    Search
                                </button>
                            </div>
                        </div>

                        <!-- Quick Filters with Animation -->
                        <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-100">
                            <span class="text-sm font-semibold text-gray-600 mr-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Quick filters:
                            </span>
                            <a href="{{ route('homepage.index', ['category' => 'Fiction']) }}"
                               class="px-4 py-2 text-sm bg-gradient-to-r from-blue-50 to-blue-100 text-blue-700 rounded-full hover:from-blue-100 hover:to-blue-200 transition-all duration-300 transform hover:scale-105 shadow-sm">
                                📚 Fiction
                            </a>
                            <a href="{{ route('homepage.index', ['category' => 'Non-Fiction']) }}"
                               class="px-4 py-2 text-sm bg-gradient-to-r from-green-50 to-green-100 text-green-700 rounded-full hover:from-green-100 hover:to-green-200 transition-all duration-300 transform hover:scale-105 shadow-sm">
                                📖 Non-Fiction
                            </a>
                            <a href="{{ route('homepage.index', ['category' => 'Science']) }}"
                               class="px-4 py-2 text-sm bg-gradient-to-r from-purple-50 to-purple-100 text-purple-700 rounded-full hover:from-purple-100 hover:to-purple-200 transition-all duration-300 transform hover:scale-105 shadow-sm">
                                🔬 Science
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Results Summary -->
            @if($books->count())
                <div class="flex justify-between items-center mb-12 p-6 bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl">
                    <div class="text-gray-700">
                        <span class="text-2xl font-bold text-blue-600">{{ $books->total() }}</span> books found
                        @if(request('search'))
                            for "<span class="font-semibold text-gray-900">{{ request('search') }}</span>"
                        @endif
                        <div class="text-sm text-gray-500 mt-1">
                            Showing {{ $books->firstItem() }} - {{ $books->lastItem() }} results
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <label for="sort" class="text-sm font-medium text-gray-600">Sort by:</label>
                        <select name="sort" id="sort"
                                class="text-sm border-2 border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            <option value="title">📚 Title</option>
                            <option value="author">✍️ Author</option>
                            <option value="newest">🆕 Newest First</option>
                        </select>
                    </div>
                </div>
            @endif

            <!-- Enhanced Book Grid with Stagger Animation -->
            @if($books->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach ($books as $index => $book)
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl overflow-hidden transform hover:-translate-y-2 transition-all duration-500 border border-gray-100 book-card"
                             style="animation-delay: {{ $index * 0.1 }}s">

                            <!-- Book Cover with Image Support -->
                            <div class="aspect-[3/4] bg-gradient-to-br from-blue-100 via-indigo-50 to-purple-100 relative overflow-hidden group-hover:scale-105 transition-transform duration-500">
                                @if ($book->cover_image_path)
                                    <img src="{{ asset('storage/' . $book->cover_image_path) }}"
                                         alt="Cover for {{ $book->title }}"
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                    <!-- Book Icon with Animation -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center p-6 transform group-hover:scale-110 transition-transform duration-300">
                                            <div class="relative">
                                                <svg class="w-16 h-16 text-blue-400 mx-auto mb-3 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                                <!-- Floating sparkles -->
                                                <div class="absolute -top-2 -right-2 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                                                <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                            </div>
                                            <p class="text-sm text-blue-600 font-semibold">{{ $book->category }}</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Status Badges -->
                                <div class="absolute top-4 right-4 flex flex-col space-y-2">

                                    <?php
                                        $isBorrowed = $book->borrowingUsers()->whereNull('returned_date')->exists();
                                    ?>
                                    @if($isBorrowed)
                                        <span class="px-3 py-1 text-xs font-bold bg-red-500 text-white rounded-full shadow-lg animate-pulse">
                                            Borrowed
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-bold bg-green-500 text-white rounded-full shadow-lg animate-pulse">
                                            Available
                                        </span>
                                    @endif
                                </div>

                                <!-- Category Badge for Images -->
                                @if ($book->cover_image_path)
                                    <div class="absolute bottom-4 left-4">
                                        <span class="px-3 py-1 text-xs font-bold bg-black/60 text-white rounded-full backdrop-blur-sm">
                                            {{ $book->category }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Book Details -->
                            <div class="p-6 bg-gradient-to-b from-white to-gray-50">
                                <div class="mb-4">
                                    <h3 class="text-xl font-bold text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300"
                                        title="{{ $book->title }}">
                                        {{ $book->title }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-2 font-medium">by {{ $book->author }}</p>
                                </div>

                                <p class="text-gray-700 text-sm line-clamp-3 mb-6 leading-relaxed">{{ $book->excerpt }}</p>

                                <!-- Action Buttons -->
                                <div class="flex space-x-3">
                                    <a href="{{ route('homepage.book', $book) }}"
                                       class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center py-3 px-4 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 font-semibold text-sm shadow-lg transform hover:scale-105">
                                        📖 View Details
                                    </a>
                                    <button class="p-3 text-gray-400 hover:text-red-500 transition-all duration-300 transform hover:scale-110 rounded-xl hover:bg-red-50"
                                            title="Add to favorites">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Enhanced Pagination -->
                <div class="mt-16 flex justify-center">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-4">
                        {{ $books->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <!-- Enhanced Empty State -->
                <div class="text-center bg-gradient-to-br from-blue-50 to-indigo-100 p-20 rounded-3xl shadow-xl border border-blue-200">
                    <div class="max-w-md mx-auto">
                        <div class="relative mb-8">
                            <svg class="w-32 h-32 text-blue-300 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                            </svg>
                            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">No Books Found</h3>
                        <p class="text-gray-600 mb-8 text-lg">We couldn't find any books matching your search. Let's try something different!</p>
                        <div class="space-y-4">
                            <a href="{{ route('homepage.index') }}"
                               class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 font-semibold text-lg shadow-lg transform hover:scale-105">
                                🏠 Browse All Books
                            </a>
                            <p class="text-sm text-gray-500">or try a different search term</p>
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

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
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

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                const speed = element.dataset.speed || 0.5;
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
