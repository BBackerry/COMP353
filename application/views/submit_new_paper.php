    <div class="container">
      <div class="row">
		<div class="panel panel-default">
			<div class="panel panel-heading">Submit New Paper</div>
			<div class="panel-body">
				<?php if($eventId != 1): ?>
					<p>You can only submit to an event that is currently in the phase of submitting papers.<p>
					<p>The submit phase is from <?= $submitPhase->startTime ?> to <?=$submitPhase->endTime?>.</p>
					<p>The abstract must be at least 20 words, but no more than 200 characters including blank spaces. You can write the abstract in a text editor then copy and paste it in the appropriate field.<p>
				  	<?php if(strtotime($submitPhase->startTime) < strtotime(date("Y-m-d H:i:s")) && strtotime($submitPhase->endTime) > strtotime(date("Y-m-d H:i:s"))): ?>
					<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submitted/') ?>" method="POST" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="title" class="col-lg-2 control-label">Paper Title:</label>
							<div class="col-lg-10">
								<input data-validate="required" type="text" class="form-control" id="title" name="title">
							</div>
						</div>
						
						<div class="form-group">
							<label for="abstract" class="col-lg-2 control-label">Paper Abstract:</label>
							<div class="col-lg-10">
								<textarea data-validate="required,max(200)" rows="4" type="text" maxlength="200" 
										class="form-control" id="abstract" name="abstract"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="file" class="col-lg-2 control-label">Paper File(PDF):</label>
							<div class="col-lg-10">
								<input data-validate="required" type="file" class="form-control" id="file" name="file">
							</div>
						</div>
						
						<div class="form-group">
							<label for="keywords" class="col-lg-2 control-label">Keywords:</label>
							<div class="col-lg-10">
								<input data-validate="required" type="text" class="form-control" id="keywords" name="keywords">
							</div>
						</div>
						
						<div class="form-group">
							<label id="subject" name="subject" for="subject" class="col-lg-2 control-label">Paper Topics:</label>
							<div class="col-lg-10">
								<select multiple name="subjects[]" class="form-control" data-validate="required">
									<?php foreach($topics as $row):?>
										<option value="<?= $row->idTopic ?>"><?= $row->topicName ?></option>
		        					<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="co-author" class="col-lg-2 control-label">Co-authors:</label>
							<div class="col-lg-10">
								<select multiple class="form-control" name="coauthors[]">
									<?php foreach($users as $row):?>
										<?php if ($row->idUser == $username) continue;?>
										<option value="<?= $row->idUser ?>"><?= $row->idUser .' - '.$row->lastName . ', '. $row->firstName?></option>
		        					<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						<button style="float:right;" class="btn btn-success">Submit</button>
						
					</form>
					<?php endif; ?>
					<?php if(!(strtotime($submitPhase->startTime) < strtotime(date("Y-m-d H:i:s")) && strtotime($submitPhase->endTime) > strtotime(date("Y-m-d H:i:s")))): ?>
				  		<h4>This event is not currently in the submit paper phase.</h4>
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if($eventId == 1): ?>
				<h4>Please select an event through the Switch Event tab before submitting a paper.</h4>
				<?php endif; ?>
				
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
		<script>window.jQuery || document.write('<script src="../../<?php echo base_url();?>/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>

		<script>  
			$("#eventSelect").change(function(){
				console.log('chnage');
				window.location.href = "<?= site_url('Paper/submitPaper')?>/" + $("#eventSelect").val();
			});
		</script>
    </body>
</html>