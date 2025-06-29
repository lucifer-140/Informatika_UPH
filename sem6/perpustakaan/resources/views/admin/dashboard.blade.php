@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-gray-800 to-indigo-900 text-white">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-indigo-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-slate-300 rounded-full animate-float-slow"></div>
            <div class="absolute bottom-32 right-1/3 w-20 h-20 bg-white rounded-full animate-float"></div>
        </div>

        <!-- Admin Header -->
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
                                        Admin Command Center 🛡️
                                    </h1>
                                    <p class="text-xl text-indigo-100">Complete oversight of your library system</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $totalBooks }}</div>
                                <div class="text-indigo-200 text-sm">Total Books</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $totalUsers }}</div>
                                <div class="text-indigo-200 text-sm">Total Users</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="rgb(249 250 251)" stroke="white"/>
            </svg>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Enhanced Statistics Cards -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Library Statistics
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Books Card -->
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300 stat-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold">{{ $totalBooks }}</div>
                                <div class="text-blue-100 text-sm">+12 this month</div>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold">Total Books</h3>
                        <p class="text-blue-100 text-sm">Complete library catalog</p>
                    </div>

                    <!-- Total Users Card -->
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300 stat-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 4.16753C11.4777 3.59208 12.109 3.18484 12.81 3C13.5109 2.81516 14.2482 2.86148 14.9237 3.1328C15.5992 3.40412 16.181 3.88757 16.5915 4.51882C17.0021 5.15008 17.222 5.89921 17.222 6.66653C17.222 7.43385 17.0021 8.18298 16.5915 8.81423C16.181 9.44549 15.5992 9.92894 14.9237 10.2003C14.2482 10.4716 13.5109 10.5179 12.81 10.3331C12.109 10.1482 11.4777 9.74098 11 9.16553M13.6667 19.8888H3V18.9443C3 17.4414 3.5619 16.0001 4.5621 14.9374C5.56229 13.8747 6.91885 13.2776 8.33333 13.2776C9.74782 13.2776 11.1044 13.8747 12.1046 14.9374C13.1048 16.0001 13.6667 17.4414 13.6667 18.9443V19.8888ZM13.6667 19.8888H19V18.9443C19.0001 17.9495 18.7538 16.9722 18.2858 16.1107C17.8177 15.2491 17.1445 14.5337 16.3337 14.0362C15.5229 13.5388 14.6031 13.2769 13.6669 13.2768C12.7306 13.2768 11.8108 13.5386 11 14.036" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="9" cy="7" r="3" stroke="white" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold">{{ $totalUsers }}</div>
                                <div class="text-green-100 text-sm">+5 this week</div>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold">Total Users</h3>
                        <p class="text-green-100 text-sm">Registered members</p>
                    </div>

                    <!-- Active Loans Card -->
                    <a href="{{ route('admin.loans.index') }}" class="bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-6 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300 block stat-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold">{{ $activeLoans }}</div>
                                <div class="text-yellow-100 text-sm">Currently borrowed</div>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold">Active Loans</h3>
                        <p class="text-yellow-100 text-sm">Click to manage</p>
                    </a>

                    <!-- System Health Card -->
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300 stat-card">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold">98%</div>
                                <div class="text-purple-100 text-sm">System uptime</div>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold">System Health</h3>
                        <p class="text-purple-100 text-sm">All systems operational</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Panel -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Quick Actions
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Manage Books -->
                    <a href="{{ route('admin.books.index') }}" class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 transform hover:scale-105">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Manage Books</h3>
                                <p class="text-gray-600">{{ $totalBooks }} books in catalog</p>
                            </div>
                        </div>
                        <p class="text-gray-700">Add, edit, and organize your library's book collection with advanced management tools.</p>
                        <div class="mt-4 flex items-center text-blue-600 font-medium">
                            <span>Manage Collection</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>

                    <!-- Manage Users -->
                    <a href="{{ route('admin.users.index') }}" class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 transform hover:scale-105">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4.354C12.5374 3.7447 13.2477 3.31351 14.0362 3.11779C14.8247 2.92208 15.6542 2.97112 16.4142 3.2584C17.1741 3.54568 17.8286 4.05757 18.2905 4.72596C18.7524 5.39435 18.9998 6.18754 18.9998 7C18.9998 7.81246 18.7524 8.60565 18.2905 9.27404C17.8286 9.94243 17.1741 10.4543 16.4142 10.7416C15.6542 11.0289 14.8247 11.0779 14.0362 10.8822C13.2477 10.6865 12.5374 10.2553 12 9.646M15 21H3V20C3 18.4087 3.63214 16.8826 4.75736 15.7574C5.88258 14.6321 7.4087 14 9 14C10.5913 14 12.1174 14.6321 13.2426 15.7574C14.3679 16.8826 15 18.4087 15 20V21ZM15 21H21V20C21.0001 18.9467 20.723 17.9119 20.1965 16.9997C19.6699 16.0875 18.9125 15.3299 18.0004 14.8032C17.0882 14.2765 16.0535 13.9992 15.0002 13.9992C13.9469 13.9991 12.9122 14.2764 12 14.803" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="9" cy="7" r="3" stroke="white" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors">Manage Users</h3>
                                <p class="text-gray-600">{{ $totalUsers }} registered users</p>
                            </div>
                        </div>
                        <p class="text-gray-700">View user profiles, manage permissions, and oversee member activities and roles.</p>
                        <div class="mt-4 flex items-center text-green-600 font-medium">
                            <span>Manage Members</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>

                    <!-- System Reports -->
                    <a href="{{ route('admin.reports.index') }}" class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 transform hover:scale-105">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">System Reports</h3>
                                <p class="text-gray-600">Analytics & insights</p>
                            </div>
                        </div>
                        <p class="text-gray-700">Generate detailed reports on library usage, popular books, and user engagement metrics.</p>
                        <div class="mt-4 flex items-center text-purple-600 font-medium">
                            <span>View Reports</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recently Added Books -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Recently Added Books
                        </h3>
                        <a href="{{ route('admin.books.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
                    </div>

                    <div class="space-y-4">
                        @forelse($recentBooks as $index => $book)
                            <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl hover:from-blue-100 hover:to-indigo-100 transition-all duration-300 book-item" style="animation-delay: {{ $index * 0.1 }}s">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900">{{ $book->title }}</p>
                                    <p class="text-sm text-gray-600">by {{ $book->author }}</p>
                                    <p class="text-xs text-blue-600 font-medium">{{ $book->category }}</p>
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $book->created_at->diffForHumans() }}
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                </svg>
                                <p class="text-gray-500">No books have been added yet.</p>
                                <a href="{{ route('admin.books.create') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Add your first book</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Recently Registered Users -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            New Members
                        </h3>
                        <a href="{{ route('admin.users.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">View All</a>
                    </div>

                    <div class="space-y-4">
                        @forelse($recentUsers as $index => $user)
                            <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl hover:from-green-100 hover:to-emerald-100 transition-all duration-300 user-item" style="animation-delay: {{ $index * 0.1 }}s">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center text-white font-bold">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                    <p class="text-xs text-green-600 font-medium">Member</p>
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $user->created_at->diffForHumans() }}
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <p class="text-gray-500">No new users have registered.</p>
                                <p class="text-gray-400 text-sm">User registrations will appear here</p>
                            </div>
                        @endforelse
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

        .stat-card, .book-item, .user-item {
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

        document.querySelectorAll('.stat-card, .book-item, .user-item').forEach(element => {
            observer.observe(element);
        });
    </script>
@endsection
