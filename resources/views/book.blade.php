<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title" charset="utf-8">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <ul class="nav navbar-nav">
                <li><a href="#">BOOK CLUB</a></li>

        		<li class="dropdown mega-dropdown active">
    			    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Function <span class="caret"></span></a>
    				<div class="dropdown-menu mega-dropdown-menu">
                        <div class="container-fluid">
        				    <!-- Tab panes -->
                            <div class="tab-content">
                              <div class="tab-pane active" id="men">
                                <ul class="nav-list list-inline">
                                    <li><a href="/book"><img src="img/book.jpg" width="150"><span>Add Book</span></a></li>
                                    <li><a href="#"><img src="img/book.jpg" width="150"><span>Suggestion</span></a></li>
                                    <li><a href="#"><img src=""><span>Test</span></a></li>
                                    <li><a href="#"><img src=""><span>Test</span></a></li>
                                    <li><a href="#"><img src=""><span>Test</span></a></li>
                                    <li><a href="#"><img src=""><span>Test</span></a></li>
                                </ul>
                              </div>
                            </div>
                        </div>
                        <!-- Nav tabs -->

    				</div>
    			</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


    <div class="container">
      <h2>ADD BOOK</h2>
      <form>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="input" class="form-control" id="title" placeholder="Enter Title">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="input" class="form-control" id="author" placeholder="Enter Author">
        </div>
        <div class="form-group">
          <label for="other">Other Information</label>
          <input type="input" class="form-control" id="other" placeholder="Enter Other Information">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" rows="5" id="description" placeholder="Enter Description"></textarea>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="input" class="form-control" id="link" placeholder="http://">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="input" class="form-control" id="image" placeholder="http://">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
