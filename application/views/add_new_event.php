<div class="container">
<div class="row">
	<div class="panel panel-default">
		<h3>Add a new Event for conference:</h3>  
		<div class="panel-body">
			<form role="form" class="form-horizontal" name="createEvent" action="<?php echo site_url('Event/submitedEvent/') ?>">
			
			<div class="form-group">
				<label> Event Title:</label>
				<input type="text" class="form-control" name ="eventName" id="eventName">
			</div>
			
			<div class="form-group">
				<label>Event Description:</label>
				<textarea style="hight:100px; width:100%;" data-validate="required, max(100)" rows="4" cols="50" type="text" maxlength="100" 
									class="form-control" id="eventDescription" name="eventDescription"></textarea>
			</div>
	   
			<div class="form-group">
				<label>Start Date:</label>
				<input type="Text" class="form-control" name="startDate"  id="startDate" value="">
			</div>
			
			<div class="form-group">
				<label>End Date:</label>
				<input type="Text" class="form-control" name="endDate"  id="endDate" value="">
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
						<option value="<?= $t->idTopic?>"><?= $t->topicName ?> </option>
					<?php endforeach; ?>
			   </select>
			</div>
			
			<div class="form-group" id = "phaseTypes" name = "phaseTypes">
				<label for="phaseTypes">Select phase:</label>
				 <select multiple class="form-control" name="phaseTypes[]">
					<?php foreach($phaseType as $p): ?>
						<option value="<?php echo $p->idPhase?>"><?php echo $p->phaseName ?> </option>
					<?php endforeach; ?>
			   </select>
			</div>
			
			<div class="form-group" id = "phaseTypes" name = "phaseTypes">
				<label for="phaseTypes">Select phase:</label>		    
					<?php foreach($phaseType as $p): ?>
					<?= $p->idPhase ?>
						<label>End Date:</label>
						<input type="Text" class="form-control" name="endDate"  id="endDate" value="">
					<?= $p->phaseName ?> 
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
		<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="../assets/js/datepicker.js"></script>
		<script>
			$("#startDate").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
			$("#endDate").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
		</script>
    </body>
</html>
