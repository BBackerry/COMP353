<div class="container">
	<h3>Add a new Meeting:</h3>
	
	<div class="panel-body">
	
	<form name="meetingForm" action="<?php echo site_url('Meeting/submitedMeeting');?>" method="post">
        <div class="form-group">
            <label for="startTime">Start Time: </label>
            <input type="Text" name="startTime" id="startTime" value="">
        </div>
        <br/>
        <div class="form-group">
            <label for="endTime">End Time: </label>
            <input type="Text" name="endTime" id="endTime" value="">
		</div>
        <br/>
        
        <hr/>
        <div class="form-group">
            <label for="place">Location:</label>
            <select name="place">
                <?php foreach($place as $p): ?>
                    <option value="<?php echo $p->idPlace ?>"> <?php echo $p->placeName ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <hr/>
        <div class="form-group">
            <input type="checkbox" name="newPlace" value="newPlace">Specify and select a new Location for this meeting<br>
            <br/>
            <label for="startTime">Location Name: </label>
            <input type="Text" name="newPlaceName" value="">
        </div>
        <br/>
        <button type="submit" class="btn btn-success">Create Meeting</button>
    </form>  
       
    </div>
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
		<script>
			$("#startTime").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
			$("#endTime").datetimepicker({
				dateFormat: "yy-mm-dd",
				timeFormat: "hh:mm:ss"
			});
		</script>
    </body>
</html>
