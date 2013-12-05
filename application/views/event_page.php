	<div class="container">
		<div class="row">
			<div class="panel-body">
				<div >

					<h3>Event Page</h3>   
						
						
					<label class="col-lg-3 control-label">Event Title: </label><div class="col-sm-9"><p class="col-sm-9"><?= $event->eventName ?></p></div>
					
					<label class="col-lg-3 control-label"> Event Description: </label><div class="col-sm-9"><p class="col-sm-9"><?= $event->eventDescription ?></p></div>
					
					<label class="col-lg-3 control-label">Created By: </label><div class="col-sm-9"><p class="col-sm-9"><?= $event->createdBy ?></p></div>
					  
					<label class="col-lg-3 control-label">Start Date: </label><div class="col-sm-9"><p class="col-sm-9"><?= $event->startDate ?></p></div>
					
					<label class="col-lg-3 control-label">End Date: </label><div class="col-sm-9"><p class="col-sm-9"><?= $event->endDate ?></p> </div>              
					
					<label class="col-lg-3 control-label">Program Chair(s): </label>
                    <div class="col-sm-9">
						<?php foreach($programChairs as $row): ?> 
								<p class="col-sm-9"><?php echo $row->idUser ?> - <?php echo $row->lastName ?>, <?php echo $row->firstName ?></p>											
						<?php endforeach; ?>
					</div>
					
					<label class="col-lg-3 control-label">Committee Member(s): </label>
                    <div class="col-sm-9">
						<?php foreach($committeeMembers as $row): ?> 
								<p class="col-sm-9"><?php echo $row->idUser ?> - <?php echo $row->lastName ?>, <?php echo $row->firstName ?></p>											
						<?php endforeach; ?>
					</div>
				
				
					<label class="col-lg-3 control-label">Event Topics:</label><br />
                    <div class="col-sm-9">
					<?php foreach($topics as $row): ?> 
						<p class="col-sm-9"><?= $row->topicName?></p>		
					<?php endforeach; ?>	
                    </div>
					<br />
					<br />
					<?php if(isset($papers)): ?>
					<label class="col-lg-3 control-label">Event Meeting(s): </label>
                    <div class="col-sm-9">
						<?php foreach($meetings as $row): ?> 
							<p class="col-sm-9">
								<?php echo date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?php echo date( "Y-m-d H:i:s", strtotime($row->endTime)) ?>
							</p>					
						<?php endforeach; ?>
                    </div>
					<?php endif; ?>
					
					<label class="col-lg-3 control-label">Event Phases: </label>
                    <div class="col-sm-9">
                        <?php foreach($phaseTypeDetail as $row): ?>
                        <?php foreach($phaseDetail as $phase): ?> 
                            <?php if($row->idPhase == $phase->idPhase):?>
                                <label class="col-sm-2 control-label"> Phase <?php echo $row->idPhase?>: </label><p class="col-sm-12"><?php echo $row->phaseName?></p>						
                                <label class="col-sm-2 control-label"> Start Date:</label><p class="col-sm-12"><?php echo date( "Y-m-d H:i:s", strtotime($phase->startTime))?> </p>
                                <label class="col-sm-2 control-label"> End Date:</label> <p class="col-sm-12"><?php echo date( "Y-m-d H:i:s", strtotime($phase->endTime)) ?></p>
                                <br />
                            <?php endif; ?>				
                        <?php endforeach; ?>	   
                        <?php endforeach; ?>
						
					</div>
					<form role="form" class="form-horizontal" name="createEvent" action="<?php echo site_url('Paper/searchPaper/') ?>">
							<button style="float:right;" class="btn btn-primary">Search for Paper</button>

						</form>
					<a style="float:left;" href="<?= site_url('Event/eventPapers') . '?idEvent=' . $event->idEvent ?>" class="btn btn-primary">View Submitted Papers</a>
					<a href="<?= site_url('Event/editEvent') . '?idEvent=' . $event->idEvent ?>" style="float:right;" class="btn btn-primary">Edit Event</a>
					
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
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
