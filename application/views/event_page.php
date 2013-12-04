	<div class="container">
		<div class="row">
			<div class="panel-body">
				<div class="panel panel-default">
      
      				<h3>Event Page</h3>     
			        	 
					<label class="col-lg-2 control-label">Event Title: </label><p><?= $event->eventName ?></p>
					  
					<label class="col-lg-2 control-label"> Event Description: </label><p><?= $event->eventDescription ?></p>
					
					<label class="col-lg-2 control-label">Created By: </label><p><?= $event->createdBy ?></p>
					      
					<label class="col-lg-2 control-label">Start Date: </label><p><?= $event->startDate ?></p>
					
					<label class="col-lg-2 control-label">End Date: </label><p><?= $event->endDate ?></p>               
					
					<label class="col-lg-2 control-label">Event Topics:</label><br />
					<ul class="list-group">
						<?php foreach($topics as $row): ?> 
							<li class="list-group-item"><?= $row->topicName?></li>		
						<?php endforeach; ?>
					</ul>
					<br />
					
					<?php if(isset($papers)): ?>
						<label class="col-lg-2 control-label">Event Meeting(s): </label>
						<ul class="list-group">
							<?php foreach($meetings as $row): ?> 
								<li class="list-group-item">
									<?php echo date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?php echo date( "Y-m-d H:i:s", strtotime($row->endTime)) ?>
								</li>					
							<?php endforeach; ?>
						</ul>
						<br />
					<?php endif; ?>
					
					<label class="col-lg-2 control-label">Event Phases: </label> <br/><br/>
					<?php foreach($phaseTypeDetail as $row): ?>
						<?php foreach($phaseDetail as $phase): ?> 
							<?php if($row->idPhase == $phase->idPhase):?>
								<label class="col-lg-2 control-label"> Phase <?php echo $row->idPhase?>: </label><p><?php echo $row->phaseName?></p>						
								<label class="col-lg-2 control-label"> Start Date:</label><p><?php echo date( "Y-m-d H:i:s", strtotime($phase->startTime))?> </p>
								<label class="col-lg-2 control-label"> End Date:</label> <p><?php echo date( "Y-m-d H:i:s", strtotime($phase->endTime)) ?></p>
								<br />
							<?php endif; ?>				
						<?php endforeach; ?>	   
					<?php endforeach; ?>
					
					<a style="float:left;" href="<?= site_url('Event/eventPapers') . '?idEvent=' . $event->idEvent ?>" class="btn btn-primary">View Submitted Papers</a>
					<a href="<?= site_url('Event/editEvent') . '?idEvent=' . $event->idEvent ?>" style="float:right;" class="btn btn-primary">Edit Event</a>

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
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
