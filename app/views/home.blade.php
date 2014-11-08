<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dhwasta - What's Broken?</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/paper/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
		  	<div class="page-header">
		  		<h1>Dhwasta <small><a href="/add">What's Broken?</a></small></h1>
			  </div>
		  </div>
  		<div class="col-md-12">
      @foreach($places as $place)
		  	<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{{ $place->name }}}</h3>
		  		</div>
		  		<div class="panel-body">
		    		<img class="img-responsive" src="http://maps.googleapis.com/maps/api/staticmap?markers={{ $place->name }}&size=640x150&maptype=roadmap&scale=2">
		  		</div>
	  		  <div class="panel-footer">
            <div class="btn-group btn-group-justified">
  					  <div class="btn-group">
                {{ Form::open(array('url' => 'broken/' . $place->id)) }}
                <button type="submit" class="btn {{ $place->status() == 'broken' ? 'btn-primary' : 'btn-default '}}">Broken <span class="badge">{{ $place->broken }}</span></button>{{ Form::close() }}</li>
  					  </div>
              <div class="btn-group">
                {{ Form::open(array('url' => 'beingfixed/' . $place->id)) }}
                <button type="submit" class="btn {{ $place->status() == 'beingfixed' ? 'btn-primary' : 'btn-default '}}">Being Fixed <span class="badge">{{ $place->beingfixed }}</span></button>{{ Form::close() }}</li>
              </div>
              <div class="btn-group">
                {{ Form::open(array('url' => 'fixed/' . $place->id)) }}
                <button type="submit" class="btn {{ $place->status() == 'fixed' ? 'btn-primary' : 'btn-default '}}">Fixed <span class="badge">{{ $place->fixed }}</span></button>{{ Form::close() }}</li>
              </div>
  					</div>
	  		  </div>
			  </div>
      @endforeach
  		</div>
  	</div>
  </div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </body>
</html>
