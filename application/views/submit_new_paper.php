<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome to XXX ConfSys</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/main.css">

        <script src="<?php echo base_url();?>/assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">SEMS ConfSys</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Submit New Paper:</h3>
				<p>Paper Info<p>
				<p>Uploading paper period is from 2012-07-15 to 2013-09-27<p>
				<p>You can only change the Title, Abstract, Authors, or paper file during this period. No author can be added or deleted after this period.<p>
				<p>Fields with * are required.<p>
				<p>The abstract must be at least 20 words, but no more than 200 characters including blank spaces. You can write the abstract in a text editor then copy and paste it in the appropriate field.<p>
			  
				
				<form role="form" class="form-horizontal">
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">*Paper Title:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="title">
						</div>
					</div>
					
					<div class="form-group">
						<label for="abstract" class="col-lg-2 control-label">*Paper Abstract:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="abstract">
						</div>
					</div>
					
					<div class="form-group">
						<label for="file" class="col-lg-2 control-label">*Paper File(PDF):</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="file">
						</div>
					</div>
					
					<div class="form-group">
						<label for="keywords" class="col-lg-2 control-label">*Keywords:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="keywords">
						</div>
					</div>
					
					<div class="form-group">
						<label for="subject" class="col-lg-2 control-label">*Paper Subject:</label>
						<div class="col-lg-10">
							<div class="checkbox">
								<label><input type="checkbox">Subject 1</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox">Subject 2</label>
							</div>
						</div>
					</div>
					
					<a href="#" class="btn btn-success" style="float:right;">Submit</a>
				</form>
			  
			</div>
		</div>

        <div class="col-lg-12">
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Best Concordia Team</p>
      </footer>
    </div> <!-- /container -->
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../<?php echo base_url();?>/<?php echo base_url();?>/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>/<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>