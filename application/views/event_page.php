      <div class="container">
	  <div class="row">
	  <div class="panel-body">
	  
		<div class="panel panel-default">
      
      <h3>Event Page</h3>     
		
		
		<?php foreach($getEvent as $row): ?> 
			
        <div class="form-group">	 
			<label class="col-lg-2 control-label">Event Title: </label><p><?= $row->eventName ?></p>
        </div>                 
        
        <div class="form-group">
			<label class="col-lg-2 control-label"> Event Description: </label><p><?= $row->eventDescription ?></p>
        </div>
   
         <div class="form-group">
			<label class="col-lg-2 control-label">Created By: </label><p><?= $row->createdBy ?></p>
        </div>                
         
        <div class="form-group">
			<label class="col-lg-2 control-label">Start Date: </label><p><?= $row->startDate ?></p>
        </div>
       
        <div class="form-group">
        <label class="col-lg-2 control-label">End Date: </label><p><?= $row->endDate ?></p>               
        </div>          
        <?php endforeach; ?>
       
	   <?php foreach($EventTopicDetail as $row): ?> 
			<div class="form-group">	 
				<label class="col-lg-2 control-label">Event Topic(s):</label><p><?= $row->topicName?> </p>		
			</div> 	
						
		<?php endforeach; ?>
	
		
		 <?php foreach($meetings as $row): ?> 
			<div class="form-group">	 
				<label class="col-lg-2 control-label">Event Meeting(s): </label>
					<p><?php echo date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?php echo date( "Y-m-d H:i:s", strtotime($row->endTime)) ?></p>					
			</div> 
			<br>
		<?php endforeach; ?>
		<label class="col-lg-2 control-label">Phase Date Details: </label> <br/><br/>
		<?php foreach($phaseTypeDetail as $row): ?>
		
			<?php foreach($phaseDetail as $phase): ?> 
				<?php if($row->idPhase == $phase->idPhase):?>
					
						
						<label class="col-lg-2 control-label"> Phase <?php echo $row->idPhase?>: <?php echo $row->phaseName?> </label>
							<br>
							<br>							
						<label class="col-lg-2 control-label"> Start Date:</label><p><?php echo date( "Y-m-d H:i:s", strtotime($phase->startTime))?> </p>
						<label class="col-lg-2 control-label"> End Date:</label> <p><?php echo date( "Y-m-d H:i:s", strtotime($phase->endTime)) ?></p>
						
				 
				<?php endif; ?>				
			<?php endforeach; ?>	   
		<?php endforeach; ?>

		
					
      				 
		<form role="form" class="form-horizontal" name="viewEvent" action="<?php echo site_url('Event/editEvent/') ?>" >
       
		<button style="float:right;" class="btn btn-primary">Edit Event</button>
		
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
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
