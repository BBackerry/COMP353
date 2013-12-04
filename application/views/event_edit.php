	<div class="container">
	<div class="row">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Event</h3>
		</div>
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
						<textarea rows="5" class="form-control" id="eventDescription" name="eventDescription" value="<?= $event->eventDescription ?>" data-validate="required"></textarea>
					</div>
				</div>
					
				<div class="form-group">
					<label for="startDate" class="col-lg-2 control-label">Start Date</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="startDate" name="startDate" value="<?= $event->startDate ?>" data-validate="required">
					</div>
				</div>
				
				<div class="form-group">
					<label for="endDate" class="col-lg-2 control-label">End Date</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="endDate" name="endDate" value="<?= $event->endDate ?>" data-validate="required">
					</div>
				</div>
				
				<div class="form-group" id="selectTopics">
					<label for="topics" class="col-lg-2 control-label">Select Topics:</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="topics[]" data-validate="required">
							<?php 
                                $parents = explode("&", substr($hierarchy, 1));
                                foreach($parents as $parent){
                                    $strlen = strlen( $str );
                                    $tab = "";
                                    $idTopic = "";
                                    for( $i = 0; $i <= strlen($parent); $i++ ) {
                                        $char = substr( $parent, $i, 1 );
                                        if($char === "["){ 
                                            if($idTopic !== ""){ 
                                                foreach($topic as $t){
                                                    if($t->idTopic == $idTopic){ 
                                                        $selected = false;
                                                        foreach($eventTopic as $evtTopic){
                                                            if($evtTopic->idTopic == $idTopic){
                                                                $selected = true;
                                                            }
                                                        } 
                            ?>
                                                        <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                            <?php                       $idTopic ="";
                                                    }
                                                }
                                            }
                                            $tab = $tab."&nbsp;&nbsp;";    
                                        }
                                        else if ($char === "]"){
                                            if($idTopic !== ""){ 
                                                foreach($topic as $t){
                                                    if($t->idTopic == $idTopic){ 
                                                        $selected = false;
                                                        foreach($eventTopic as $evtTopic){
                                                            if($evtTopic->idTopic == $idTopic){
                                                                $selected = true;
                                                            }
                                                        } 
                            ?>
                                                        <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                            <?php                       $idTopic ="";
                                                    }
                                                }
                                            }
                                            $tab = substr($tab,0, -12);
                                        }
                                        else{
                                            $idTopic = $idTopic.$char;
                                        }
                                    }
                                    if($idTopic !== ""){ 
                                        foreach($topic as $t){
                                            if($t->idTopic == $idTopic){ 
                                                $selected = false;
                                                foreach($expert as $topicExpert){
                                                    if($topicExpert->idTopic == $idTopic){
                                                        $selected = true;
                                                    }
                                                } 
                            ?>
                                                <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                            <?php               $idTopic ="";
                                            }
                                        }
                                    }
                                }?>
						</select>
					</div>
				</div>
				
				<div class="form-group" id="selectPhase">
					<label for="phases" class="col-lg-2 control-label">Select phases:</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="phases[]" data-validate="required">
							<?php foreach($phases as $p): ?>
								<option value="<?= $p->idPhase ?>"><?= $p->phaseName ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="form-group" id="selectMeetings">
					<label for="meetings" class="col-lg-2 control-label">Select Meetings:</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="meetings[]" data-validate="required">
							<?php foreach($meetings as $m): ?>
								<option value="<?= $m->idMeeting ?>"><?= date("Y-m-d H:i:s", strtotime($m->startTime)) ?> - <?= date("Y-m-d H:i:s", strtotime($m->endTime)) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<input type="hidden" value="<?= $event->idEvent ?>" name="idEvent">
				<button style="float:right;" class="btn btn-success">Edit</button>
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
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
		<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="../assets/js/datepicker.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
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
