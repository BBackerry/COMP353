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

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/css/main.css">

        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
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
        
        
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      
      <h2 class="panel-title">Add a new Event</h2>
            
      <div class="panel-body">
        <p>Add a new Event for conference:</p>
        
        <form role="form" class="form-horizontal">
        <table class="table">
        
        <tr>
        <div class="form-group">
        <td><h4 class="panel-title">Event Title </h4></td>
        <td><input type="text" class="form-control" name ="event name"></td>  
        </div>        
        </tr>
        
        <tr>
        <div class="form-group">
        <td><h4 class="panel-title">Event Description</h4></td>
        <td><input type="text"  class="form-control" name ="event description" style= "height:200px;"></td>
        </div>
        </tr>
        
        <tr>
        <div class="form-group">
        <td><h4>Subject Hierarchy Class </h4></td>
        <td><select class="form-control" id="idTopicHierarchy">
        <option value = "ACM">ACM</option>
        <option value="??">??</option>
        </select>
        </td>        
        </div>
        </tr>
        
         <tr>
         <div class="form-group">
        <td><h4>Start Date: </h4></td>
        <td><input type="text" class="form-control" name ="event start date" id="startDate"></td>        
        </div>
        </tr>
        
          <tr>
          <div class="form-group">
        <td><h4>End Date: </h4></td>
        <td><input type="text" class="form-control" name ="event end date" id="endDate"></td>        
        </div>
        </tr>
        
        <tr>
        <div class="form-group">
        <td><h4>Scheduling Template </h4></td>
        <td><select class="form-control">
        <option value = "Use the system default">Use the system default</option>
        <option value="??">??</option>
        </select>
        </td>        
        </div>
        </tr>
        
        <tr>
        <div class="form-group">
        <td><h4>Copy Groups From </h4></td>
        <td><select class="form-control">
        <option value = "don't copy">Don't copy</option>
        <option value="??">??</option>
        </select>
        </td>        
        </div>
        </tr>
        
        
        <tr>
        <div class="form-group">
        <td><h4>Scheduling Template </h4></td>
        <td>
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon">
        <input type="radio" name="first" value="Request Full Paper"> Request Full Paper
        </span>
        <span class="input-group-addon">
        <input type="radio" name="second" value="Request Abstract"> Request Abstract   <br>
       </span>
       <input type="checkbox" name="firstcheckbox" value="Enable Registration Control">Enable Registration Control<br>
        <input type="checkbox" name="secondcheckbox" value="Enable Paper Auction">Enable Paper Auction<br>
        <input type="checkbox" name="thirdcheckbox" value="Enable Paper Review">Enable Paper Review<br>
        <input type="checkbox" name="fourthcheckbox" value="Enable Auto Review Allocation">Enable Auto Review Allocation<br>
        <input type="checkbox" name="fifthcheckbox" value="Enable Blind Debate">Enable Blind Debate<br>
        <input type="checkbox" name="sixthcheckbox" value="Request Publisher Copyright Form">Request Publisher Copyright Form<br>
        <input type="radio" name="upload" value="upload"> Upload<br>
        <input type="radio" name="inline" value="inline"> Inline<br>
        <input type="radio" name="online" value="online"> Online<br>
        <input type="checkbox" name="seventhcheckbox" value="Request CINDI Copyright Form">Request CINDI Copyright Form<br>
        <input type="radio" name="upload" value="upload"> Upload<br>
        <input type="radio" name="inline" value="inline"> Inline<br>
        <input type="radio" name="online" value="online"> Online<br>
        <input type="checkbox" name="eighthcheckbox" value="Request Final Version">Request Final Version<br>
        <input type="checkbox" name="ninethcheckbox" value="Request slide">Request Slide<br>
        <input type="checkbox" name="tenthcheckbox" value="Enable presentation/meeting">Enable Presentation/Meeting<br>
        <input type="checkbox" name="eleventhcheckbox" value="Check Embedded Fonts of PDF file">Check Embedded Fonts of PDF file<br>
        </td> 
        </div>        
        </tr>
        
        </table>
        </form>
        
        
        <div class="form-group">
        <a href="<?php echo site_url('AddEvent/addEvent/') ?>" class="btn btn-primary">Add this new Event</a>
        
        <button type="cancel" class="btn btn-default">cancel</button>
 
       -->
       </div>
       
       
      </div>
    </div>
    </div>
    </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->

         <footer>
        <p>&copy; Best Concordia Team</p>
      </footer>
    </div> <!-- /container -->
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="assets/js/vendor/bootstrap.min.js"></script>
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/main.js"></script>
    </body>
</html>
