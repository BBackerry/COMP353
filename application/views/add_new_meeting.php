<div class="container">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Add a new Meeting</h2>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="<?= site_url('Meeting/submitMeeting') ?>" method="POST" >
				<div class="form-group">
					<label for="startTime" class="col-lg-2 control-label">Start Time</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="startTime" id="startTime" data-validate="required">
					</div>
				</div>
				
				<div class="form-group">
					<label for="endTime" class="col-lg-2 control-label">End Time</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="endTime" id="endTime" data-validate="required">
					</div>
				</div>

				<div class="form-group">
					<label for="place" class="col-lg-2 control-label">Location</label>
					<div class="col-lg-10">
						<select class="form-control" name="place" id="place" data-validate="required">
							<?php foreach($place as $p): ?>
								<option value="<?= $p->idPlace ?>"><?= $p->placeName ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<hr/>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<div class="checkbox">
							<label>
								<input type="checkbox" id="chkNewLocation">
								Create a new Location for this meeting
							</label>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="newLocation" class="col-lg-2 control-label">Location Name</label>
					<div class="col-lg-10">
						<input disabled type="text" class="form-control" name="newLocation" id="newLocation">
					</div>
				</div>
				
				<button style="float:right;" class="btn btn-success">Create Meeting</button>
			</form>
		</div>
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
		<script>
			$("#startTime").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
			$("#endTime").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
			$("#chkNewLocation").click(function () {
				if($(this).is(":checked")) {
					$("#newLocation").prop("disabled", false);
					$("#place").prop("disabled", true);
				}
				else {
					$("#newLocation").prop("disabled", true);
					$("#place").prop("disabled", false);
				}
			});
		</script>
    </body>
</html>
