	  <script language="JavaScript" src="../assets/js/ts_picker.js">
		//Script by Denis Gritcyuk: tspicker@yahoo.com
		//Submitted to JavaScript Kit (http://javascriptkit.com)
		//Visit http://javascriptkit.com for this script
	  </script>
	  
	  <div class="container">
          <h3>Add a new Event for conference:</h3>  
      <div class="panel-body">
        
        
		<form role="form" class="form-horizontal" name="createEvent" action="<?php echo site_url('Event/submitedEvent/') ?>" >
       
	   <div class="form-group">
        <label> Event Title: </label>
        <input type="text" class="form-control" name ="eventName" id="eventName">
        </div>        
        
        
        
        <div class="form-group">
        <label>Event Description: </label>
        <input type="textarea" rows="5" class="form-control" name ="eventDescription" style= "height:200px;" id= "eventDescription">
        </div>
   
        <div class="form-group">
        <label>Start Date: </label>
		<input type="Text" class="form-control" name="startDate"  id="startDate" value="">
            <a href="javascript:show_calendar('document.createEvent.startDate', document.createEvent.startDate.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the start Time"></a> 
        </div>
       
          <div class="form-group">
        <label>End Date: </label>
        <input type="Text" class="form-control" name="endDate"  id="endDate" value="">
            <a href="javascript:show_calendar('document.createEvent.endDate', document.createEvent.endDate.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the start Time"></a>       
        </div>
		
        <!--
        <div class="form-group">
        <p>Subject Hierarchy Class </p>
        <select class="form-control" id="idTopicHierarchy" name="idTopicHierarchy">
        <option value = "ACM">ACM</option>
        <option value="??">??</option>
        </select>
              
        </div>  		
		-->		
		
		<div class="form-group" id = "eventTopics" name = "eventTopics">
			<label for="eventTopics">Select Topics:</label>
		     <select multiple class="form-control" name="eventTopics[]">
				 <?php foreach($EventTopic as $t): ?>
				<option value="<?php echo $t->idTopic?>"><?php echo $t->topicName?> </option>
				<?php endforeach; ?>
           </select>
		</div>
		
		<div class="form-group" id = "phaseTypes" name = "phaseTypes">
			<label for="phaseTypes">Select phase:</label>
		     <select multiple class="form-control" name="phaseTypes[]">
				 <?php foreach($phaseType as $p): ?>
				 
				<option value="<?php echo $p->idPhase?>"><?php echo $p->phaseName?> </option>
				<?php endforeach; ?>
           </select>
		</div>
		
		
		
		
		<div class="form-group" id = "phaseTypes" name = "phaseTypes">
			<label for="phaseTypes">Select phase:</label>		    
				 <?php foreach($phaseType as $p): ?>
				 
				<?php echo $p->idPhase?>
				
					  <label>End Date: </label>
					<input type="Text" class="form-control" name="endDate"  id="endDate" value="">
					<a href="javascript:show_calendar('document.createEvent.endDate', document.createEvent.endDate.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the start Time"></a>       
        
			
				<?php echo $p->phaseName?> 
				<?php endforeach; ?>
           </select>
		</div>
      	
		<div class="form-group" id = "selectedMeetings" name = "selectedMeetings">
			<label for="meetingIDs">Select Meetings:</label>
		     <select multiple class="form-control" name="meetingIDs[]">
				 <?php foreach($meeting as $m): ?>
				<option value="<?php echo $m->idMeeting ?>"><?php echo date( "Y-m-d H:i:s", strtotime($m->startTime))?> - <?php echo date( "Y-m-d H:i:s", strtotime($m->endTime)) ?></option>
				<?php endforeach; ?>
           </select>
		</div>
		
		<button style="float:right;" class="btn btn-primary">Add Event</button>
		
			</form>
			
		<form role="form" class="form-horizontal" action="<?php echo site_url('Meeting/createMeeting') ?>">
		
		<button style="float:right;" class="btn btn-primary">Create New Meeting</button>
		     
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
	
		<script src="../assets/js/vendor/jquery-1.10.1.min.js"></script>
		<script src="../assets/js/vendor/bootstrap.min.js"></script>
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/main.js"></script>
    </body>
</html>
