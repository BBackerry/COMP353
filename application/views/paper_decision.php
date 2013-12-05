     <div class="container">
     	<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Decide on Papers</div>
				<div class="panel-body">
      				<p>Only papers submitted to events that are currently in the decision phase are shown.</p>
					<?php if(isset($map)): ?>
						<?php foreach($map as $obj): ?>
							<div class="list-group">
								<div href="#" class="list-group-item">
								<h4 class="list-group-item-heading"><?= $obj['event']->eventName ?></h4>
									<?php foreach($obj['papers'] as $paper): ?>
									<?php
										if(!empty($paper->decision)) {
											if($paper->decision[0]->decision == 1) {
												$control_state = "has-success";
												$selected = true;
											}
											else {
												$control_state = "has-error";
												$selected = false;
											}
											$reason = $paper->decision[0]->reason;
										}
										else {
											$control_state = "";
											$selected = "";
											$reason = "";
										}
									?>
									<form class="form-inline" role="form" method="post" action="<?= site_url('Paper/updateDecision') ?>">
										<div class="list-group <?= $control_state ?>">
											<div class="list-group-item">
												<h5 class="list-group-item-heading"><?= $paper->title ?></h5>
												<p class="list-group-item-text"><?= $paper->abstract ?></p>
												<hr />
												<div class="form-group">
													<label class="sr-only" for="reason">Reason</label>
													<input type="text" class="form-control" name="reason" value="<?= $reason ?>" data-validate="required">
												</div>
												<div class="form-group">
													<label class="sr-only" for="decision">Decision</label>
													<select class="form-control" name="decision" data-validate="required">
														<option <?= $selected ? "" : "selected" ?> value="0">Reject</option>
														<option <?= $selected ? "selected" : "" ?> value="1">Accept</option>
													</select>
												</div>
												<input type="hidden" name="idPaper" value="<?= $paper->idPaper ?>">
												<button type="submit" class="btn btn-success">Update Decision</button>
											</div>
										</div>
									</form>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
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
