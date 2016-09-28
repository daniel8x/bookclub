<?php
namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Relation;
use DB;
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

    //  $books = Book::where('user_id',Auth::user()->id)->get();
      $books = Relation::with('book','user')->where('user_id','=',Auth::user()->id)->where('suggestion_id','=',NULL)->get();

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
      $id = Book::where('google_id', '=', $google_id)->value('id');

      if (Book::where('google_id', '=', $google_id) ->exists()) {
        if (Book::find($id)->user()->where('user_id',Auth::user()->id)->exists()){


        $response = array(
            'status' => 'ton tai ca 2 bang',
            'msg' => 'ton tai ca 2 bang'
        );
        return \Response::json($response);

      }else{
        $book = Book::find($id);
        $book->user()->attach(Auth::user()->id);
        $response = array(
            'status' => 'success',
            'msg' => 'update bang books_users - co sach trong bang book'
        );
        return \Response::json($response);

      }

      } else{

        $bookCreate = Book::create([
          'title' => $title,
          'google_id'=>$google_id,
          'author' => $author,
          'image'=>$imageLink,
          'description' => $description,
          'google_link_info' => $google_link_info,
          'google_link_preview' => $google_link_preview,
          'publish_date'=>$publishDate
        ]);

        $book = Book::find($bookCreate->id);
        $book->user()->attach(Auth::user()->id);


               $response = array(
                   'status' => 'success',
                   'msg' => 'insert vao ca 2 bang'
               );
               return \Response::json($response);


}
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
    public function pick($id){
      if (Book::where('selected','=',1)->exists()){
        $response = array(
            'status' => 'exist',
            'msg' => 'bien'
        );
      }else {
      $run = DB::table('books')
      ->where('id',$id)->update(['selected'=>1]);

      $response = array(
          'status' => 'success',
          'msg' => 'ok'
      );

    }
    return \Response::json($response);
    }
    public function done($id){

      $run = DB::table('books')
      ->where('id',$id)->update(['selected'=>0]);

      $response = array(
          'status' => 'success',
          'msg' => 'ok'
      );


    return \Response::json($response);
    }
}
?>
