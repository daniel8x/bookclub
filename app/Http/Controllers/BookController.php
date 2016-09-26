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

      $books = Book::where('user_id',Auth::user()->id)->get();
      return view('books.list')->with('books',$books);
    }
    public function show($id){
      $book = Book::find($id);
      return view('books.index')->with('book',$book);
    }
    public function create(){
      return view('books.create');
    }
    public function store(Request $request){

      $title = $request->json('title');
      $google_id = $request->json('google_id');
      $description = $request->json('description');
      $google_link_info = $request->json('google_link_info');
      $google_link_preview = $request->json('google_link_preview');
      $imageLink = $request->json('imageLink');
      $author = $request->json('author');
      $publishDate = $request->json('publishDate');

      Book::create([
        'title' => $title,
        'google_id'=>$google_id,
        'author' => $author,
        'image'=>$imageLink,
        'description' => $description,
        'google_link_info' => $google_link_info,
        'google_link_preview' => $google_link_preview,
        'publish_date'=>$publishDate,
        'user_id' => Auth::user()->id

      ]);
             $response = array(
                 'status' => 'success',
                 'msg' => 'ok'
             );
             return \Response::json($response);


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
