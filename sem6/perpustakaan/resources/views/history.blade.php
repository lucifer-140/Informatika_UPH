@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-violet-900 via-purple-800 to-indigo-900 text-white">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-violet-300 rounded-full animate-float-delayed"></div>
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
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-r from-violet-400 to-purple-400 rounded-full flex items-center justify-center shadow-2xl">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-4xl lg:text-5xl font-bold tracking-tight mb-2 bg-gradient-to-r from-white to-violet-200 bg-clip-text text-transparent">
                                        My Reading Journey 📚
                                    </h1>
                                    <p class="text-xl text-violet-100">A complete record of your literary adventures</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $history->count() }}</div>
                                <div class="text-violet-200 text-sm">Total Books</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $history->where('pivot.returned_date', '!=', null)->count() }}</div>
                                <div class="text-violet-200 text-sm">Completed</div>
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
            <!-- Navigation & Filters -->
            <div class="mb-12">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('dashboard') }}"
                               class="flex items-center space-x-2 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:from-gray-200 hover:to-gray-300 transition-all duration-300 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                <span>Back to Dashboard</span>
                            </a>
                        </div>

                        <!-- Filter Options -->
                        <div class="flex items-center space-x-3">
                            <span class="text-sm font-medium text-gray-600">Filter by:</span>
                            <select class="text-sm border-2 border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                                <option value="all">All Books</option>
                                <option value="returned">Returned</option>
                                <option value="borrowed">Currently Borrowed</option>
                                <option value="overdue">Overdue</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reading Statistics Overview -->
            @if($history->count() > 0)
                <div class="mb-12">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Your Reading Statistics
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center p-6 bg-gradient-to-r from-green-50 to-emerald-100 rounded-xl">
                                <div class="text-3xl font-bold text-green-600">{{ $history->where('pivot.returned_date', '!=', null)->count() }}</div>
                                <div class="text-green-700 font-medium">Books Completed</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                                <div class="text-3xl font-bold text-blue-600">{{ $history->whereNull('pivot.returned_date')->count() }}</div>
                                <div class="text-blue-700 font-medium">Currently Reading</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl">
                                <div class="text-3xl font-bold text-yellow-600">
                                    {{ $history->filter(function($record) {
                                        return $record->pivot->due_date && \Carbon\Carbon::now()->gt($record->pivot->due_date) && !$record->pivot->returned_date;
                                    })->count() }}
                                </div>
                                <div class="text-yellow-700 font-medium">Overdue</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl">
                                <div class="text-3xl font-bold text-purple-600">{{ $history->count() }}</div>
                                <div class="text-purple-700 font-medium">Total Borrowed</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- History Records -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-purple-50 to-violet-50 border-b border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                        </svg>
                        Borrowing History
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $history->count() }} {{ $history->count() === 1 ? 'record' : 'records' }} found</p>
                </div>

                @if($history->count() > 0)
                    <!-- Desktop Table View -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Book Details</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Borrowed Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Due Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Returned Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($history as $index => $record)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 history-row" style="animation-delay: {{ $index * 0.05 }}s">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-violet-400 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900">{{ $record->title }}</div>
                                                <div class="text-sm text-gray-600">by {{ $record->author }}</div>
                                                <div class="text-xs text-gray-500">{{ $record->category }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-2 9a1 1 0 001 1h8a1 1 0 001-1l-2-9m-6 0V7"></path>
                                            </svg>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($record->pivot->borrowed_date)->format('M j, Y') }}</div>
                                                <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($record->pivot->borrowed_date)->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($record->pivot->due_date)
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($record->pivot->due_date)->format('M j, Y') }}</div>
                                                    <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($record->pivot->due_date)->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-sm">No due date</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($record->pivot->returned_date)
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($record->pivot->returned_date)->format('M j, Y') }}</div>
                                                    <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($record->pivot->returned_date)->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-sm">Not returned</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($record->pivot->returned_date)
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 shadow-sm">
                                                    ✅ Returned
                                                </span>
                                        @elseif ($record->pivot->due_date && \Carbon\Carbon::now()->gt($record->pivot->due_date))
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 shadow-sm animate-pulse">
                                                    ⚠️ OVERDUE
                                                </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-100 text-blue-800 shadow-sm">
                                                    📖 Reading
                                                </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('homepage.book', $record) }}"
                                           class="text-purple-600 hover:text-purple-900 font-medium text-sm flex items-center space-x-1 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>View</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="lg:hidden">
                        <div class="divide-y divide-gray-200">
                            @foreach ($history as $index => $record)
                                <div class="p-6 history-card" style="animation-delay: {{ $index * 0.1 }}s">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-violet-400 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold text-gray-900">{{ $record->title }}</h3>
                                                <p class="text-gray-600">by {{ $record->author }}</p>
                                                <p class="text-sm text-gray-500">{{ $record->category }}</p>
                                            </div>
                                        </div>

                                        <!-- Status Badge -->
                                        <div>
                                            @if ($record->pivot->returned_date)
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 shadow-sm">
                                                    ✅ Returned
                                                </span>
                                            @elseif ($record->pivot->due_date && \Carbon\Carbon::now()->gt($record->pivot->due_date))
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 shadow-sm animate-pulse">
                                                    ⚠️ OVERDUE
                                                </span>
                                            @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-100 text-blue-800 shadow-sm">
                                                    📖 Reading
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Date Information -->
                                    <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                        <div class="grid grid-cols-1 gap-3 text-sm">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-2 9a1 1 0 001 1h8a1 1 0 001-1l-2-9m-6 0V7"></path>
                                                </svg>
                                                <span class="font-medium text-gray-700">Borrowed:</span>
                                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($record->pivot->borrowed_date)->format('M j, Y') }}</span>
                                            </div>

                                            @if($record->pivot->due_date)
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="font-medium text-gray-700">Due:</span>
                                                    <span class="text-gray-600">{{ \Carbon\Carbon::parse($record->pivot->due_date)->format('M j, Y') }}</span>
                                                </div>
                                            @endif

                                            @if($record->pivot->returned_date)
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="font-medium text-gray-700">Returned:</span>
                                                    <span class="text-gray-600">{{ \Carbon\Carbon::parse($record->pivot->returned_date)->format('M j, Y') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="flex justify-end">
                                        <a href="{{ route('homepage.book', $record) }}"
                                           class="bg-gradient-to-r from-purple-500 to-violet-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-violet-700 transition-all duration-300 font-medium text-sm flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>View Book</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Enhanced Empty State -->
                    <div class="text-center p-16">
                        <div class="max-w-md mx-auto">
                            <div class="relative mb-8">
                                <svg class="w-32 h-32 text-gray-300 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                </svg>
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-purple-400 rounded-full animate-ping"></div>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">No Reading History Yet</h3>
                            <p class="text-gray-600 mb-8 text-lg">Your reading journey starts with your first book!</p>
                            <div class="space-y-4">
                                <a href="/"
                                   class="inline-block bg-gradient-to-r from-purple-600 to-violet-600 text-white px-8 py-4 rounded-xl hover:from-purple-700 hover:to-violet-700 transition-all duration-300 font-semibold text-lg shadow-lg transform hover:scale-105">
                                    🔍 Start Browsing Books
                                </a>
                                <p class="text-sm text-gray-500">Discover your next favorite book</p>
                            </div>
                        </div>
                    </div>
                @endif
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

        .history-row, .history-card {
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

        document.querySelectorAll('.history-row, .history-card').forEach(element => {
            observer.observe(element);
        });

        // Filter functionality
        document.querySelector('select').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('.history-row, .history-card');

            rows.forEach(row => {
                const statusElement = row.querySelector('[class*="bg-green-100"], [class*="bg-red-100"], [class*="bg-blue-100"]');
                if (!statusElement) return;

                const statusText = statusElement.textContent.toLowerCase();
                let shouldShow = true;

                switch(filterValue) {
                    case 'returned':
                        shouldShow = statusText.includes('returned');
                        break;
                    case 'borrowed':
                        shouldShow = statusText.includes('reading');
                        break;
                    case 'overdue':
                        shouldShow = statusText.includes('overdue');
                        break;
                    case 'all':
                    default:
                        shouldShow = true;
                        break;
                }

                row.style.display = shouldShow ? '' : 'none';
            });
        });
    </script>
@endsection
