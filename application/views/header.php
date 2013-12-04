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
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/jquery-ui.js">
		
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
		<?php if ($this->session->userdata('idUser') == false) { ?>
            		<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
		<?php } else { ?>
			<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('User/profile');?>">My Profile</a></li>
					<li><a href="<?php echo site_url('User/interests');?>">My Interests</a></li>
				</ul>
           	</li>
           	<li class="dropdown">
                    <a href="<?php echo site_url('Paper/submittedPapers'); ?>" class="dropdown-toggle" data-toggle="dropdown">Papers<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    	<li><a href="<?php echo site_url('Paper/submittedPapers');?>">My Papers</a></li>
                        <li><a href="<?php echo site_url('Paper/submit');?>">Submit New Paper</a></li>
                    </ul>
            </li>
			
            <?php if ($this->session->userdata('isAdmin')) { ?>
                <li class="dropdown">
                    <a href="<?php echo site_url('Event/viewEvents'); ?>" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    	<li><a href="<?php echo site_url('Event/listEvents');?>">View Events</a></li>
                        <li><a href="<?php echo site_url('Event/addEvent');?>">Create Event</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo site_url('Meeting/viewMeetings'); ?>" class="dropdown-toggle" data-toggle="dropdown">Meeting<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Meeting/createMeeting');?>">Create Meeting</a></li>  
                        <li><a href="<?php echo site_url('Meeting/ViewAllMeetings');?>">View Meetings</a></li>
                    </ul>
                </li>  
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Admin/manageUsers'); ?>">Manage Users</a></li>  
                        <li><a href="<?php echo site_url('Admin/manageTopic'); ?>">Manage Topics</a></li> 
                    </ul>
                </li>        
            <?php } ?>
            
            <?php if ($this->session->userdata('isCommitteeMember')) { ?>
	            <li class="dropdown">
	                <a href="<?php echo site_url('Paper/paperReview'); ?>" class="dropdown-toggle" data-toggle="dropdown">Paper Review<b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                    <li><a href="<?php echo site_url('Paper/paperReview');?>">My Allocated Papers</a></li>  
	                </ul>
               </li> 
            <?php } ?>
		<?php } ?>

          </ul>
		  <?php if ($this->session->userdata('idUser') == false) { ?>
			  <form class="navbar-form navbar-right" action="<?php echo site_url('User/login'); ?>">
				<div class="form-group">
				  <input type="text" name="username" placeholder="Username" class="form-control">
				</div>
				<div class="form-group">
				  <input type="password" name="password" placeholder="Password" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Log In</button>
			  </form>
			  <form class="navbar-form navbar-right" action="<?php echo site_url('User/register_email'); ?>">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			  </form>
		  <?php } else { ?>
			  <form class="navbar-form navbar-right" action="<?php echo site_url('User/logout'); ?>">
				<div class="form-group">
					<p style="color:white">Welcome, <?php echo $this->session->userdata('idUser') ?> &nbsp;
					<button type="submit" class="btn btn-failure">Log Out</button>
				</div>
				
			  </form>
		  <?php } ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	
	<?php if(isset($errorMessages)): ?>
	<div>
		<?php foreach($errorMessages as $error): ?>
			<div class="alert alert-danger">
				<?= $error ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
    
    <?php if(isset($successMessages)): ?>
	<div>
		<?php foreach($successMessages as $success): ?>
			<div class="alert alert-success">
				<?= $success ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
  