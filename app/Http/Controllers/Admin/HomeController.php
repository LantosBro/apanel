<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Render index page of Admin Panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {

        $books_count = Book::all()->count();
        $authors_count = Author::all()->count();

        return view('admin.home.index', [
            'books_count' => $books_count,
            'authors_count' => $authors_count
        ]);
    }
}
