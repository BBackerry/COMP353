<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">Add a News Message</div>
	<div class="panel-body">

    <form class="form-horizontal" role="form" action="<?php echo site_url('News/submitedNews');?>" method="post">
        <div class="form-group">
            <label class="col-lg-2 control-label" for="title">Title (limit 100 characters)</label>
			<div class="col-lg-10">
				<input class="form-control" type="text" name="title" size="100" value="" data-validate="required">
			</div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" for="idEvent">Event</label>
			<div class="col-lg-10">
                <select class="form-control" name="idEvent" data-validate="required">
                    <?php foreach($events as $event): ?>
                       <option value="<?=$event->idEvent;?>"> <?= $event->eventName ?> </option>
                    <?php endforeach; ?>
                </select>
			</div>
        </div>
        <br/>
        <div class="form-group">
            <label class="col-lg-2 control-label" for="description">News Description (limit 2000 characters)</label>
			<div class="col-lg-10">
				<textarea class="form-control" name="description" rows="10" cols="150" data-validate="required"></textarea>
			</div>
        </div>
        <button type="submit" style="float:right;" class="btn btn-success">Create News Message</button>
    </form>  
       
    </div>
</div>
</div>

	<div class="container">
    <footer>
        <p>&copy; Best Concordia Team</p>
    </footer>
    </div> <!-- /container -->
		<script src="../assets/js/vendor/jquery-1.10.1.min.js"></script>
		<script src="../assets/js/vendor/bootstrap.min.js"></script>
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
    </body>
</html>
