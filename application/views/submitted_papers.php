   <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<h3>My Paper List:</h3>
				<?php if(isset($papers)): ?>
					<?php foreach($papers as $row):?>
						<?php foreach($events as $event):?>
							<?php if($row->idEvent == $event->idEvent): ?>
								<h2><a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $row->idPaper ?>"><?= $row->title ?></a></h2>
								Abstract: <?= $row->abstract ?><br />
								Keywords: <?= $row->keywords ?><br />
								Submitted to Event: <a href="<?= site_url('Event/viewEvent') . '?idEvent=' . $event->idEvent ?>"><?= $event->eventName ?></a><br />
								Decision: <br />
								Comments: <br />
								<br />
							<?php endif; ?>
						<?php endforeach; ?>
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
