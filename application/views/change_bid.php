	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Bid on Paper</h3>
				</div>
				<div class="panel-body">
    
	      			<?php foreach($paper as $row):?>
	      			
		      			<label for="title" class="col-lg-2 control-label">Paper Title:</label>
		      			<p><a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $row->idPaper ?>"><?= $row->title ?></a></p>
		            	
		            	<label for="abstract" class="col-lg-2 control-label">Paper Abstract:</label>  
		            	<p><?= $row->abstract ?></p> 
		            	
		            	<?php if(isset($topics)): ?>
		            	<label for="subject" class="col-lg-2 control-label">Paper Topics:</label><br/>
		            	<ul class="list-group">
			            	<?php foreach($topics as $topic):?>
			            		<li class="list-group-item"><?= $topic->topicName ?></li> 
			            	<?php endforeach; ?>
		            	</ul>
	            		<?php endif; ?>
	            		
						<label for="username" class="col-lg-2 control-label">Submitted By:</label>  
		            	<p><?= $row->submittedBy ?></p> 

		            	<label for="eventName" class="col-lg-2 control-label">Submitted to Event:</label> 
		            	<p><?= $event->eventName ?></p> 
		            	
		            	
		            	<label for="reviewDeadline" class="col-lg-2 control-label">Bidding Deadline:</label> 
		            	<p><?= $bidPhase->endTime ?></p> 
		            	
			            <br />
		            	
		            	<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submitBidChange/') . '?idPaper=' . $row->idPaper ?>" 
		            		method="POST" enctype="multipart/form-data">
		            		<div class="form-group">
					            <label style="position:relative; right:100px; top:-20px;" for="bid" class="col-lg-2 control-label"><b>My Bid:</b></label>               
					            <select style="position:relative; right:100px; top:-15px;" name="bid" data-validate="required">
						            <option value="1">1.0</option>
						            <option value="2">2.0</option>
						            <option value="3">3.0</option>
						            <option value="4">4.0</option>
						            <option value="5">5.0</option>
						            <option value="6">6.0</option>
						            <option value="7">7.0</option>
						            <option value="8">8.0</option>
						            <option value="9">9.0</option>
						            <option value="10">10.0</option>         
					            </select>
					        </div>
					        
					        <button style="float:right;" class="btn btn-primary">Submit Bid</button>
		            	</form>
	            	<?php endforeach; ?>
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
