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
<strong>Picked!</strong><br>
</div>
        <span style="text-align: center;"><h2>Suggestions</h2></span>

          <div class="panel-group" id="accordion">

    <?php
          for ($i = 0; $i<count($books); $i++){
    ?>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h4 class="panel-title">
                <button type="button" class="btn btn-success" onclick="submitPickBook({{$books[$i]->id}})">Pick</button>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                <strong>{{$books[$i]->title}}</strong></a>



              </h4>
            </div>



            <div id="collapse{{$i}}" class="panel-collapse collapse in">
              <div class="panel-body">
                <?php
                for ($j=0;$j<count($suggestions[$i]);$j++){
                ?>

                <span><strong>Reason</strong> : {{$suggestions[$i][$j]->reason}}</span>

                <span>

                  <?php
                  for ($s=1; $s<=$suggestions[$i][$j]->rating_point; $s++)
                  {
                    echo '<img src="/img/icon/star.ico" width="20" />';
                  }

                  ?>

                </span><br>
                <?php }?>



              </div>
            </div>




          </div>

  <?php }?>

        </div>
    </div>

    <div class="container">
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
    </div>
@stop
