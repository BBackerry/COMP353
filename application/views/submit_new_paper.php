    <div class="container">
      
      <div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Submit New Paper:</h3>
				<p>Paper Info:<p>
				<p>Uploading paper period is from 2012-07-15 to 2013-09-27<p>
				<p>You can only change the Title, Abstract, Authors, or paper file during this period. No author can be added or deleted after this period.<p>
				<p>Fields with * are required.<p>
				<p>The abstract must be at least 20 words, but no more than 200 characters including blank spaces. You can write the abstract in a text editor then copy and paste it in the appropriate field.<p>
			  
				
				<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submitted/') ?>">
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">*Paper Title:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="title" name="title">
						</div>
					</div>
					
					<div class="form-group">
						<label for="abstract" class="col-lg-2 control-label">*Paper Abstract:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="abstract" name="abstract">
						</div>
					</div>
					
					<div class="form-group">
						<label for="file" class="col-lg-2 control-label">*Paper File(PDF):</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="file" name="file">
						</div>
					</div>
					
					<div class="form-group">
						<label for="keywords" class="col-lg-2 control-label">*Keywords:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="keywords" name="keywords">
						</div>
					</div>
					
					<div class="form-group">
						<label id="subject" name="subject" for="subject" class="col-lg-2 control-label">*Paper Subject:</label>
						<div class="col-lg-10">
							<div class="checkbox">
								<label><input type="checkbox">Subject 1</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox">Subject 2</label>
							</div>
						</div>
					</div>
					<button style="float:right;" class="btn btn-primary">Submit</button>
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