@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-900 text-white mb-8">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full animate-float"></div>
            <div class="absolute top-20 right-20 w-16 h-16 bg-indigo-300 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-10 left-1/3 w-24 h-24 bg-purple-300 rounded-full animate-float-slow"></div>
        </div>

        <div class="relative z-10 px-4 py-12">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold tracking-tight mb-4 bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent">
                            ⚙️ Edit User Roles
                        </h1>
                        <p class="text-xl text-indigo-100">Manage permissions for {{ $user->name }}</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Back to Users</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- User Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 sticky top-24">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-4 shadow-lg">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $user->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $user->email }}</p>

                        <!-- Current Roles -->
                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Current Roles</h4>
                            <div class="flex flex-wrap gap-2 justify-center">
                                @forelse ($user->roles as $role)
                                    <span class="px-3 py-1 text-xs font-bold rounded-full shadow-sm
                                        {{ $role->name == 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        @if($role->name == 'admin')
                                            🛡️ {{ ucfirst($role->name) }}
                                        @else
                                            👤 {{ ucfirst($role->name) }}
                                        @endif
                                    </span>
                                @empty
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                        No roles assigned
                                    </span>
                                @endforelse
                            </div>
                        </div>

                        <!-- User Stats -->
                        <div class="bg-gradient-to-r from-gray-50 to-indigo-50 rounded-xl p-4">
                            <div class="grid grid-cols-2 gap-4 text-center">
                                <div>
                                    <div class="text-2xl font-bold text-indigo-600">{{ $user->borrowedBooks()->count() }}</div>
                                    <div class="text-xs text-gray-600">Books Borrowed</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-purple-600">{{ $user->created_at->diffInDays() }}</div>
                                    <div class="text-xs text-gray-600">Days Active</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Management Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-8 py-6 border-b border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Role Management</h2>
                                <p class="text-gray-600">Assign or remove user permissions</p>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Error Display -->
                    @if ($errors->any())
                        <div class="bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 p-6 m-6 rounded-xl shadow-lg" role="alert">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-bold text-red-800 mb-2">Please correct the following errors:</h3>
                                    <ul class="space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-red-700 flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form Content -->
                    <div class="p-8">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <!-- Role Selection -->
                            <div>
                                <label class="block text-lg font-bold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Assign User Roles
                                </label>

                                <div class="space-y-4">
                                    @foreach ($roles as $role)
                                        <div class="relative">
                                            <div class="flex items-start p-6 border-2 border-gray-200 rounded-xl hover:border-indigo-300 transition-all duration-300 {{ $user->roles->contains($role) ? 'bg-indigo-50 border-indigo-300' : 'bg-white' }}">
                                                <div class="flex items-center h-5">
                                                    <input type="checkbox"
                                                           name="roles[]"
                                                           value="{{ $role->id }}"
                                                           id="role_{{ $role->id }}"
                                                           {{ $user->roles->contains($role) ? 'checked' : '' }}
                                                           class="h-5 w-5 text-indigo-600 border-2 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2 transition-all duration-300">
                                                </div>
                                                <div class="ml-4 flex-1">
                                                    <label for="role_{{ $role->id }}" class="cursor-pointer">
                                                        <div class="flex items-center space-x-3 mb-2">
                                                            @if($role->name == 'admin')
                                                                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                                    </svg>
                                                                </div>
                                                                <span class="text-lg font-bold text-gray-900">🛡️ Administrator</span>
                                                            @else
                                                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                                    </svg>
                                                                </div>
                                                                <span class="text-lg font-bold text-gray-900">👤 {{ ucfirst($role->name) }}</span>
                                                            @endif
                                                        </div>
                                                        <p class="text-gray-600 text-sm">
                                                            @if($role->name == 'admin')
                                                                Full access to all system features including user management, book management, and system settings.
                                                            @else
                                                                Standard user access to browse and borrow books from the library collection.
                                                            @endif
                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Warning Notice -->
                            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-sm font-bold text-yellow-800 mb-1">Important Notice</h4>
                                        <p class="text-sm text-yellow-700">
                                            Changing user roles will immediately affect their access permissions.
                                            Administrator roles grant full system access including the ability to manage other users.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                                <button type="submit"
                                        class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-4 px-8 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Update User Roles</span>
                                </button>

                                <a href="{{ route('admin.users.index') }}"
                                   class="flex-1 sm:flex-none bg-gray-100 text-gray-700 font-semibold py-4 px-8 rounded-xl hover:bg-gray-200 transition-all duration-300 text-center flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Cancel</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 5s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float-slow 6s ease-in-out infinite;
        }
    </style>

    <!-- Enhanced JavaScript -->
    <script>
        // Checkbox interaction enhancement
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const container = this.closest('.relative');
                const card = container.querySelector('div');

                if (this.checked) {
                    card.classList.add('bg-indigo-50', 'border-indigo-300');
                    card.classList.remove('bg-white');
                } else {
                    card.classList.remove('bg-indigo-50', 'border-indigo-300');
                    card.classList.add('bg-white');
                }
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const checkboxes = document.querySelectorAll('input[name="roles[]"]:checked');

            if (checkboxes.length === 0) {
                e.preventDefault();
                alert('Please select at least one role for the user.');
                return false;
            }
        });
    </script>
@endsection
