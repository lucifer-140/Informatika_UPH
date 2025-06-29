@extends('layouts.app')

@section('content')
    <!-- Parallax Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-orange-900 via-red-800 to-pink-900 text-white mb-8">
        <!-- Parallax Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-orange-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-red-300 rounded-full animate-float-slow"></div>
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
                                <div class="w-20 h-20 bg-gradient-to-r from-orange-400 to-red-400 rounded-full flex items-center justify-center shadow-2xl">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-4xl lg:text-5xl font-bold tracking-tight mb-2 bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent">
                                        📋 Loan Management
                                    </h1>
                                    <p class="text-xl text-orange-100">Monitor and manage all active book loans</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">{{ $loans->total() }}</div>
                                <div class="text-orange-200 text-sm">Active Loans</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 text-center">
                                <div class="text-2xl font-bold text-white">
                                    {{ $loans->filter(function($loan) {
                                        return $loan->due_date && \Carbon\Carbon::now()->gt($loan->due_date);
                                    })->count() }}
                                </div>
                                <div class="text-orange-200 text-sm">Overdue</div>
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

            <!-- Navigation & Quick Actions -->
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

                        <!-- Filter and Actions -->
                        <div class="flex items-center space-x-3">
                            <select id="statusFilter" class="text-sm border-2 border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all">
                                <option value="all">All Loans</option>
                                <option value="active">Active</option>
                                <option value="overdue">Overdue</option>
                                <option value="due-soon">Due Soon</option>
                            </select>

                            <button class="flex items-center space-x-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-red-600 transition-all duration-300 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Export</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Overview -->
            @if($loans->count() > 0)
                <div class="mb-12">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Loan Statistics
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                                <div class="text-3xl font-bold text-blue-600">{{ $loans->count() }}</div>
                                <div class="text-blue-700 font-medium">Total Active</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-green-50 to-green-100 rounded-xl">
                                <div class="text-3xl font-bold text-green-600">
                                    {{ $loans->filter(function($loan) {
                                        return !$loan->due_date || \Carbon\Carbon::now()->lte($loan->due_date);
                                    })->count() }}
                                </div>
                                <div class="text-green-700 font-medium">On Time</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl">
                                <div class="text-3xl font-bold text-yellow-600">
                                    {{ $loans->filter(function($loan) {
                                        return $loan->due_date && \Carbon\Carbon::now()->diffInDays($loan->due_date) <= 3 && \Carbon\Carbon::now()->lt($loan->due_date);
                                    })->count() }}
                                </div>
                                <div class="text-yellow-700 font-medium">Due Soon</div>
                            </div>

                            <div class="text-center p-6 bg-gradient-to-r from-red-50 to-red-100 rounded-xl">
                                <div class="text-3xl font-bold text-red-600">
                                    {{ $loans->filter(function($loan) {
                                        return $loan->due_date && \Carbon\Carbon::now()->gt($loan->due_date);
                                    })->count() }}
                                </div>
                                <div class="text-red-700 font-medium">Overdue</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Loans Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                            Active Loans
                        </h3>
                        <div class="text-sm text-gray-600">
                            {{ $loans->total() }} {{ $loans->total() === 1 ? 'loan' : 'loans' }} found
                        </div>
                    </div>
                </div>

                @if($loans->count() > 0)
                    <!-- Desktop Table View -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Book Details</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Borrower</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Borrowed Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Due Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($loans as $index => $loan)
                                @php
                                    $isOverdue = $loan->due_date && \Carbon\Carbon::now()->gt($loan->due_date);
                                    $isDueSoon = $loan->due_date && \Carbon\Carbon::now()->diffInDays($loan->due_date) <= 3 && \Carbon\Carbon::now()->lt($loan->due_date);
                                @endphp
                                <tr class="hover:bg-gray-50 transition-colors duration-200 loan-row {{ $isOverdue ? 'bg-red-50' : ($isDueSoon ? 'bg-yellow-50' : '') }}"
                                    style="animation-delay: {{ $index * 0.05 }}s"
                                    data-status="{{ $isOverdue ? 'overdue' : ($isDueSoon ? 'due-soon' : 'active') }}">

                                    <!-- Book Details -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-orange-400 to-red-400 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900">{{ $loan->book_title }}</div>
                                                <div class="text-xs text-gray-500">ID: {{ $loan->book_id }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Borrower -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                                {{ substr($loan->user_name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $loan->user_name }}</div>
                                                <div class="text-xs text-gray-500">User ID: {{ $loan->user_id }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Borrowed Date -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-2 9a1 1 0 001 1h8a1 1 0 001-1l-2-9m-6 0V7"></path>
                                            </svg>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($loan->borrowed_date)->format('M j, Y') }}</div>
                                                <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($loan->borrowed_date)->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Due Date -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($loan->due_date)
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 {{ $isOverdue ? 'text-red-500' : ($isDueSoon ? 'text-yellow-500' : 'text-green-500') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <div class="text-sm font-medium {{ $isOverdue ? 'text-red-600' : ($isDueSoon ? 'text-yellow-600' : 'text-gray-900') }}">
                                                        {{ \Carbon\Carbon::parse($loan->due_date)->format('M j, Y') }}
                                                    </div>
                                                    <div class="text-xs {{ $isOverdue ? 'text-red-500' : ($isDueSoon ? 'text-yellow-500' : 'text-gray-500') }}">
                                                        {{ \Carbon\Carbon::parse($loan->due_date)->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-sm">No due date</span>
                                        @endif
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($isOverdue)
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 shadow-sm animate-pulse">
                                                    ⚠️ OVERDUE
                                                </span>
                                        @elseif($isDueSoon)
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-yellow-100 text-yellow-800 shadow-sm">
                                                    ⏰ DUE SOON
                                                </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 shadow-sm">
                                                    ✅ ACTIVE
                                                </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 font-medium text-sm transition-colors"
                                                    title="Send Reminder">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                            </button>
                                            <button class="text-orange-600 hover:text-orange-900 font-medium text-sm transition-colors"
                                                    title="Extend Due Date">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 font-medium text-sm transition-colors"
                                                    title="Force Return">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="lg:hidden">
                        <div class="divide-y divide-gray-200">
                            @foreach ($loans as $index => $loan)
                                @php
                                    $isOverdue = $loan->due_date && \Carbon\Carbon::now()->gt($loan->due_date);
                                    $isDueSoon = $loan->due_date && \Carbon\Carbon::now()->diffInDays($loan->due_date) <= 3 && \Carbon\Carbon::now()->lt($loan->due_date);
                                @endphp
                                <div class="p-6 loan-card {{ $isOverdue ? 'bg-red-50' : ($isDueSoon ? 'bg-yellow-50' : '') }}"
                                     style="animation-delay: {{ $index * 0.1 }}s"
                                     data-status="{{ $isOverdue ? 'overdue' : ($isDueSoon ? 'due-soon' : 'active') }}">

                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-red-400 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold text-gray-900">{{ $loan->book_title }}</h3>
                                                <p class="text-gray-600">Borrowed by {{ $loan->user_name }}</p>
                                            </div>
                                        </div>

                                        <!-- Status Badge -->
                                        <div>
                                            @if($isOverdue)
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 shadow-sm animate-pulse">
                                                    ⚠️ OVERDUE
                                                </span>
                                            @elseif($isDueSoon)
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-yellow-100 text-yellow-800 shadow-sm">
                                                    ⏰ DUE SOON
                                                </span>
                                            @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 shadow-sm">
                                                    ✅ ACTIVE
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
                                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($loan->borrowed_date)->format('M j, Y') }}</span>
                                            </div>

                                            @if($loan->due_date)
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 {{ $isOverdue ? 'text-red-500' : ($isDueSoon ? 'text-yellow-500' : 'text-green-500') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="font-medium text-gray-700">Due:</span>
                                                    <span class="{{ $isOverdue ? 'text-red-600' : ($isDueSoon ? 'text-yellow-600' : 'text-gray-600') }}">
                                                        {{ \Carbon\Carbon::parse($loan->due_date)->format('M j, Y') }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-end space-x-2">
                                        <button class="px-3 py-2 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                            Remind
                                        </button>
                                        <button class="px-3 py-2 text-sm bg-orange-100 text-orange-700 rounded-lg hover:bg-orange-200 transition-colors">
                                            Extend
                                        </button>
                                        <button class="px-3 py-2 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">
                                            Return
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        {{ $loans->links() }}
                    </div>
                @else
                    <!-- Enhanced Empty State -->
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <div class="relative mb-8">
                                <svg class="w-32 h-32 text-gray-300 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-orange-400 rounded-full animate-ping"></div>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">No Active Loans</h3>
                            <p class="text-gray-600 mb-8 text-lg">All books are currently available in the library!</p>
                            <div class="space-y-4">
                                <a href="{{ route('admin.books.index') }}"
                                   class="inline-block bg-gradient-to-r from-orange-600 to-red-600 text-white px-8 py-4 rounded-xl hover:from-orange-700 hover:to-red-700 transition-all duration-300 font-semibold text-lg shadow-lg transform hover:scale-105">
                                    📚 Manage Books
                                </a>
                                <p class="text-sm text-gray-500">View and manage your book collection</p>
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

        .loan-row, .loan-card {
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

        document.querySelectorAll('.loan-row, .loan-card').forEach(element => {
            observer.observe(element);
        });

        // Filter functionality
        document.getElementById('statusFilter').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('.loan-row, .loan-card');

            rows.forEach(row => {
                const status = row.dataset.status;
                let shouldShow = true;

                switch(filterValue) {
                    case 'active':
                        shouldShow = status === 'active';
                        break;
                    case 'overdue':
                        shouldShow = status === 'overdue';
                        break;
                    case 'due-soon':
                        shouldShow = status === 'due-soon';
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
