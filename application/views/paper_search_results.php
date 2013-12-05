    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Search Results</div>
			<div class="panel-body">
				<?php if(!empty($papers)): ?>
					<?php foreach($papers as $paper): ?>
						<div class="list-group">
							<div class="list-group-item">
								<a href="<?= site_url('Paper/viewPaper') . '?idPaper' . $paper->idPaper ?>" class="list-group-item-heading"><?= $paper->title ?></a>
								<p class="list-group-item-text">Abstract:<?= $paper->abstract ?></p>
								<p class="list-group-item-text">Event: <a href="<?= site_url('Event/viewEvent') . '?idEvent=' . $paper->idEvent ?>"><?= $paper->eventName ?></a></p>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
      </div>

    <div class="container">
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
