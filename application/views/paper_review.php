<div class="container">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">Papers To Review</div>
		<div class="panel-body">
			<p>Only papers submitted to events that are currently in the review phase are shown.</p>
			<p>Please click on a paper title to see its detailed information.</p>
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Paper Title</th>
						<th>Comments</th>
						<th>Score</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($assignments)): ?>
						<?php foreach($assignments as $assignment):?>
							<?php foreach($papers as $paper):?>
								<?php foreach($phases as $phase):?>
									<?php if($phase->idEvent == $paper->idEvent && 
										strtotime($phase->startTime) < strtotime(date("Y-m-d H:i:s")) && 
											strtotime($phase->endTime) > strtotime(date("Y-m-d H:i:s"))): ?>
										<?php if($assignment->idPaper == $paper->idPaper): ?>
											<tr>
												<td><a href="<?= site_url('Paper/detailedPaperReview') . '?idPaper=' . $assignment->idPaper ?>"><?= $paper->title ?></a></td>
												<td><?= $assignment->comment ?></td>
												<td><?= $assignment->score ?></td>
											</tr>
										<?php endif; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endforeach; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
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
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
