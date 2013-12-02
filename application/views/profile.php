   <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php foreach($user as $row):?>
      				<h3>My Profile:</h3>
					<h5>User Name: <?= $row->idUser ?></h5>
					<h5>First Name: <?= $row->firstName ?></h5>
					<h5>Last Name: <?= $row->lastName ?></h5>
					<h5>Email: <?= $row->email ?></h5>
				<?php endforeach; ?>
				<?php foreach($country as $row):?>
					<h5>Country: <?= $row->countryName ?></h5>
				<?php endforeach; ?>
				<?php foreach($organization as $row):?>
					<h5>Organization: <?= $row->organizationName ?></h5>
				<?php endforeach; ?>
				<?php foreach($department as $row):?>
					<h5>Department: <?= $row->departmentName ?></h5>
				<?php endforeach; ?>
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
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
