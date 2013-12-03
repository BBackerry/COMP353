    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				
      				<h3>Your Interests:</h3>
      				
					<?php if(isset($interests)): ?>
						<?php foreach($interests as $row):?>
							<h5>- <?= $row->topicName ?></h5>
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
