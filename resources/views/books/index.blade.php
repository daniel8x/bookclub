@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
      
      <form>
        <div class="form-group">

          <img src="{{$book->image}}" width="200" alt="" class="img-thumbnail" />
        </div>
        <div class="form-group">

          <label for="title"><strong>Title</strong></label>
          <div class="well">  {{$book->title}} </div>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <div class="well">{{$book->author}} </div>
        </div>
        <div class="form-group">
          <label for="other">Other Information</label>
          <div class="well">{{$book->other}}</div>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <div class="well">{{$book->description}}</div>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <div class="well"><a href="{{$book->link}}" target="_blank">{{$book->link}}</a></div>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
          <button type="submit" class="btn btn-danger">Delete</button>
            <button type="submit" class="btn btn-success">Suggest</button>
      </form>
    </div>
@stop
