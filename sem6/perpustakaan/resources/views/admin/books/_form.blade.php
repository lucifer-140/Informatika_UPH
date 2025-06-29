@csrf <!-- CSRF Protection -->

<!-- Enhanced Error Display -->
@if ($errors->any())
    <div class="bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 rounded-xl p-6 mb-8 shadow-lg" role="alert">
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

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Left Column - Main Information -->
    <div class="space-y-6">
        <!-- Title -->
        <div class="form-group">
            <label for="title" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"></path>
                </svg>
                Book Title *
            </label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title ?? '') }}" required
                   placeholder="Enter the book title..."
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 text-lg font-medium">
        </div>

        <!-- Author -->
        <div class="form-group">
            <label for="author" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Author *
            </label>
            <input type="text" name="author" id="author" value="{{ old('author', $book->author ?? '') }}" required
                   placeholder="Enter the author's name..."
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 text-lg">
        </div>

        <!-- Published Year & Category Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Published Year -->
            <div class="form-group">
                <label for="published_year" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-2 9a1 1 0 001 1h8a1 1 0 001-1l-2-9m-6 0V7"></path>
                    </svg>
                    Year *
                </label>
                <input type="number" name="published_year" id="published_year" value="{{ old('published_year', $book->published_year ?? '') }}" required
                       placeholder="2024" min="1000" max="{{ date('Y') + 1 }}"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 text-lg">
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Category *
                </label>
                <select name="category" id="category" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 text-lg bg-white">
                    <option value="" disabled {{ old('category', $book->category ?? '') ? '' : 'selected' }}>Select a category...</option>
                    <option value="Fiction" {{ old('category', $book->category ?? '') == 'Fiction' ? 'selected' : '' }}>📚 Fiction</option>
                    <option value="Non-Fiction" {{ old('category', $book->category ?? '') == 'Non-Fiction' ? 'selected' : '' }}>📖 Non-Fiction</option>
                    <option value="Science" {{ old('category', $book->category ?? '') == 'Science' ? 'selected' : '' }}>🔬 Science</option>
                    <option value="Science Fiction" {{ old('category', $book->category ?? '') == 'Science Fiction' ? 'selected' : '' }}>🚀 Science Fiction</option>
                    <option value="Technology" {{ old('category', $book->category ?? '') == 'Technology' ? 'selected' : '' }}>💻 Technology</option>
                    <option value="History" {{ old('category', $book->category ?? '') == 'History' ? 'selected' : '' }}>🏛️ History</option>
                    <option value="Biography" {{ old('category', $book->category ?? '') == 'Biography' ? 'selected' : '' }}>👤 Biography</option>
                    <option value="Mystery" {{ old('category', $book->category ?? '') == 'Mystery' ? 'selected' : '' }}>🔍 Mystery</option>
                    <option value="Romance" {{ old('category', $book->category ?? '') == 'Romance' ? 'selected' : '' }}>💕 Romance</option>
                    <option value="Fantasy" {{ old('category', $book->category ?? '') == 'Fantasy' ? 'selected' : '' }}>🧙 Fantasy</option>
                    <option value="Self-Help" {{ old('category', $book->category ?? '') == 'Self-Help' ? 'selected' : '' }}>🌟 Self-Help</option>
                    <option value="Classic" {{ old('category', $book->category ?? '') == 'Classic' ? 'selected' : '' }}>📜 Classic</option>
                    <option value="Dystopian" {{ old('category', $book->category ?? '') == 'Dystopian' ? 'selected' : '' }}>🌆 Dystopian</option>
                </select>
            </div>
        </div>

        <!-- ISBN -->
        <div class="form-group">
            <label for="isbn" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                ISBN *
            </label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" required
                   placeholder="978-0-123456-78-9"
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 text-lg font-mono">
        </div>

        <!-- Excerpt -->
        <div class="form-group">
            <label for="excerpt" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                </svg>
                Book Description *
            </label>
            <textarea name="excerpt" id="excerpt" rows="6" required
                      placeholder="Enter a compelling description of the book..."
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 text-lg resize-none">{{ old('excerpt', $book->excerpt ?? '') }}</textarea>
            <div class="mt-2 text-sm text-gray-500">
                <span id="excerpt-count">0</span> characters
            </div>
        </div>
    </div>

    <!-- Right Column - Cover Image -->
    <div class="space-y-6">
        <!-- Cover Image Upload -->
        <div class="form-group">
            <label for="cover_image" class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Cover Image
            </label>

            <!-- Image Upload Area -->
            <div class="relative">
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-pink-400 transition-colors duration-300 bg-gradient-to-br from-gray-50 to-pink-50">
                    <div id="upload-area" class="space-y-4">
                        <svg class="w-16 h-16 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <div>
                            <p class="text-lg font-semibold text-gray-700">Upload Cover Image</p>
                            <p class="text-sm text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                        <input type="file" name="cover_image" id="cover_image" accept="image/*"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>

                    <!-- Preview Area -->
                    <div id="image-preview" class="hidden">
                        <img id="preview-img" src="/placeholder.svg" alt="Preview" class="max-w-full h-auto rounded-lg shadow-lg">
                        <button type="button" id="remove-image" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                            Remove Image
                        </button>
                    </div>
                </div>
            </div>

            <!-- Current Image Display (Edit Mode) -->
            @if (isset($book) && $book->cover_image_path)
                <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                    <h4 class="text-sm font-bold text-blue-800 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Current Cover Image
                    </h4>
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $book->cover_image_path) }}"
                             alt="Cover for {{ $book->title }}"
                             class="w-24 h-32 object-cover rounded-lg shadow-md">
                        <div class="flex-1">
                            <p class="text-sm text-blue-700 font-medium">{{ $book->title }}</p>
                            <p class="text-xs text-blue-600">Upload a new image to replace this one</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Tips -->
        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6">
            <h4 class="text-sm font-bold text-yellow-800 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                Pro Tips
            </h4>
            <ul class="space-y-2 text-sm text-yellow-700">
                <li class="flex items-start">
                    <span class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                    Use high-quality images (at least 300x400px) for best results
                </li>
                <li class="flex items-start">
                    <span class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                    Book covers should have a 3:4 aspect ratio
                </li>
                <li class="flex items-start">
                    <span class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                    Write compelling descriptions to attract readers
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Enhanced JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Character counter for excerpt
        const excerptTextarea = document.getElementById('excerpt');
        const excerptCount = document.getElementById('excerpt-count');

        function updateCharacterCount() {
            const count = excerptTextarea.value.length;
            excerptCount.textContent = count;

            if (count > 500) {
                excerptCount.classList.add('text-red-500');
                excerptCount.classList.remove('text-gray-500');
            } else {
                excerptCount.classList.add('text-gray-500');
                excerptCount.classList.remove('text-red-500');
            }
        }

        excerptTextarea.addEventListener('input', updateCharacterCount);
        updateCharacterCount(); // Initial count

        // Image upload preview
        const fileInput = document.getElementById('cover_image');
        const uploadArea = document.getElementById('upload-area');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const removeBtn = document.getElementById('remove-image');

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadArea.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeBtn.addEventListener('click', function() {
            fileInput.value = '';
            uploadArea.classList.remove('hidden');
            imagePreview.classList.add('hidden');
            previewImg.src = '';
        });

        // Form validation enhancement
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');

        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                    this.classList.remove('border-gray-200', 'focus:border-blue-500', 'focus:ring-blue-500');
                } else {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                    this.classList.add('border-green-300', 'focus:border-green-500', 'focus:ring-green-500');
                }
            });

            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                    this.classList.add('border-green-300', 'focus:border-green-500', 'focus:ring-green-500');
                }
            });
        });
    });
</script>

<style>
    .form-group {
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }
</style>
