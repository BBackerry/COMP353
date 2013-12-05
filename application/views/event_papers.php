	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Papers Submitted to Event: <?= $event->eventName ?></div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
      					<tr>
								<th>Paper Title</th> 
								<th>Abstract</th>
								<th>Submitted By</th>
								<?php if(strtotime($bidPhase->startTime) < strtotime(date("Y-m-d H:i:s")) && strtotime($bidPhase->endTime) > strtotime(date("Y-m-d H:i:s"))): ?>
									<th>Bidding</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach($papers as $row): ?>
								<tr>
									<?php if(strtotime($reviewPhase->endTime) < strtotime(date("Y-m-d H:i:s"))): ?>
										<td><a href="<?= site_url('Paper/paperScores') . '?idPaper=' . $row->idPaper ?>"><?= $row->title ?></a></td>
									<?php else: ?>
										<td><?= $row->title ?></td>
									<?php endif; ?>
										<td><?= $row->abstract ?></td>
										<td><?= $row->submittedBy ?></td>
									<?php if(!empty($bids[$row->idPaper])): ?>
										<td>Your Bid: <?= $bids[$row->idPaper][0]->bid ?>
											<a href="<?= site_url('Paper/changeBid/') . '?idPaper=' . $bids[$row->idPaper][0]->idPaper ?>" style="float:right;" class="btn btn-primary">Change Bid</a>
										</td>
									<?php endif; ?>
									<?php if(empty($bids[$row->idPaper]) && strtotime($bidPhase->startTime) < strtotime(date("Y-m-d H:i:s")) && strtotime($bidPhase->endTime) > strtotime(date("Y-m-d H:i:s"))): ?>
										<td>
											<a href="<?= site_url('Paper/bidForPaper') . '?idPaper=' . $row->idPaper ?>">Bid on this paper</a>
										</td>
									<?php endif; ?>
								</tr>
						<?php endforeach; ?>
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
