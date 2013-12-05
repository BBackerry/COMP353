<div class="container">
<div class="row">
	<div class="panel panel-default">
	<div class="panel-heading">Add a new Event for Conference</div>
		<div class="panel-body">
			<form role="form" class="form-horizontal" action="<?= site_url('Event/submitedEvent/') ?>">
			
			<div class="form-group">
				<label class="col-lg-2 control-label">Event Title</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name ="eventName" id="eventName" data-validate="required">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-2 control-label">Event Description</label>
				<div class="col-lg-10">
					<textarea style="hight:100px; width:100%;" data-validate="required,max(200)" rows="2" cols="50" type="text" maxlength="100" 
									class="form-control" id="eventDescription" name="eventDescription"></textarea>
				</div>
			</div>
	   
			<div class="form-group">
				<label class="col-lg-2 control-label">Start Date</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="startDate"  id="startDate" value="" data-validate="required">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-2 control-label">End Date</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="endDate"  id="endDate" value="" data-validate="required">
				</div>
			</div>
			
			<div class="form-group" id="setProgramChair" name="setProgramChair">
				<label for="setProgramChair[]" class="col-lg-2 control-label">Set Program Chair</label>
				<div class="col-lg-10">
					<select multiple class="form-control" name="setProgramChair[]" data-validate="required">
						<?php foreach($users as $u): ?>
							<option value="<?= $u->idUser ?>"><?= $u->idUser ?> - <?= $u->lastName ?>, <?= $u->firstName ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<div class="form-group" id="setCommitteeMember" name="setCommitteeMemeber">
				<label for="users" class="col-lg-2 control-label">Set Committee Member</label>
				<div class="col-lg-10">
					<select multiple class="form-control" name="setCommitteeMemeber[]" data-validate="required">
						<?php foreach($users as $u): ?>
							<option value="<?= $u->idUser ?>"><?= $u->idUser ?> - <?= $u->lastName ?>, <?= $u->firstName ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
				
			
			<div class="form-group" id="eventTopics" name="eventTopics">
				<label for="eventTopics" class="col-lg-2 control-label">Select Topics</label>
				<div class="col-lg-10">
					<select multiple class="form-control" name="eventTopics[]" size="15" data-validate="required">
						 <?php 
							$parents=explode("&", substr($hierarchy, 1));
							foreach($parents as $parent){
								$strlen=strlen( $str );
								$tab="";
								$idTopic="";
								for( $i=0; $i <= strlen($parent); $i++ ) {
									$char=substr( $parent, $i, 1 );
									if($char === "["){ 
										if($idTopic !== ""){ 
											foreach($topic as $t){
												if($t->idTopic == $idTopic){ 
						?>
													<option value="<?= $idTopic?>"><?= $tab.$t->topicName?></option>
						<?php                       $idTopic ="";
												}
											}
										}
										$tab=$tab."&nbsp;&nbsp;";    
									}
									else if ($char === "]"){
										if($idTopic !== ""){ 
											foreach($topic as $t){
												if($t->idTopic == $idTopic){ 
						?>
													<option value="<?= $idTopic?>"><?= $tab.$t->topicName?></option>
						<?php                       $idTopic ="";
												}
											}
										}
										$tab=substr($tab,0, -12);
									}
									else{
										$idTopic=$idTopic.$char;
									}
								}
								if($idTopic !== ""){ 
									foreach($topic as $t){
										if($t->idTopic == $idTopic){ 
						?>
											<option value="<?= $idTopic?>"><?= $tab.$t->topicName?></option>
						<?php               $idTopic ="";
										}
									}
								}
							}?>
					</select>
				</div>
			</div>
			
            <?php foreach($phaseType as $p): ?>
				<div class="form-group">
					<label class="col-lg-2 control-label"><?= ucfirst($p->phaseName)?> - Start Date</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="<?= $p->idPhase?>PhaseStart" id="<?= $p->idPhase?>PhaseStart" value="" data-validate="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label"><?= ucfirst($p->phaseName)?> - End Date</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="<?= $p->idPhase?>PhaseEnd" id="<?= $p->idPhase?>PhaseEnd" value="" data-validate="required"/>
					</div>
				</div>   
            <?php endforeach; ?>
			
			<div class="form-group" id="selectedMeetings" name="selectedMeetings">
				<label for="meetingIDs" class="col-lg-2 control-label">Select Meetings</label>
				<div class="col-lg-10">
					<select multiple class="form-control" name="meetingIDs[]" data-validate="required">
						<?php foreach($meeting as $m): ?>
							<option value="<?= $m->idMeeting ?>"><?= date( "Y-m-d H:i:s", strtotime($m->startTime))?> - <?= date( "Y-m-d H:i:s", strtotime($m->endTime)) ?></option>
						<?php endforeach; ?>
					</select>
			   </div>
			</div>

			<button style="float:right;margin-left:10px;" class="btn btn-success">Add Event</button>
		</form>
				
		<form role="form" class="form-horizontal" action="<?= site_url('Meeting/createMeeting') ?>">
			<button style="float:right;" class="btn btn-primary">Create New Meeting</button>
		</form>
	</div>
</div>
</div>

	<div class="container">
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
		<script src="<?= base_url() ?>/assets/js/vendor/verify.notify.min.js"></script>
		<script>
        <?php foreach($phaseType as $p): ?>
			$("#<?= $p->idPhase."PhaseStart"?>").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
			$("#<?= $p->idPhase."PhaseEnd"?>").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
         <?php endforeach; ?>
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
