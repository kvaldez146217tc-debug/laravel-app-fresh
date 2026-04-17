<x-layout title="Book Details | fresh-laravel-app">

    <div class="max-w-4xl mx-auto mt-12 px-4 pb-20">

        <!-- Back Button -->
        <div class="mb-8">
            <a href="/books"
               class="text-blue-300 hover:text-white transition-colors text-sm flex items-center gap-2">
                ← Back to Books List
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 shadow-2xl text-white">

            <!-- Title -->
            <h1 class="text-3xl font-black mb-6">
                {{ $book->title }}
            </h1>

            <!-- Details -->
            <div class="space-y-4 text-blue-100/80">

                <p>
                    <span class="font-semibold text-white">Author:</span>
                    {{ $book->author }}
                </p>

                <p>
                    <span class="font-semibold text-white">Genre:</span>
                    {{ $book->genre }}
                </p>

                <p>
                    <span class="font-semibold text-white">Price:</span>
                    ₱{{ $book->price }}
                </p>

                <p>
                    <span class="font-semibold text-white">Language:</span>
                    {{ $book->language }}
                </p>

                <p>
                    <span class="font-semibold text-white">Availability:</span>

                    @if($book->available)
                        <span class="text-green-300 font-bold">Available</span>
                    @else
                        <span class="text-red-300 font-bold">Unavailable</span>
                    @endif
                </p>

            </div>

            <!-- Actions -->
            <div class="mt-10 flex gap-3">

                <a href="/books/{{ $book->id }}/edit"
                   class="bg-amber-400 hover:bg-amber-300 text-amber-950 px-5 py-2.5 rounded-xl font-bold transition">
                    Edit Book
                </a>

                <form action="/books/{{ $book->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Delete this book?')"
                            class="bg-red-500 hover:bg-red-400 text-white px-5 py-2.5 rounded-xl font-bold transition">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>

</x-layout>