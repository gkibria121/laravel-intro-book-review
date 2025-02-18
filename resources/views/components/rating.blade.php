<div>
  @for ($i = 1; $i <= $maxRating; $i++) 
    <span class="text-xl">{{ $i< $rating ? "★": "☆"}} </span>
    @endfor 
</div>