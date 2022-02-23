<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book_create', function(){
    
//    $book = new App\Models\Book;
//    $book->title = "My Second Book";
//    $book->pages_count = 100;
//    $book->price = 9.99;
//    $book->description = "This is my very second book.";
//    
//    $book->save();
    
});

Route::get('/get_all_books', function(){
    $books = App\Models\Book::all();
    dd($books);
    return $books;
});


Route::get('/get_book_2', function(){
    $book = App\Models\Book::findOrFail(2);
    dd($book);
    return $book;
});

Route::get('/get_book_where', function(){
    $book = App\Models\Book::where('pages_count', '<', '100')->first();
    dd($book);
    return $book;
});

Route::get('/update_book', function(){
    $book = App\Models\Book::findOrFail(1);
    $book->title = 'My Updated Book';
    $book->price = 20.00;
    $book->save();
    dd($book);
    return $book;
});

Route::get('/get_book_where_like', function(){
    $books = App\Models\Book::where('title', 'like', 'M%')->get();
    dd($books);
    return $books;
});


Route::get('/get_book_where_or_where', function(){
    $books = App\Models\Book::where('pages_count', '>', 10)->OrWhere('title', 'like', 'M%')->get();
    dd($books);
    return $books;
});

Route::get('/get_book_complex_queries', function(){
    $books = App\Models\Book::where(function($query){
        $query->where('pages_count', '=', 10);
    })->orWhere(function($query){
        $query->where('pages_count', '=', 100)->where('price', '<', 9);
    })->get();
    
    dd($books);
    return $books;
});




