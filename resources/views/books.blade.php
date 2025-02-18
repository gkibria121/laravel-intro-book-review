@extends('layouts.app')

@section('title',"Books")

@section('content')

 <h1 class="text-3xl">Book</h1>

 <form method="GET" class="mt-10 w-full flex gap-x-2  " >
    <input type="text" placeholder="Search" name="title" class="flex-grow  rounded-md shadow-md border-slate-300 ouline-none  " >
    <button class="bg-white rounded-md  px-2 text-gray-700 border border-slate-300 ">Search</button>
    <a href="{{route('books.index')}}" class="bg-white rounded-md  px-2 text-gray-700 flex border items-center border-slate-300 ">Clear</a>
 </form>


 <div class="bg-slate-200 h-20 mt-5 rounded-md flex justify-between w-full p-2 gap-x-3">

    @forelse ($filters as $filter )
       <div class="text-wrap flex-1 rounded-md p-4 {{$selectedFilter!==$filter ?: "bg-white"}} flex justify-center items-center text-center">{{ snakeToTitleCase($filter)}}</div> 
    @empty
        No filters available!
    @endforelse
    
 </div>


<div class="flex gap-y-4 flex-col mt-5"> 
@forelse ($books as $book)
    <div class="bg-white shadow-md p-4 border border-slate-300 rounded-md flex justify-between">
        <div>
            <h1 class="font-bold">{{$book->title}}</h1>
            <h2 class="opacity-80">by {{$book->author}}</h2>
        </div>
        <div class="flex  flex-col" >
            <span>{{round($book->reviews_avg_rating, 1)}}</span>
            <span>out of {{$book->reviews_count}} {{   Str::plural("review",$book->reviews_count) }}</span>
        </div>
    </div>
@empty
</div>
@endforelse



@endsection