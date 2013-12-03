	<div class="container">
		<h2 class="panel-title">Edit Event</h2>
		<div class="panel-body">
			<form role="form" class="form-horizontal" name="editEvent" method="post" action="<?php echo site_url('Event/submitEditEvent/') ?>">

				<div class="form-group">
					<label for="eventName" class="col-lg-2 control-label">Event Name</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="eventName" name="eventName" value="<?= $event->eventName ?>" data-validate="required">
					</div>
				</div>

				<div class="form-group">
					<label for="eventDescription" class="col-lg-2 control-label">Event Description</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="eventDescription" name="eventDescription" value="<?= $event->eventDescription ?>" data-validate="required">
					</div>
				</div>
					
				<div class="form-group">
					<label for="startDate" class="col-lg-2 control-label">Start Date</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="startDate" name="startDate" value="<?= $event->startDate ?>" data-validate="required">
						<a href="javascript:show_calendar('document.editEvent.startDate', document.editEvent.startDate.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the Start Time"></a> 
					</div>
				</div>
				
				<div class="form-group">
					<label for="endDate" class="col-lg-2 control-label">End Date</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="endDate" name="endDate" value="<?= $event->endDate ?>" data-validate="required">
						<a href="javascript:show_calendar('document.editEvent.endDate', document.editEvent.endDate.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the End Time"></a>
					</div>
				</div>
				
				<div class="form-group" id ="selectTopics" name="topics">
					<label for="topics">Select Topics:</label>
					<select multiple class="form-control" name="topics[]">
						<?php foreach($topics as $t): ?>
							<option value="<?= $t->idTopic ?>"><?= $t->topicName ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="form-group" id="selectPhase" name="phases">
					<label for="phases">Select phase:</label>
					<select multiple class="form-control" name="phases[]">
						<?php foreach($phases as $p): ?>
							<option value="<?= $p->idPhase ?>"><?= $p->phaseName ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="form-group" id="selectMeetings" name="meetings">
					<label for="meetings">Select Meetings:</label>
					<select multiple class="form-control" name="meetings[]">
						<?php foreach($meetings as $m): ?>
							<option value="<?= $m->idMeeting ?>"><?= date("Y-m-d H:i:s", strtotime($m->startTime)) ?> - <?= date("Y-m-d H:i:s", strtotime($m->endTime)) ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</form>
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
		<script language="JavaScript" src="../assets/js/ts_picker.js">
		//Script by Denis Gritcyuk: tspicker@yahoo.com
		//Submitted to JavaScript Kit (http://javascriptkit.com)
		//Visit http://javascriptkit.com for this script
	  </script>
    </body>
</html>
