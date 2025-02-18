<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = [
            'latest',
            'popular_last_month',
            'popular_last_6_months',
            'highest_rated_last_month',
            'hihest_rated_last_6_months'
        ];
        $selectedFilter = 'latest';

        $books = Book::withAvg('reviews', 'rating')->withCount('reviews')->paginate(5);

        return view('books',  ['filters' => $filters, 'selectedFilter' => $selectedFilter, 'books' =>  $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
        //
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
