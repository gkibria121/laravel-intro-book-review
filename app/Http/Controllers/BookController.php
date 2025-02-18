<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [
            'latest' => fn(Builder $books): Builder => $books->latest(),
            'popular_last_month' => fn(Builder $books): Builder => $books->popular()->previousMonths(1),
            'popular_last_6_months' => fn(Builder $books): Builder => $books->popular()->previousMonths(6),
            'highest_rated_last_month' => fn(Builder $books): Builder => $books->highestRating()->previousMonths(1),
            'highest_rated_last_6_months' => fn(Builder $books): Builder => $books->highestRating()->previousMonths(6),
        ];

        $selectedFilter = array_key_exists($request->filter, $filters) ? $request->filter : 'latest';

        $title = $request->get('title', '');

        $books = Book::withAvg('reviews', 'rating')->withCount('reviews')->title($title);

        $books = Cache::remember("books $title $selectedFilter", 3600, fn() => $filters[$selectedFilter]($books)->paginate(5));

        return view('books.index', [
            'filters' => array_keys($filters),
            'selectedFilter' => $selectedFilter,
            'books' => $books
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Cache::remember("book:{$book->id}", 3600, function () use ($book) {
            return $book->load('reviews')->loadCount('reviews')->loadAvg('reviews', 'rating');
        });

        return view('books.show', ['book' => $book]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
