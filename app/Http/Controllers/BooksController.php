<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

    /**
     * page 78
     */

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $query = Books::query();

    // SEARCH (title or author)
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('author', 'like', '%' . $request->search . '%');
        });
    }

    // GENRE FILTER
    if ($request->genre) {
        $query->where('genre', $request->genre);
    }

    $books = $query->get();

    return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn',
            'pages' => 'required|integer',
            'language' => 'required',
            'publisher' => 'required',
            'price' => 'required|numeric',
        ]);

        Books::create($request->all());

        return redirect()->route('books.index')
         ->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {
       return view('books.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn,' . $books->id,
            'pages' => 'required|integer',
            'language' => 'required',
            'publisher' => 'required',
            'price' => 'required|numeric',
        ]);

        $books->update($request->all());

        return redirect()->route('books.index')
        ->with('success', 'Book updated successfully!');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        $book->delete();

    return redirect()->route('books.index')
        ->with('success', 'Book deleted successfully!');

    }
 
}

