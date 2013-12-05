	<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">List of Meetings</div>
			<div class="panel-body">
				<div class="list-group">
					<?php if(isset($meetings)): ?>
						<?php foreach($meetings as $row):?>
							<a class="list-group-item" href="<?= site_url('Meeting/editMeeting') . '?idMeeting=' . $row->idMeeting ?>"><?= date( "Y-m-d H:i:s", strtotime($row->startTime))?> - <?= date( "Y-m-d H:i:s", strtotime($row->endTime)) ?></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	</div>

    <div class="container">
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
