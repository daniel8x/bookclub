<?php

namespace App\Http\Controllers;

use App\Http\Requests;


class PagesController extends Controller
{
     public function __construct()
     {
         //$this->middleware('auth');
     }
    public function index()
    {
      if (phpCAS::isAuthenticated()) {
           return phpCAS::getUser();
       }
      //
      // if (!Auth::check()) {
      //   $books = Book::all();
      //   return view('books.list',compact('books'));
      // }else{
      //   if (Book::where('selected','=',1)->exists()){
      //   $book = Book::where('selected','=',1)->first();
      //   return view('home')->with('books',$book);
      // }else {
      //   return view('home')->with('books','');
      // }
      //
      // }

    }

}
