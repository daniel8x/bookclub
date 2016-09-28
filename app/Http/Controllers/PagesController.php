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
        if (Book::where('selected','=',1)->exists()){
        $book = Book::where('selected','=',1)->first();
        return view('home')->with('books',$book);
      }else {
        return view('home')->with('books','');
      }

      }

    }

}
