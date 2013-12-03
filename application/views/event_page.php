      <div class="container">
	  <div class="row">
      <br>
      <h3>Event Page</h3>
      <div class="panel-body">
	  
		<div class="panel panel-default">
					
      				 
		<form role="form" class="form-horizontal" name="viewEvent" action="<?php echo site_url('Event/editEvent/') ?>" >
       
		
		<?php foreach($eventDetail as $row): ?> 
			
        <div class="form-group">	 
			<label><b>Event Title: </b><br> <?= $row->eventName ?> </label>		
        </div>                 
        
        <div class="form-group">
			<label><b> Event Description: </b><br><?= $row->eventDescription ?></label>
        </div>
   
         <div class="form-group">
			<label><b>Created By: </b><?= $row->createdBy ?></label>
        </div>                
         
        <div class="form-group">
			<label><b>Start Date: </b><?= $row->startDate ?></label>
        </div>
       
        <div class="form-group">
        <label><b>End Date: </b><?= $row->endDate ?></label>               
        </div>          
        <?php endforeach; ?>
       
	   <?php foreach($EventTopicDetail as $row): ?> 
			<div class="form-group">	 
				<label><b>Event Topic(s): </b> <br><?= $row->topicName?> </label>		
			</div> 	
			<br>			
		<?php endforeach; ?>
	
		
		 <?php foreach($meetingDetail as $row): ?> 
			<div class="form-group">	 
				<label><b>Event Meeting(s): </b> <br>
					<?php echo date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?php echo date( "Y-m-d H:i:s", strtotime($row->endTime)) ?>			
				</label>	
			</div> 
			   <br>
		<?php endforeach; ?>
		
		<?php foreach($phaseTypeDetail as $row): ?>
		<div class="form-group">
			<label><b>Phase Date Details: </b></label> 
			<label> Phase<?php echo $row->idPhase?> </label>
			<label>:</label>
			<label> <?php echo $row->phaseName?> </label>
			
				</div> 
			   
		<?php endforeach; ?>
			
		 <?php foreach($phaseDetail as $row): ?> 
		  
			<div class="form-group">			
								
				<label>Phase Start Date: <?php echo date( "Y-m-d H:i:s", strtotime($row->startTime))?> </label>
				<label>Phase End Date: <?php echo date( "Y-m-d H:i:s", strtotime($row->endTime)) ?></label>
					
			</div> 
			   
		<?php endforeach; ?>

		
		
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
