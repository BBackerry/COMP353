     <div class="container">
     	<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
      
       				<h3 class="panel-title"><b><br>Papers To Review: </b></h3>
       				<br />
      				<h3 class="panel-title">Please click on a paper title to see detailed information.</h3>
      				<br />
      				<table border="1" class = "table">
      					<tr>
      						 <td><h4 class="panel-title"><b>Paper Title</b> </h4></td> 
      						 <td><h4 class="panel-title"><b>Comments </b></h4></td>
      						 <td><h4 class="panel-title"><b>Score </b></h4></td>
      					</tr>
					   	<?php if(isset($assignments)): ?>
							<?php foreach($assignments as $row):?>
								<?php foreach($papers as $paper):?>
									<?php if($row->idPaper == $paper->idPaper): ?>
										<tr>
											<td><a href="<?= site_url('Paper/detailedPaperReview') . '?idPaper=' . $row->idPaper ?>"><?= $paper->title ?></a></td>
											<td><?= $row->comment ?></td>
											<td><?= $row->score ?></td>
										</tr>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endforeach; ?>
						<?php endif; ?>
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
