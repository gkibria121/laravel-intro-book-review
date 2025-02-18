<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


enum ReveiwType: string
{
    case GOOD = 'good';
    case BAD = 'bad';
    case AVERAGE = 'avg';
}



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Book::factory(10)->lastMonths(1)->create()->each(function (Book $book) {

            $this->createReveiw($book, ReveiwType::GOOD, random_int(1, 10));
        });
        Book::factory(10)->lastMonths(6)->create()->each(function ($book) {
            $this->createReveiw($book, ReveiwType::BAD, random_int(1, 10));
        });
        Book::factory(10)->create()->each(function ($book) {
            $this->createReveiw($book, ReveiwType::AVERAGE, random_int(1, 10));
        });
    }

    private function createReveiw(Book $book, ReveiwType $type =  ReveiwType::GOOD, int $count = 1)
    {

        Review::factory($count)->{$type->value}()->between($book->created_at, now())->create(['book_id' => $book->id]);
    }
}
