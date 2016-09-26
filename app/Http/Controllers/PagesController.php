<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{

    public function index()
    {

      if (!Auth::check()) {
        $books = Book::all();
        return view('books.list',compact('books'));
      }else{

        return view('home',compact('books'));
      }

    }

}
