    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Search for Paper</div>
			<div class="panel-body">
			
			
				
				<form role="form" class="form-horizontal" action="<?= site_url('Paper/submitSearch/') ?>">
					

					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Author</label>
						<div class="col-lg-10">
							<input type="text" name="author" class="form-control" name="author">
						</div>
					</div>
			 
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Keywords</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="keywords">
						</div>  
					</div>

					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Paper Title</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="title">
						</div>  
					</div>
			
					<button style="float:right;" class="btn btn-primary">Submit</button>
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
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
