@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
    <span style="text-align: center;"><h2>Pick a book...</h2></span>

<div class="row search">
                <div class="input-group col-xs-8 col-xs-offset-2">
                    <input type="text" id="inputSearch"class="form-control" x-webkit-speech placeholder="Titles or Authors...">

                    <div class="input-group-btn">
                        <button type="button" id="btnSearch" class="btn btn-search btn-primary" onclick="voiceSearch()">
                            <span class="fa fa-microphone"></span>
                            <span class="label-icon">Say it ...</span>
                        </button>
                    </div>
                </div>
                <div class='list-group ' id="result" style="width: 780px;margin: 0 auto;">
                </div>
</div>







  
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- <div class="container">
    <div class='row'>
        <div class='col-md-offset-2 col-md-8'>
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">

                <ol class="carousel-indicators">
                    <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#quote-carousel" data-slide-to="1"></li>
                    <li data-target="#quote-carousel" data-slide-to="2"></li>


                </ol>


                <div class="carousel-inner">


                    <div class="item active">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle"
                                         src="https://www.poets.org/sites/default/files/styles/286x289/public/images/biographies/rwemerso.jpg?itok=h_u5PQL1"
                                         style="width: 100px;height:100px;">
                                    <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9">
                                    <p>If we encounter a man of rare intellect, we should ask him what books he
                                        reads.</p>
                                    <small>Ralph Waldo Emerson</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle"
                                         src="https://static01.nyt.com/images/2011/10/23/magazine/23murakami1_span/23murakami1_span-jumbo.jpg"
                                         style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9">
                                    <p>If you only read the books that everyone else is reading, you can only think what
                                        everyone else is thinking.</p>
                                    <small>Haruki Murakami</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-circle"
                                         src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Michael_Cunningham_3_by_David_Shankbone.jpg/220px-Michael_Cunningham_3_by_David_Shankbone.jpg"
                                         style="width: 100px;height:100px;">
                                </div>
                                <div class="col-sm-9">
                                    <p>A great book should leave you with many experiences, and slightly exhausted at
                                        the end. You live several lives while reading.</p>
                                    <small>Michael Cunningham</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                </div>


                <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i
                        class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i
                        class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div> -->

@stop
