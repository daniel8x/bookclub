@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
      <span style="text-align: center;"><h2>Books</h2></span>
      <ul class="list-group">
        @foreach ($books as $book)
        <li class="list-group-item"> <a href="{{route('book.show', $book->id)}}">{{ $book->title}}</a>
                    <div class="pull-right button-group">
                        <a href="{{route('book.edit', $book->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a href="{{route('book.destroy', $book->id)}}"><button class="btn btn-danger ">Delete</button></a>
                        <a href="{{route('suggestion.create', $book->id)}}"><button class="btn btn-success">Suggest</button></a>
                    </div>
              </li>
      @endforeach
      </ul>

      <div class="container">

    <div class='row'>
      <div class='col-md-offset-2 col-md-8'>
        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
          <!-- Bottom Carousel Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#quote-carousel" data-slide-to="1"></li>
            <li data-target="#quote-carousel" data-slide-to="2"></li>



          </ol>

          <!-- Carousel Slides / Quotes -->
          <div class="carousel-inner">

            <!-- Quote 1 -->
            <div class="item active">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="https://www.poets.org/sites/default/files/styles/286x289/public/images/biographies/rwemerso.jpg?itok=h_u5PQL1" style="width: 100px;height:100px;">
                    <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                  </div>
                  <div class="col-sm-9">
                    <p>If we encounter a man of rare intellect, we should ask him what books he reads.</p>
                    <small>Ralph Waldo Emerson</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="https://static01.nyt.com/images/2011/10/23/magazine/23murakami1_span/23murakami1_span-jumbo.jpg" style="width: 100px;height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>If you only read the books that everyone else is reading, you can only think what everyone else is thinking.</p>
                    <small>Haruki Murakami</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 3 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Michael_Cunningham_3_by_David_Shankbone.jpg/220px-Michael_Cunningham_3_by_David_Shankbone.jpg" style="width: 100px;height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>A great book should leave you with many experiences, and slightly exhausted at the end. You live several lives while reading.</p>
                    <small>Michael Cunningham</small>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>

          <!-- Carousel Buttons Next/Prev -->
          <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
          <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
        </div>
      </div>
    </div>
  </div>
    </div>
@stop
