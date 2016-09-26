@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
      <h2>Book List</h2>
      <ul class="list-group">
        @foreach ($books as $book)
        <li class="list-group-item"> <a href="{{route('book.show', $book->id)}}">{{ $book->title}}</a>
          <button type="button" class="btn btn-danger">Edit</button>
          <button type="button" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-danger" onclick="showSuggestionModal({{$book->id}})">Suggestion</button>

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
  <label><input type="radio" name="myradio" value="1"><img src="/img/icon/star.ico" width="20"></label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="2"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"></label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="3"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"></label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="4"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"></label>
</div>
<div class="radio">
  <label><input type="radio" name="myradio" value="5"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"><img src="/img/icon/star.ico" width="20"></label>
</div>
<label for="rating">Review by:  </label>
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
