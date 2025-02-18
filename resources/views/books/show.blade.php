@extends('layouts.app')

@section('title',"Books")

@section('content')
  

 <h1 class="text-2xl font-semibold"> {{$book->title}}</h1>
 <h2 class="text-gray-500 font-bold mt-2">by  {{$book->author}}</h2>

 <div class="flex gap-x-2 mt-4 items-center mb-2"> 
     <x-rating :rating="$book->reviews_avg_rating"></x-rating>
    <span class="text-gray-800">{{round($book->reviews_count)}} {{Str::plural("review",$book->reviews_count)}}</span>
</div>


<a href="{{route('books.reviews.create',['book' => $book])}}" class="text-gray-500 underline">Add a review!</a>

<h1 class="font-bold text-2xl mt-5">Reviews</h1>

@forelse ($book->reviews as $review)
    <div   class="bg-white shadow-md mt-5 p-4 border hover:-translate-y-1 cursor-pointer border-slate-300 rounded-md flex flex-col justify-between">
     
        <div class="flex   justify-between" >
             
            <x-rating :rating="$review->rating">
            </x-rating>
           
            <small>{{ $review->created_at->format("M  D, Y") }}</small>
        </div>
        <span class="mt-2"> {{$review->review}}</span>
    </div>
@empty
 <div class="mt-10">No Books found!</div>
@endforelse

@endsection