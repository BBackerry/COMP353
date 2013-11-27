    <div class="container">
      
      <div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Your paper has been submitted successfully.</h3>
				
				<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submittedPapers/') ?>">
					<button style="float:left;" class="btn btn-primary">Submitted Papers</button>
				</form>
				
				<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submit/') ?>">
					<button style="float:right;" class="btn btn-primary">Submit New Paper</button>
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