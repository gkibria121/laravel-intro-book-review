@extends('layouts.app')

@section('title',"Books")

@section('content')
  
<h1 class="text-xl font-semibold ">Add Review for {{$book->title}}</h1>
<form action="{{route("books.reviews.store",['book' => $book])}}" method="POST" class="mt-10" >
@csrf
    <div  class="flex flex-col gap-y-2">
    <label class="font-semibold mb-1">Review</label>
    <textarea  class="rounded-md border-slate-300 border-2" name="review" cols="30" rows="2"></textarea>

    @error('review')
    <div class="mt-1 text-red-400"> {{ $errors->first('review') }}</div>
    @enderror




</div>
<div  class="flex flex-col gap-y-2 mt-4">
    <label class="font-semibold mb-1">Rating</label>
    <select required name="rating" class="rounded-md border-slate-300 border-2 mt-1" >
        <option selected disabled>Select Rating</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    @error('rating')
    <div class="mt-1 text-red-400">Please select a rating</div>
@enderror

</div>
<button class="mt-10 border border-slate-300 py-2 px-3 rounded-md ">Add Review</button>
</form>
@endsection