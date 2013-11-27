    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				
      				<h3>My Paper List:</h3>
      				
        			<?php foreach($first as $row):?> 
        			<h4>Title: <?=$row->title?></h4>
        			<h5>Abstract: <?=$row->abstract?></h5>
        			<h5>Keywords: <?=$row->keywords?></h5>
        			<br />
        			<?php endforeach;?>
        			
				<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submit/') ?>">
					<button style="float:right;" class="btn btn-primary">Submit New Paper</button>
				</form>
        
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
