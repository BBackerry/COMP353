      <div class="container">
	  <div class="row">
	  <div class="panel-body">
	  
		<div >
      
      <h3>Event Page</h3> 
        <br/>
        <div class="form-group">	 
			<label class="col-lg-2 control-label">Event Title: </label><p><?= $event->eventName ?></p>
        </div>                 
        
        <div class="form-group">
			<label class="col-lg-2 control-label"> Event Description: </label><p><?= $event->eventDescription ?></p>
        </div>
   
         <div class="form-group">
			<label class="col-lg-2 control-label">Created By: </label><p><?= $event->createdBy ?></p>
        </div>                
         
        <div class="form-group">
			<label class="col-lg-2 control-label">Start Date: </label><p><?= $event->startDate ?></p>
        </div>
       
        <div class="form-group">
        <label class="col-lg-2 control-label">End Date: </label><p><?= $event->endDate ?></p>               
        </div>
       
        <label class="col-lg-2 control-label">Event Topics:</label>
        <div class="col-sm-10">
	   <?php foreach($topics as $row): ?> 
				<p><?= $row->topicName?></p>
		<?php endforeach; ?>
        </div>
		
        <div class="form-group">	 
            <label class="col-lg-2 control-label">Event Meeting(s): </label>
             <div class="col-sm-10">
             <?php foreach($meetings as $row): ?> 
                        <p><?php echo date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?php echo date( "Y-m-d H:i:s", strtotime($row->endTime)) ?></p>				
            <?php endforeach; ?>
            </div>
        </div> 
			<br>
		<label class="col-lg-2 control-label">Phase Date Details: </label> 
        <div class="col-sm-10">
		<?php foreach($phaseTypeDetail as $row): ?>
		
			<?php foreach($phaseDetail as $phase): ?> 
				<?php if($row->idPhase == $phase->idPhase):?>
					
						
						<label class="col-lg-2 control-label"> Phase <?php echo $row->idPhase?>: <?php echo $row->phaseName?> </label>
							<br/>	
                            <br/>
						<label class="col-lg-2 control-label"> Start Date:</label><p><?php echo date( "Y-m-d H:i:s", strtotime($phase->startTime))?> </p>
						<label class="col-lg-2 control-label"> End Date:</label> <p><?php echo date( "Y-m-d H:i:s", strtotime($phase->endTime)) ?></p>
                            <hr/>
				 
				<?php endif; ?>				
			<?php endforeach; ?>	   
		<?php endforeach; ?>
        </div>
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
