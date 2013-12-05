	<br/>
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
						<textarea rows="5" class="form-control" id="eventDescription" name="eventDescription" data-validate="required"><?= $event->eventDescription ?></textarea>
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
				
				
					<div class="form-group" id="setProgramChair">
					<label for="meetings" class="col-lg-2 control-label">Set Program Chair:</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="setProgramChair[]" data-validate="required" size="10">
							<?php foreach($users as $m):    
                                    $selected = false;
                                    foreach($programChairs as $md){
                                        if($md->idUser == $m->idUser){
                                            $selected= true;
                                        }
                                    }?>
                                    
								<option value="<?= $m->idUser ?>" <?php echo $selected ? 'selected' : '';?>><?php echo $m->idUser ?> - <?php echo $m->lastName ?>, <?php echo $m->firstName ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="form-group" id="setCommitteeMember">
					<label for="meetings" class="col-lg-2 control-label">Set Committee Member(s):</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="setCommitteeMember[]" data-validate="required" size="10">
							<?php foreach($users as $m):    
                                    $selected = false;
                                    foreach($committeeMembers as $md){
                                        if($md->idUser == $m->idUser){
                                            $selected= true;
                                        }
                                    }?>
                                    
								<option value="<?= $m->idUser ?>" <?php echo $selected ? 'selected' : '';?>><?php echo $m->idUser ?> - <?php echo $m->lastName ?>, <?php echo $m->firstName ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="form-group" id="selectTopics">
					<label for="topics" class="col-lg-2 control-label">Select Topics:</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="topics[]" data-validate="required" size="15">
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
                                                foreach($eventTopic as $evtTopic){
                                                    if($evtTopic->idTopic == $idTopic){
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
                 <?php foreach($phaseType as $p): 
                    
                        $phaseStart = "";
                        $phaseEnd = "";
                        foreach($phaseDetail as $pd){
                            if($pd->idPhase == $p->idPhase){
                                $phaseStart = date( "Y-m-d H:i:s", strtotime($pd->startTime));
                                $phaseEnd = date( "Y-m-d H:i:s", strtotime($pd->endTime));
                            }
                        } ?>       
                 
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $p->phaseName;?> - Start Date:</label>
                        <input class="col-lg-2" type="Text" class="form-control" name="<?php echo $p->idPhase?>PhaseStart" id="<?php echo $p->idPhase?>PhaseStart" value="<?php echo $phaseStart;?>" data-validate="required"/>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $p->phaseName;?> - End Date:</label>
                        <input class="col-lg-2" type="Text" class="form-control" name="<?php echo $p->idPhase?>PhaseEnd" id="<?php echo $p->idPhase?>PhaseEnd" value="<?php echo $phaseStart;?>" data-validate="required"/>
                    </div>   
                <?php endforeach; ?>
				
				<div class="form-group" id="selectMeetings">
					<label for="meetings" class="col-lg-2 control-label">Select Meetings:</label>
					<div class="col-lg-10">
						<select multiple class="form-control" name="meetings[]" data-validate="required" size="10">
							<?php foreach($meetings as $m):    
                                    $selected = false;
                                    foreach($meetingDetail as $md){
                                        if($md->idMeeting == $m->idMeeting){
                                            $selected= true;
                                        }
                                    }?>
                                    
								<option value="<?= $m->idMeeting ?>" <?php echo $selected ? 'selected' : '';?>><?= date("Y-m-d H:i:s", strtotime($m->startTime)) ?> - <?= date("Y-m-d H:i:s", strtotime($m->endTime)) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<input type="hidden" value="<?= $event->idEvent ?>" name="idEvent">
				<button style="float:right;" class="btn btn-success">Update Event</button>
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
            <?php foreach($phaseType as $p): ?>
			$("#<?php echo $p->idPhase."PhaseStart";?>").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
			$("#<?php echo $p->idPhase."PhaseEnd";?>").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
            <?php endforeach; ?>
		</script>
    </body>
</html>
