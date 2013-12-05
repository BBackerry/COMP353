	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Bid on Paper</div>
				<div class="panel-body">
	      			<?php foreach($paper as $row):?>
						<form class="form-horizontal" role="form">
							<div class="list-group">
							<div class="form-group">
								<label for="title" class="col-lg-2 control-label well well-sm">Paper Title</label>
								<div class="col-lg-10">
									<a name="title" class="form-control-static" href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $row->idPaper ?>"><?= $row->title ?></a>
								</div>
							</div>
							<div class="form-group">
								<label for="abstract" class="col-lg-2 control-label well well-sm">Paper Abstract</label>
								<div class="col-lg-10">
									<p name="abstract" class="form-control-static"><?= $row->abstract ?></p> 
								</div>
							</div>
							<?php if(isset($topics)): ?>
							<div class="form-group">
								<label for="topics" class="col-lg-2 control-label well well-sm">Paper Topic(s)</label>
								<div class="col-lg-10">
									<ul class="list-group" name="topics">
										<?php foreach($topics as $topic): ?>
											<li class="list-group-item"><?= $topic->topicName?></li>											
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
							<?php endif; ?>
							<div class="form-group">
								<label for="submittedBy" class="col-lg-2 control-label well well-sm">Submitted By</label>
								<div class="col-lg-10">
									<p name="submittedBy" class="form-control-static"><?= $row->submittedBy ?></p> 
								</div>
							</div>
							<div class="form-group">
								<label for="submittedBy" class="col-lg-2 control-label well well-sm">Submitted to Event</label>
								<div class="col-lg-10">
									<p name="submittedBy" class="form-control-static"><?= $event->eventName ?></p> 
								</div>
							</div>
							<div class="form-group">
								<label for="submittedBy" class="col-lg-2 control-label well well-sm">Bidding Deadline</label>
								<div class="col-lg-10">
									<p name="submittedBy" class="form-control-static"><?= $bidPhase->endTime ?></p> 
								</div>
							</div>
							</div>
		            	</form>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Paper Review</div>
				<div class="panel-body">
		            	<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submitBid/') . '?idPaper=' . $row->idPaper ?>" method="POST">
		            		<div class="form-group">
					            <label for="bid" class="col-lg-2 control-label"><b>My Bid</b></label>  
								<div class="col-lg-10">
									<select class="form-control" name="bid" data-validate="required">
										<option value="1">1.0</option>
										<option value="2">2.0</option>
										<option value="3">3.0</option>
										<option value="4">4.0</option>
										<option value="5">5.0</option>
										<option value="6">6.0</option>
										<option value="7">7.0</option>
										<option value="8">8.0</option>
										<option value="9">9.0</option>
										<option value="10">10.0</option>         
									</select>
								</div>
					        </div>
					        <button style="float:right;" class="btn btn-success">Submit Bid</button>
		            	</form>
	            	<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
   
    <div class="container">
         <footer>
        <p>&copy; Best Concordia Team</p>
      </footer>
    </div> <!-- /container -->
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
