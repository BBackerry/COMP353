<div class="container">
	<div class="row">
	<div class="panel panel-default">
		<div class="panel panel-heading">Event Details</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form">
				<div class="list-group">
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Event Title</label>
						<div class="col-lg-10">
							<p class="form-control-static"><?= $event->eventName ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Event Description</label>
						<div class="col-sm-10">
							<p class="form-control-static"><?= $event->eventDescription ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Created By</label>
						<div class="col-lg-10">
							<p class="form-control-static"><?= $event->createdBy ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Start Date</label>
						<div class="col-lg-10">
							<p class="form-control-static"><?= $event->startDate ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">End Date</label>
						<div class="col-lg-10">
							<p class="form-control-static"><?= $event->endDate ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Program Chair(s)</label>
						<div class="col-lg-10">
							<ul class="list-group">
								<?php foreach($programChairs as $row): ?>
									<li class="list-group-item"><?= $row->idUser ?> - <?= $row->lastName ?>, <?= $row->firstName ?></li>											
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Committee Member(s)</label>
						<div class="col-lg-10">
							<ul class="list-group">
								<?php foreach($committeeMembers as $row): ?>
									<li class="list-group-item"><?= $row->idUser ?> - <?= $row->lastName ?>, <?= $row->firstName ?></li>											
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Event Topic(s)</label>
						<div class="col-lg-10">
							<ul class="list-group">
								<?php foreach($topics as $row): ?>
									<li class="list-group-item"><?= $row->topicName?></li>											
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Event Meeting(s)</label>
						<div class="col-lg-10">
							<ul class="list-group">
								<?php foreach($meetings as $row): ?>
									<li class="list-group-item"><?= date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?= date( "Y-m-d H:i:s", strtotime($row->endTime)) ?></li>											
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label well well-sm">Event Phases</label>
						<div class="col-lg-10">
							<div class="list-group">
								<?php foreach($phaseTypeDetail as $row): ?>
										<?php foreach($phaseDetail as $phase): ?>
											<?php if($row->idPhase == $phase->idPhase):?>
												<div class="list-group">
													<div class="list-group-item">
														<h5 class="list-group-item-heading"><?= ucfirst($row->phaseName) ?></h5>
														<div class="list-group">
															<li class="list-group-item">Start Date: <?= date( "Y-m-d H:i:s", strtotime($phase->startTime))?></li>
															<li class="list-group-item">End Date: <?= date( "Y-m-d H:i:s", strtotime($phase->endTime)) ?></li>
														</div>
													</div>
												</div>
											<?php endif; ?>	
										<?php endforeach; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</form>
			
			
			<a href="<?= site_url('Event/eventPapers') . '?idEvent=' . $event->idEvent ?>" class="btn btn-primary" style="float:right;margin-left:10px;">View Submitted Papers</a>
			<a href="<?= site_url('Event/editEvent') . '?idEvent=' . $event->idEvent ?>" class="btn btn-success" style="float:right">Edit Event</a>
				
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
		<script src="<?= base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?= base_url();?>/assets/js/plugins.js"></script>
		<script src="<?= base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script src="<?= base_url();?>/assets/js/main.js"></script>
    </body>
</html>
