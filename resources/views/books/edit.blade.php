<x-layout title="Edit Book | Book Management System">

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Back Button -->
    <div class="mb-8">
        <a href="{{ route('books.index') }}" class="text-blue-300 hover:text-white transition-colors text-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Books List
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl">

        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Header -->
            <div class="border-b border-white/10 pb-8 mb-8">
                <h2 class="text-3xl font-black text-white tracking-tight">Edit Book</h2>
                <p class="mt-2 text-blue-200/60 text-sm">Update the book details below.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <!-- Title -->
                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-semibold text-blue-100 mb-2">Book Title</label>
                    <input id="title" type="text" name="title" required
                        value="{{ old('title', $book->title) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Author -->
                <div class="sm:col-span-3">
                    <label for="author" class="block text-sm font-semibold text-blue-100 mb-2">Author</label>
                    <input id="author" type="text" name="author" required
                        value="{{ old('author', $book->author) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Description -->
                <div class="col-span-full">
                    <label for="description" class="block text-sm font-semibold text-blue-100 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" required
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm"
                        placeholder="Brief summary of the book...">{{ old('description', $book->description) }}</textarea>
                </div>

                <!-- Genre -->
                <div class="sm:col-span-3">
                    <label for="genre" class="block text-sm font-semibold text-blue-100 mb-2">Genre</label>
                    <select id="genre" name="genre" required
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm">
                        <option value="">-- Select Genre --</option>
                        <option value="fiction" {{ $book->genre == 'fiction' ? 'selected' : '' }}>Fiction</option>
                        <option value="non-fiction" {{ $book->genre == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                        <option value="mystery" {{ $book->genre == 'mystery' ? 'selected' : '' }}>Mystery</option>
                        <option value="biography" {{ $book->genre == 'biography' ? 'selected' : '' }}>Biography</option>
                    </select>
                </div>

                <!-- ISBN -->
                <div class="sm:col-span-3">
                    <label for="isbn" class="block text-sm font-semibold text-blue-100 mb-2">ISBN</label>
                    <input id="isbn" type="text" name="isbn" required
                        value="{{ old('isbn', $book->isbn) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Published Year -->
                <div class="sm:col-span-2">
                    <label for="published_year" class="block text-sm font-semibold text-blue-100 mb-2">Published Year</label>
                    <input id="published_year" type="number" name="published_year" required
                        value="{{ old('published_year', $book->published_year) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Pages -->
                <div class="sm:col-span-2">
                    <label for="pages" class="block text-sm font-semibold text-blue-100 mb-2">Pages</label>
                    <input id="pages" type="number" name="pages" required
                        value="{{ old('pages', $book->pages) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Language -->
                <div class="sm:col-span-2">
                    <label for="language" class="block text-sm font-semibold text-blue-100 mb-2">Language</label>
                    <input id="language" type="text" name="language" required
                        value="{{ old('language', $book->language) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Publisher -->
                <div class="sm:col-span-3">
                    <label for="publisher" class="block text-sm font-semibold text-blue-100 mb-2">Publisher</label>
                    <input id="publisher" type="text" name="publisher" required
                        value="{{ old('publisher', $book->publisher) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white placeholder:text-white/20 focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Price -->
                <div class="sm:col-span-1">
                    <label for="price" class="block text-sm font-semibold text-blue-100 mb-2">Price (₱)</label>
                    <input id="price" type="number" step="0.01" name="price" required
                        value="{{ old('price', $book->price) }}"
                        class="block w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2.5 text-white focus:ring-2 focus:ring-amber-400 outline-hidden transition-all sm:text-sm" />
                </div>

                <!-- Cover Image -->
                <div class="sm:col-span-2">
                    <label for="cover_image" class="block text-sm font-semibold text-blue-100 mb-2">Cover Image</label>
                    <div class="relative w-full">
                        <input id="cover_image" type="file" name="cover_image"
                            class="block w-full text-sm text-white file:mr-4 file:py-2 file:px-4
                                   file:rounded-xl file:border-0 file:bg-blue-700 file:text-white
                                   file:cursor-pointer file:hover:bg-blue-600
                                   rounded-xl border border-white/10 bg-white/5 text-white
                                   focus:outline-none focus:ring-2 focus:ring-amber-400" />
                    </div>
                </div>

                <!-- Availability -->
                <div class="sm:col-span-6 flex items-center gap-2">
                    <input id="available" type="checkbox" name="available" {{ $book->available ? 'checked' : '' }}
                        class="accent-amber-400 w-5 h-5" />
                    <label for="available" class="text-white/70 font-semibold text-sm">Mark as Available</label>
                </div>

            </div>

            <!-- Actions -->
            <div class="mt-12 flex items-center justify-end gap-x-4 pt-8 border-t border-white/10">
                <a href="{{ route('books.index') }}" class="px-6 py-2.5 text-sm font-bold text-white hover:text-red-400 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-amber-400 hover:bg-amber-300 text-amber-950 px-8 py-2.5 rounded-xl font-black text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95 cursor-pointer">
                    Update Book
                </button>
            </div>

        </form>
    </div>

    <p class="mt-6 text-center text-xs text-blue-200/30 uppercase tracking-tighter">
        Laravel Book Management Demo &bull; Form Method: POST
    </p>
</div>

</x-layout>