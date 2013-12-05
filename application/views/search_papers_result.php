    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
      				<h3>Search for Paper Result:</h3>
                  <?php foreach($finalMatchedPapers as $m): ?>
					
					<div class="list-group">
					<a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $m->idPaper ?>" class="list-group-item">
	                 <h4 class="list-group-item-heading">head</h4>
	                 <p class="list-group-item-text">abstract</p>
	               </a>
	             </div>
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
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
