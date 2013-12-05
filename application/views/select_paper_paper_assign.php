<div class="container">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">Assign a Committee Member to review a Paper</div>
		<div class="panel-body">
			<p>Select a Paper you wish to assign a Committee Member to:</p>
			
			<div class="list-group">
            <?php
                if(count($papers) > 0 ) {
                    foreach($papers as $row):?>
                        <div class="list-group-item">
                            <a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $row->idPaper ?>"><?= $row->title ?></a>
							<p class="list-group-item-text">
								<p>Abstract: <?= $row->abstract ?></p>
								<a class="btn btn-primary" href="<?php echo site_url('ProgramChair/assignPaperCommittee?idPaper='.$row->idPaper."&idEvent=".$idEvent);?>">Assign This Paper</a>
                            </p>
                        </div>
					<?php endforeach; 
                } else { ?>
                    <h4>There are no papers for you to assign a committee member to. </h4>
            <?php } ?>
			</div>
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
	
		<script src="../assets/js/vendor/jquery-1.10.1.min.js"></script>
		<script src="../assets/js/vendor/bootstrap.min.js"></script>
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="../assets/js/datepicker.js"></script>
    </body>
</html>
