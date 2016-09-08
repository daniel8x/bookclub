<?php
namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {

      $books = Book::all();
      return view('home',compact('books'));
    }
    public function show($id){
      $book = Book::find($id);
      return view('books.index')->with('book',$book);
    }
    public function create(){
      return view('books.create');
    }
    public function store(Request $request){
      $title = $request->input('title');
      $author = $request->input('author');
      $other = $request->input('other');
      $description = $request->input('description');
      $link = $request->input('link');
      $image = $request->input('image');
      $user_id =  Auth::user()->id;
      Book::create([
        'title' => $title,
        'author' => $author,
        'other' => $other,
        'description' => $description,
        'link' => $link,
        'image' => $image,
        'user_id' => $user_id

      ]);
      return redirect()->route('book.index');
    }

    public function edit($id){
      $book = Book::find($id);
      return view('books.edit',compact('book'));
    }
    public function update($id, Request $request)
    {
      $book = Book::find($id);
      $title = $request->input('title');
      $author = $request->input('author');
      $other = $request->input('other');
      $description = $request->input('description');
      $link = $request->input('link');
      $image = $request->input('image');
      $book->update([
        'title' => $title,
        'author' => $author,
        'other' => $other,
        'description' => $description,
        'link' => $link,
        'image' => $image
      ]);
      return redirect()->route('book.index');
    }
    public function destroy($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index');
      }
}
?>
