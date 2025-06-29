@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-emerald-900 via-green-800 to-teal-900 text-white mb-8">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-emerald-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-green-300 rounded-full animate-float-slow"></div>
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
                                <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-green-400 rounded-full flex items-center justify-center shadow-2xl">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-4xl lg:text-5xl font-bold tracking-tight mb-2 bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent">
                                        👥 User Management
                                    </h1>
                                    <p class="text-xl text-emerald-100">Manage user accounts and permissions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $users->total() }}</div>
                                <div class="text-emerald-200 text-sm">Total Users</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">
                                    {{ $users->filter(function($user) {
                                        return $user->roles->contains('name', 'admin');
                                    })->count() }}
                                </div>
                                <div class="text-emerald-200 text-sm">Admins</div>
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

            <!-- Navigation & Search -->
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

                        <!-- Search and Filters -->
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" id="userSearch" placeholder="Search users..."
                                       class="pl-10 pr-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300">
                            </div>

                            <select id="roleFilter" class="text-sm border-2 border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                                <option value="all">All Roles</option>
                                <option value="admin">Admins</option>
                                <option value="user">Users</option>
                            </select>

                            <button class="flex items-center space-x-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white px-4 py-2 rounded-lg hover:from-emerald-600 hover:to-green-600 transition-all duration-300 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Export</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Statistics -->
            @if($users->count() > 0)
                <div class="mb-12">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            User Statistics
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                                <div class="text-3xl font-bold text-blue-600">{{ $users->count() }}</div>
                                <div class="text-blue-700 font-medium">Total Users</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-red-50 to-red-100 rounded-xl">
                                <div class="text-3xl font-bold text-red-600">
                                    {{ $users->filter(function($user) {
                                        return $user->roles->contains('name', 'admin');
                                    })->count() }}
                                </div>
                                <div class="text-red-700 font-medium">Administrators</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-green-50 to-green-100 rounded-xl">
                                <div class="text-3xl font-bold text-green-600">
                                    {{ $users->filter(function($user) {
                                        return !$user->roles->contains('name', 'admin');
                                    })->count() }}
                                </div>
                                <div class="text-green-700 font-medium">Regular Users</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl">
                                <div class="text-3xl font-bold text-purple-600">
                                    {{ $users->filter(function($user) {
                                        return $user->created_at->isToday();
                                    })->count() }}
                                </div>
                                <div class="text-purple-700 font-medium">New Today</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Users Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-emerald-50 to-green-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            User Accounts
                        </h3>
                        <div class="text-sm text-gray-600">
                            {{ $users->total() }} {{ $users->total() === 1 ? 'user' : 'users' }} found
                        </div>
                    </div>
                </div>

                @if($users->count() > 0)
                    <!-- Desktop Table View -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">User Details</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Contact</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Roles</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Activity</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $index => $user)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 user-row"
                                    style="animation-delay: {{ $index * 0.05 }}s"
                                    data-role="{{ $user->roles->pluck('name')->implode(',') }}"
                                    data-name="{{ strtolower($user->name) }}"
                                    data-email="{{ strtolower($user->email) }}">

                                    <!-- User Details -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-400 to-green-400 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                                <div class="text-xs text-gray-500">ID: {{ $user->id }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Contact -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $user->email }}</div>
                                                <div class="text-xs text-gray-500">
                                                    @if($user->email_verified_at)
                                                        ✅ Verified
                                                    @else
                                                        ⚠️ Unverified
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Roles -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-wrap gap-1">
                                            @forelse ($user->roles as $role)
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full shadow-sm
                                                        {{ $role->name == 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                        @if($role->name == 'admin')
                                                        🛡️ {{ ucfirst($role->name) }}
                                                    @else
                                                        👤 {{ ucfirst($role->name) }}
                                                    @endif
                                                    </span>
                                            @empty
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        No roles
                                                    </span>
                                            @endforelse
                                        </div>
                                    </td>

                                    <!-- Activity -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <div class="flex items-center space-x-1 mb-1">
                                                <svg class="w-3 h-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                                <span class="text-xs">{{ $user->borrowedBooks()->count() }} books borrowed</span>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Joined {{ $user->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->borrowedBooks()->whereNull('returned_date')->exists())
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-blue-100 text-blue-800 shadow-sm">
                                                    📖 Active Reader
                                                </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 shadow-sm">
                                                    💤 Inactive
                                                </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end items-center space-x-2">
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                               class="text-emerald-600 hover:text-emerald-900 font-medium transition-colors"
                                               title="Edit Roles">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <button class="text-blue-600 hover:text-blue-900 font-medium transition-colors"
                                                    title="View Details">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            @if(!$user->roles->contains('name', 'admin') || $user->roles->count() > 1)
                                                <button class="text-red-600 hover:text-red-900 font-medium transition-colors"
                                                        title="Suspend User">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="lg:hidden divide-y divide-gray-200">
                        @foreach ($users as $index => $user)
                            <div class="p-6 user-card"
                                 style="animation-delay: {{ $index * 0.1 }}s"
                                 data-role="{{ $user->roles->pluck('name')->implode(',') }}"
                                 data-name="{{ strtolower($user->name) }}"
                                 data-email="{{ strtolower($user->email) }}">

                                <div class="flex items-start space-x-4">
                                    <!-- User Avatar -->
                                    <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-green-400 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg flex-shrink-0">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>

                                    <!-- User Info -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $user->name }}</h3>
                                        <p class="text-gray-600 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ $user->email }}
                                        </p>

                                        <!-- Roles -->
                                        <div class="flex flex-wrap gap-1 mb-3">
                                            @forelse ($user->roles as $role)
                                                <span class="px-2 py-1 text-xs font-bold rounded-full
                                                    {{ $role->name == 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                    @if($role->name == 'admin')
                                                        🛡️ {{ ucfirst($role->name) }}
                                                    @else
                                                        👤 {{ ucfirst($role->name) }}
                                                    @endif
                                                </span>
                                            @empty
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    No roles
                                                </span>
                                            @endforelse
                                        </div>

                                        <!-- Activity Info -->
                                        <div class="text-sm text-gray-500 mb-3">
                                            <div>📚 {{ $user->borrowedBooks()->count() }} books borrowed</div>
                                            <div>📅 Joined {{ $user->created_at->diffForHumans() }}</div>
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-3">
                                            @if($user->borrowedBooks()->whereNull('returned_date')->exists())
                                                <span class="px-2 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800">
                                                    📖 Active Reader
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    💤 Inactive
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="mt-4 flex justify-end space-x-3">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="px-3 py-2 text-sm bg-emerald-100 text-emerald-700 rounded-lg hover:bg-emerald-200 transition-colors">
                                        Edit Roles
                                    </a>
                                    <button class="px-3 py-2 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                        View Details
                                    </button>
                                    @if(!$user->roles->contains('name', 'admin') || $user->roles->count() > 1)
                                        <button class="px-3 py-2 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">
                                            Suspend
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        {{ $users->links() }}
                    </div>
                @else
                    <!-- Enhanced Empty State -->
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <div class="relative mb-8">
                                <svg class="w-32 h-32 text-gray-300 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-emerald-400 rounded-full animate-ping"></div>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">No Users Found</h3>
                            <p class="text-gray-600 mb-8 text-lg">No users match your current search criteria.</p>
                            <div class="space-y-4">
                                <button onclick="clearFilters()" class="inline-block bg-gradient-to-r from-emerald-600 to-green-600 text-white px-8 py-4 rounded-xl hover:from-emerald-700 hover:to-green-700 transition-all duration-300 font-semibold text-lg shadow-lg transform hover:scale-105">
                                    🔄 Clear Filters
                                </button>
                                <p class="text-sm text-gray-500">Reset search and filters to view all users</p>
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

        .user-row, .user-card {
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

        document.querySelectorAll('.user-row, .user-card').forEach(element => {
            observer.observe(element);
        });

        // Search functionality
        document.getElementById('userSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterUsers();
        });

        // Role filter functionality
        document.getElementById('roleFilter').addEventListener('change', function() {
            filterUsers();
        });

        function filterUsers() {
            const searchTerm = document.getElementById('userSearch').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value;
            const users = document.querySelectorAll('.user-row, .user-card');

            users.forEach(user => {
                const name = user.dataset.name;
                const email = user.dataset.email;
                const roles = user.dataset.role;

                const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
                const matchesRole = roleFilter === 'all' || roles.includes(roleFilter);

                user.style.display = (matchesSearch && matchesRole) ? '' : 'none';
            });
        }

        function clearFilters() {
            document.getElementById('userSearch').value = '';
            document.getElementById('roleFilter').value = 'all';
            filterUsers();
        }
    </script>
@endsection
