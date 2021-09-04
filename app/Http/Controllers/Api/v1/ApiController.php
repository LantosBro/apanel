<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get all books with author names
     *
     * @return false|string
     */
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

    /**
     * Get book data by id
     *
     * @param Request $request
     * @return mixed
     */
    public function getBookById(Request $request) {
        $request->validate([
            'id' => 'exists:App\Models\Book,id',
        ]);
        return Book::find($request->id);
    }

    /**
     * Update book data by id
     *
     * @param Request $request
     * @return false|string
     */
    public function updateBook(Request $request){
        $request->validate([
            'id' => 'required|exists:App\Models\Book,id',
            'title' => 'required|unique:books',
            'description' => 'required',
            'author_id' => 'required',
        ]);
        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author_id = $request->author_id;
        $book->save();

        return json_encode(['result' => 'success']);
    }

    public function deleteBook(Request $request){
        $request->validate([
            'id' => 'exists:App\Models\Book,id',
        ]);
        $book = Book::find($request->id);
        if ($book) {
            $book->delete();
            return json_encode(['result' => 'success']);
        }

        return json_encode(['result' => 'fail']);
    }

}
