<div class="container">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">Select an Event to see Papers available for assigning</div>
		<div class="panel-body">
			<div class="list-group">
				<?php
					if(count($events) > 0) {
						foreach($events as $eventId => $eventName){ ?>
							<a class="list-group-item" href="<?php echo site_url('ProgramChair/assignPaperSelectPaper?idEvent='.$eventId);?>"><?php echo $eventName ?></a>
				<?php   }
					} else { ?>
						<h4> There are no events available for you. </h4>
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
