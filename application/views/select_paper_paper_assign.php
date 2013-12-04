<div class="container">
<div class="row">
	<div class="panel panel-default">
		<h3>Select a Paper You Wish to Assign a Committee Member To:</h3>  
		<div class="panel-body">
            <ul>
            <?php 
                if(count($papers) > 0 ) {
                    foreach($papers as $row):?>
                        <div class="panel panel-default">
                            <h3><a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $row->idPaper ?>"><?= $row->title ?></a></h3>
                            Abstract: <?= $row->abstract ?><br />
                            Keywords: <?= $row->keywords ?><br />
                            <a href="<?php echo site_url('ProgramChair/assignPaperCommittee?idPaper='.$row->idPaper."&idEvent=".$idEvent);?>">Assign This Paper</a>
                            <br />
                        </div>
					<?php endforeach; 
                }else{?>
                    <h4> There are no papers for you to assign a committee member to. </h4>
            <?php } ?>
            <ul>
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
