    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
			
				<form role="form" class="form-horizontal" action="<?php echo site_url('Paper/submit/') ?>">
					<button style="float:right;" class="btn btn-primary">Submit New Paper</button>
				</form>
				
      				<h3>My Paper List:</h3>
      				
					<?php if(isset($papers)): ?>
						<?php foreach($papers as $row):?>
							<h4>Title: <?= $row->title ?></h4>
							<h5>Abstract: <?= $row->abstract ?></h5>
							<h5>Keywords: <?= $row->keywords ?></h5>
							<h5>Submitted to Event: </h5>
							<h5>Decision: </h5>
							<h5>Comments: </h5>
							<br />
						<?php endforeach; ?>
					<?php endif; ?>
        
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
