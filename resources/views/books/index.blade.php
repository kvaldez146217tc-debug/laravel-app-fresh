<x-layout title="Books List | fresh-laravel-app">

<div class="max-w-6xl mx-auto mt-12 px-4 pb-20">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-black text-white tracking-tight">Book Management</h1>
            <p class="text-blue-200/60 text-sm mt-1">Manage all book records in the system.</p>
        </div>

        <a href="{{ route('books.create') }}"
           class="flex items-center gap-2 bg-amber-400 hover:bg-amber-300 text-amber-950 px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg shadow-amber-400/20 active:scale-95">
            + Create New Book
        </a>
    </div>

    <!-- Search & Genre Filter -->
    <form action="{{ route('books.index') }}" method="GET" class="mb-6 flex flex-wrap gap-3 bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-4">

        <!-- Search Input -->
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title or author..."
               class="flex-1 min-w-[200px] rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-white placeholder:text-white/40 focus:ring-2 focus:ring-amber-400 focus:border-transparent" />

        <!-- Genre Dropdown -->
        <select name="genre" class="min-w-[150px] rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-white focus:ring-2 focus:ring-amber-400 focus:border-transparent">
            <option value="">All Genres</option>
            <option value="Fiction" @if(request('genre')=='Fiction') selected @endif>Fiction</option>
            <option value="Non-fiction" @if(request('genre')=='Non-fiction') selected @endif>Non-fiction</option>
            <option value="Mystery" @if(request('genre')=='Mystery') selected @endif>Mystery</option>
            <option value="Fantasy" @if(request('genre')=='Fantasy') selected @endif>Fantasy</option>
            <option value="Biography" @if(request('genre')=='Biography') selected @endif>Biography</option>
        </select>

        <!-- Search Button -->
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-400 text-white px-5 py-2.5 rounded-xl font-semibold transition-all">
            Search
        </button>
    </form>

    <!-- Table -->
    <div class="relative overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-white/5 text-blue-200/70 text-xs uppercase tracking-widest font-bold">
                        <th class="px-6 py-4">Book Details</th>
                        <th class="px-6 py-4">Genre</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Language</th>
                        <th class="px-6 py-4">Availability</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @foreach ($books as $book)
                        <tr class="group hover:bg-white/[0.03] transition-colors">

                            <!-- Title + Author -->
                            <td class="px-6 py-5">
                                <div class="text-white font-semibold">{{ $book->title }}</div>
                                <div class="text-blue-100/40 text-xs">{{ $book->author }}</div>
                            </td>

                            <!-- Genre -->
                            <td class="px-6 py-5 text-blue-100/70 text-sm">{{ $book->genre }}</td>

                            <!-- Price -->
                            <td class="px-6 py-5 text-blue-100/70 text-sm">₱{{ $book->price }}</td>

                            <!-- Language -->
                            <td class="px-6 py-5 text-blue-100/70 text-sm">{{ $book->language }}</td>

                            <!-- Availability -->
                            <td class="px-6 py-5">
                                @if($book->available)
                                    <span class="bg-green-400/10 text-green-300 px-2.5 py-0.5 rounded-full text-xs border border-green-400/20">Available</span>
                                @else
                                    <span class="bg-red-400/10 text-red-300 px-2.5 py-0.5 rounded-full text-xs border border-red-400/20">Unavailable</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">

                                    <!-- View -->
                                    <a href="{{ route('books.show', $book->id) }}"
                                       class="p-2 text-blue-300 hover:bg-blue-400/20 rounded-lg transition-colors"
                                       title="View Book">👁</a>

                                    <!-- Delete -->
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this book?')"
                                                class="p-2 text-red-400 hover:bg-red-400/20 rounded-lg transition-colors">🗑</button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        @if($books->isEmpty())
            <div class="py-20 text-center">
                <p class="text-blue-200/40 italic">No book records found in database.</p>
            </div>
        @endif

    </div>
</div>

</x-layout>