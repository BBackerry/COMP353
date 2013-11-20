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
          <a class="navbar-brand" href="#">SEMS ConfSys</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
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
			<a href="<?php echo site_url('UserRegistration/index/') ?>" class="btn btn-primary">Register</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
          <h3>Add a new Event for conference:</h3>  
      <div class="panel-body">
        
        
    
        <div class="form-group">
        <p> Event Title </p>
        <input type="text" class="form-control" name ="event name" id="eventTitle">
        </div>        
        
        
        
        <div class="form-group">
        <p>Event Description</p>
        <input type="text"  class="form-control" name ="event description" style= "height:200px;" id= "eventDescription">
        </div>
   
        
        
        <div class="form-group">
        <p>Subject Hierarchy Class </p>
        <select class="form-control" id="idTopicHierarchy">
        <option value = "ACM">ACM</option>
        <option value="??">??</option>
        </select>
              
        </div>
       
        
         
         <div class="form-group">
        <p>Start Date: </p>
        <input type="text" class="form-control" name ="event start date" id="startDate">
        </div>
       
          <div class="form-group">
        <p>End Date: </p>
        <input type="text" class="form-control" name ="event end date" id="endDate">        
        </div>
        
        
        
        <div class="form-group">
        <p>Scheduling Template </p>
        <select class="form-control" id="schedulingTemplate">
        <option value = "Use the system default">Use the system default</option>
        <option value="??">??</option>
        </select>
                
        </div>
        
        
        
        <div class="form-group">
        <p>Copy Groups From </p>
        <select class="form-control" id = "copyGroupsFrom">
        <option value = "don't copy">Don't copy</option>
        <option value="??">??</option>
        </select>
                
        </div>
        
        
        
        
        <div class="form-group">
        <p>Choose Event Parameter </p>
        
        <div class="col-lg-6">
       
        <input type="radio" name="first" value="Request Full Paper" id="requestFullPaper"> Request Full Paper <br>
    
        <input type="radio" name="second" value="Request Abstract" id="requestAbstract"> Request Abstract<br>
      
       <input type="checkbox" name="firstcheckbox" value="Enable Registration Control" id="enableRegistration">Enable Registration Control<br>
        <input type="checkbox" name="secondcheckbox" value="Enable Paper Auction" id="enablePaperAuction">Enable Paper Auction<br>
        <input type="checkbox" name="thirdcheckbox" value="Enable Paper Review" id="enablePaperReview">Enable Paper Review<br>
        <input type="checkbox" name="fourthcheckbox" value="Enable Auto Review Allocation" id="enableAutoReviewAllocation">Enable Auto Review Allocation<br>
        <input type="checkbox" name="fifthcheckbox" value="Enable Blind Debate" id="enableBlindDebate">Enable Blind Debate<br>
        <input type="checkbox" name="sixthcheckbox" value="Request Publisher Copyright Form" id="requestPublisherCpoyright">Request Publisher Copyright Form<br>
            
       <input type="radio" name="upload" value="upload" id="upload"> Upload<br>
        <input type="radio" name="inline" value="inline" id="inline"> Inline<br>
        <input type="radio" name="online" value="online" id="online"> Online<br>
        <br>
        <input type="checkbox" name="seventhcheckbox" value="Request CINDI Copyright Form" id="requestCIDI">Request CINDI Copyright Form<br>
        <input type="radio" name="upload" value="upload" id="upload1"> Upload<br>
        <input type="radio" name="inline" value="inline" id="inline1"> Inline<br>
        <input type="radio" name="online" value="online" id="online1"> Online<br>
        <br>
        <input type="checkbox" name="eighthcheckbox" value="Request Final Version" id="requestFinal">Request Final Version<br>
        <input type="checkbox" name="ninethcheckbox" value="Request slide" id="requestSlide">Request Slide<br>
        <input type="checkbox" name="tenthcheckbox" value="Enable presentation/meeting" id="enablePresentation">Enable Presentation/Meeting<br>
        <input type="checkbox" name="eleventhcheckbox" value="Check Embedded Fonts of PDF file" id="checkFonts">Check Embedded Fonts of PDF file<br>
        
         <a href="<?php echo site_url('Event/submit/') ?>" class="btn btn-success" >Add New Event</a>
        
        <button type="cancel" class="btn btn-success" >cancel</button>
        
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
