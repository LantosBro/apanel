<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getBooks(){
        $books = Book::all();
        $books_done = [];
        foreach($books as $book) {
            $book_arr = json_decode($book, true);
            $book_arr['author_name'] = $book->author->name;
            $books_done[] = $book_arr;
        }
        return json_encode($books_done);
    }
}
