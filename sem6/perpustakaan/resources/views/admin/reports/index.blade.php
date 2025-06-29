@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-900 text-white mb-8">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-indigo-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-purple-300 rounded-full animate-float-slow"></div>
            <div class="absolute bottom-32 right-1/3 w-20 h-20 bg-white rounded-full animate-float"></div>
        </div>

        <!-- Header Content -->
        <div class="relative z-10 px-4 py-16">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- Title Section -->
                    <div class="lg:col-span-8">
                        <div class="parallax-content" data-speed="0.3">
                            <div class="flex items-center space-x-6 mb-6">
                                <div class="w-20 h-20 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full flex items-center justify-center shadow-2xl">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-4xl lg:text-5xl font-bold tracking-tight mb-2 bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent">
                                        📊 System Reports & Analytics
                                    </h1>
                                    <p class="text-xl text-indigo-100">Comprehensive insights into library performance and user engagement</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $borrowsLast7Days }}</div>
                                <div class="text-indigo-200 text-sm">7-Day Borrows</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $borrowsLast30Days }}</div>
                                <div class="text-indigo-200 text-sm">30-Day Borrows</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ count($mostActiveUsers) }}</div>
                                <div class="text-indigo-200 text-sm">Active Users</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ count($mostPopularBooks) }}</div>
                                <div class="text-indigo-200 text-sm">Popular Books</div>
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

    <!-- Main Content -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Navigation & Controls -->
            <div class="mb-12">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('admin.dashboard') }}"
                               class="flex items-center space-x-2 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                <span>Back to Dashboard</span>
                            </a>
                        </div>

                        <!-- Time Period Filters -->
                        <div class="flex items-center space-x-3">
                            <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                </svg>
                                Filters:
                            </h2>
                            <div class="flex flex-wrap gap-2">
                                <button class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-colors duration-200 font-medium active-filter">Last 7 Days</button>
                                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">Last 30 Days</button>
                                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">Last 3 Months</button>
                                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">This Year</button>
                            </div>

                            <button onclick="exportReports()" class="flex items-center space-x-2 bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-4 py-2 rounded-lg hover:from-indigo-600 hover:to-purple-600 transition-all duration-300 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Export</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics Dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Borrows Last 7 Days -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium bg-white/20 px-3 py-1 rounded-full">7 Days</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Recent Borrows</h3>
                        <p class="text-4xl font-bold">{{ $borrowsLast7Days }}</p>
                        <p class="text-sm text-blue-100 mt-2">+12% from last week</p>
                    </div>
                </div>

                <!-- Borrows Last 30 Days -->
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium bg-white/20 px-3 py-1 rounded-full">30 Days</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Monthly Borrows</h3>
                        <p class="text-4xl font-bold">{{ $borrowsLast30Days }}</p>
                        <p class="text-sm text-emerald-100 mt-2">+8% from last month</p>
                    </div>
                </div>

                <!-- Active Users -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium bg-white/20 px-3 py-1 rounded-full">Active</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Active Users</h3>
                        <p class="text-4xl font-bold">{{ count($mostActiveUsers) }}</p>
                        <p class="text-sm text-purple-100 mt-2">Top borrowers</p>
                    </div>
                </div>

                <!-- Popular Books -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium bg-white/20 px-3 py-1 rounded-full">Trending</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Popular Books</h3>
                        <p class="text-4xl font-bold">{{ count($mostPopularBooks) }}</p>
                        <p class="text-sm text-orange-100 mt-2">Top performers</p>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Borrowing Trends Chart -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            Borrowing Trends
                        </h3>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">Weekly</span>
                        </div>
                    </div>
                    <div class="h-64 bg-gradient-to-t from-blue-50 to-transparent rounded-xl flex items-end justify-center">
                        <div class="text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <p class="font-medium">Interactive Chart</p>
                            <p class="text-sm">Chart.js integration recommended</p>
                        </div>
                    </div>
                </div>

                <!-- Category Distribution -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            Category Distribution
                        </h3>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">All Time</span>
                        </div>
                    </div>
                    <div class="h-64 bg-gradient-to-t from-purple-50 to-transparent rounded-xl flex items-center justify-center">
                        <div class="text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            </svg>
                            <p class="font-medium">Pie Chart</p>
                            <p class="text-sm">Book category breakdown</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Reports -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                <!-- Most Popular Books -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                                Top 10 Most Popular Books
                            </h3>
                            <span class="px-3 py-1 bg-white/20 rounded-full text-sm font-medium">Trending</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @forelse ($mostPopularBooks as $index => $book)
                                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center text-white font-bold text-lg">
                                            #{{ $index + 1 }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 truncate">{{ $book->title }}</h4>
                                        <p class="text-sm text-gray-600 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            {{ $book->author }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-right">
                                        <div class="text-2xl font-bold text-orange-600">{{ $book->borrow_count }}</div>
                                        <div class="text-xs text-gray-500 uppercase tracking-wide">Borrows</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Borrowing Data</h3>
                                    <p class="text-gray-500">No books have been borrowed yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Most Active Users -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Top 10 Most Active Users
                            </h3>
                            <span class="px-3 py-1 bg-white/20 rounded-full text-sm font-medium">Active</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @forelse ($mostActiveUsers as $index => $user)
                                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-xl flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 truncate">{{ $user->name }}</h4>
                                        <p class="text-sm text-gray-600 flex items-center gap-1 truncate">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-right">
                                        <div class="text-2xl font-bold text-blue-600">{{ $user->borrow_count }}</div>
                                        <div class="text-xs text-gray-500 uppercase tracking-wide">Borrows</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No User Activity</h3>
                                    <p class="text-gray-500">No user borrowing activity recorded yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Insights -->
            <div class="mt-8 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-2xl p-8 text-white">
                <div class="text-center">
                    <h3 class="text-2xl font-bold mb-4">📊 Advanced Analytics Coming Soon</h3>
                    <p class="text-lg text-white/90 mb-6">Get ready for detailed insights including reading patterns, peak usage times, genre preferences, and predictive analytics.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Reading Patterns</span>
                        <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Peak Hours</span>
                        <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Genre Analytics</span>
                        <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Predictive Insights</span>
                    </div>
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

                .parallax-content {
                    transform: translateZ(0);
                }

                /* Scroll-based parallax effect */
                @media (prefers-reduced-motion: no-preference) {
                    .parallax-content {
                        will-change: transform;
                    }
                }

                .active-filter {
                    background-color: rgb(199 210 254) !important;
                    color: rgb(67 56 202) !important;
                }
            </style>

            <!-- Enhanced JavaScript -->
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

                // Filter functionality
                document.querySelectorAll('button').forEach(button => {
                    if (button.textContent.includes('Days') || button.textContent.includes('Months') || button.textContent.includes('Year')) {
                        button.addEventListener('click', function() {
                            // Remove active class from all filter buttons
                            document.querySelectorAll('.active-filter').forEach(btn => {
                                btn.classList.remove('active-filter', 'bg-indigo-100', 'text-indigo-700');
                                btn.classList.add('bg-gray-100', 'text-gray-700');
                            });

                            // Add active class to clicked button
                            this.classList.add('active-filter', 'bg-indigo-100', 'text-indigo-700');
                            this.classList.remove('bg-gray-100', 'text-gray-700');
                        });
                    }
                });

                // Export functionality
                function exportReports() {
                    // Simulate export functionality
                    const button = event.target.closest('button');
                    const originalText = button.innerHTML;

                    button.innerHTML = `
            <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Exporting...
        `;

                    setTimeout(() => {
                        button.innerHTML = originalText;
                        alert('Reports exported successfully!');
                    }, 2000);
                }
            </script>
@endsection
