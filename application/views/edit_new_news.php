<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">Edit a News Message</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" action="<?php echo site_url('News/updateNews');?>" method="post">
			<?php foreach ($news as $article) { ?>
				<input type="hidden" name="id" value="<?php echo $article->idNews; ?>"/>
				 <div class="form-group">
					<label class="col-lg-2 control-label" for="date">Date</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" id="date" name="date" data-validate="required" value="<?php echo  date( "Y-m-d H:i:s", strtotime($article->newsDate)); ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="title">Title (limit 100 characters)</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="title" size="100" data-validate="required,max(100)" value="<?php echo $article->newsTitle; ?>">
					</div>
				</div>
				<br/>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="idEvent" >Event</label>
					<div class="col-lg-10">
						<select class="form-control" name="idEvent" data-validate="required">
							<?php foreach($events as $event): ?>
							   <option value="<?=$event->idEvent;?>" <?php echo ($event->idEvent == $article->idEvent) ? "selected" : ""; ?>> <?= $event->eventName ?> </option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<br/>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="description">News Description (limit 2000 characters)</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="description" rows="10" cols="150" data-validate="required,max(2000)"><?php echo $article->newsDescription; ?></textarea>
					</div>
				</div>
				<br/>
			<?php } ?>
			<button type="submit" class="btn btn-success" style="float:right;">Save News Message</button>
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
		<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="../assets/js/datepicker.js"></script>
		<script src="<?= base_url() ?>/assets/js/vendor/verify.notify.min.js"></script>
         <script>
            $("#date").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
		</script>
    </body>
</html>
