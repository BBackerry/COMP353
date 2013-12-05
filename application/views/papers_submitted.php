   <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">My Papers</div>
			<div class="panel-body">
				<p>Decisions are displayed only for papers that have been decided on.</p>
				
				<?php if(isset($papers)): ?>
				<?php foreach($papers as $obj): ?>
					<div class="list-group">
						<div class="list-group-item">
							<a href="<?= site_url('Paper/viewPaper?idPaper=') . $obj['paper']->idPaper ?>"><h4 class="list-group-item-heading"><?= $obj['paper']->title ?></h4></a>
							<p class="list-group-item-text">
								<p>Abstract: <?= $obj['paper']->abstract ?></p>
								Submitted by: <?= $obj['paper']->submittedBy ?><br/>
								Event: <a href="<?= site_url('Event/viewEvent') . '?idEvent=' . $obj['paper']->idEvent ?>"><?= $obj['event'] ?></a><br/>
								Keywords: <?= $obj['paper']->keywords ?><br/>
								<?php if(isset($obj['reviews'])): ?>
									Comments:<br/>
									<?php foreach($obj['reviews'] as $review): ?>
										<ul class="list-group">
											<li class="list-group-item"><?= $review->comment ?></li>
										</ul>
									<?php endforeach; ?>
								<?php endif; ?>
								<?php foreach($obj['decision'] as $d): ?>
									<?php if($d->decision == 1): ?>
										Decision: Accepted<br/>
									<?php endif; ?>
									<?php if($d->decision == 0): ?>
										Decision: Rejected<br/>
									<?php endif; ?>
									Decided By: <?= $d->decidedBy ?><br/>
									Reason: <?= $d->reason ?><br/>
								<?php endforeach; ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
			
			
				<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submit/') ?>">
					<button style="float:right;" class="btn btn-primary">Submit New Paper</button>
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
    </body>
</html>
