	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Paper Scores: </h3>
				</div>
				<div class="panel-body">
	      			
	      			<label for="title" class="col-lg-2 control-label">Paper Title:</label>
	      			<p><a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $paper->idPaper ?>"><?= $paper->title ?></a></p>
	      			
	      			<label for="username" class="col-lg-2 control-label">Submitted By:</label>  
	            	<p><?= $paper->submittedBy ?></p> 
	            	
	            	<label for="abstract" class="col-lg-2 control-label">Paper Abstract:</label>  
	            	<p><?= $paper->abstract ?></p> 
	            	
	            	<label for="subject" class="col-lg-2 control-label">Paper Topics:</label><br />
	            	
	            	<ul class="list-group">
						<?php foreach($topics as $row): ?> 
							<li class="list-group-item"><?= $row->topicName?></li>		
						<?php endforeach; ?>
					</ul>
	        	
	            	<table border="1" class = "table">
      					<tr>
      						 <td><h4 class="panel-title"><b>Score </b></h4></td>
      						 <td><h4 class="panel-title"><b>Reviewed By </b></h4></td>
      						 <td><h4 class="panel-title"><b>Comments </b></h4></td>
      					</tr>
						<?php foreach($assignments as $assignment):?>
							<td><?= $assignment->score ?></td>
							<td><?= $assignment->idAssignedTo ?></td>
							<td><?= $assignment->comment ?></td>
						<?php endforeach; ?>
					</table>
					
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
