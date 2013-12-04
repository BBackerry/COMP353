    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
      				<h3>Events:</h3>
					
					<ul class="list-group">
					<?php if(isset($events)): ?>
						<?php foreach($events as $row):?>
							<li class="list-group-item"><a href="<?= site_url('Event/viewEvent') . '?idEvent=' . $row->idEvent ?>"><?= $row->eventName ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>
					</ul>
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
