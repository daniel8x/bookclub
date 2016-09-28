@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
  <div class="alert alert-success">
  <strong>Success!</strong><br>
</div>
<div class="alert alert-danger">
<strong>Exists!</strong><br>
</div>
      <h2 style="text-align: center;">Your Books</h2>
      <ul class="list-group" id="bookList">
        @foreach ($books as $book)
        <li class="list-group-item">   <button type="button" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-danger" onclick="showSuggestionModal({{$book->book->id}})">Suggestion</button>
           <a href="{{route('book.show', $book->book->id)}}">{{ $book->book->title}}</a>


              </li>
      @endforeach
      </ul>
    </div>
    <div class="modal fade" id="suggestionModal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Book Recommendation</h4>
            </div>
            <div class="modal-body">

              <div class="form-group">
  <label for="comment">The reason I recommend this book:</label>
  <textarea class="form-control" rows="5" id="suggestion"></textarea>
</div>

    <label for="rating">Star Rating: </label>
  <div class="radio">
  <label><input type="radio" name="myradio" value="1"><img src="/img/icon/star.ico" width="20">
<span class="ratingStar">1 star : Hated it</span>
  </label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="2"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20">
<span class="ratingStar">2 star : Disliked it</span>
  </label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="3"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20">
<span class="ratingStar">3 star : It was ok</span>
  </label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="4"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20">
<span class="ratingStar">4 star : Liked it - Recommend</span>
  </label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="5"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20">
<span class="ratingStar">5 star : Loved it - Strongly recommend</span>
  </label>
</div>

  </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="submitBookSuggestion()">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
