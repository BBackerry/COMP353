<div class="container">
<div class="row">
	<div class="panel panel-default">
		<h3>Select an Event to See the Paper Available for Assigning:</h3>  
		<div class="panel-body">
            <ul>
            <?php 
                if(count($events) > 0) {
                    foreach($events as $eventId => $eventName){?>
                    <li>
                        <h3><a href="<?php echo site_url('ProgramChair/assignPaperSelectPaper?idEvent='.$eventId);?>"><?php echo $eventName ?></a></h3>
                    </li>
            <?php   }
                }else {?>
                    <h4> There are no events available for you. </h4>
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
