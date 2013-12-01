    <script language="JavaScript" src="../assets/js/ts_picker.js">
    //Script by Denis Gritcyuk: tspicker@yahoo.com
    //Submitted to JavaScript Kit (http://javascriptkit.com)
    //Visit http://javascriptkit.com for this script
    </script>    
     <div class="container">
          <h3>Add a new Meeting:</h3>  
      <div class="panel-body">
        
        
    <form name="meetingForm" action="<?php echo site_url('Meeting/submitedMeeting');?>" method="post">
        <div class="form-group">
            <label for="startTime">Start Time: </label>
            <input type="Text" name="startTime" value="">
            <a href="javascript:show_calendar('document.meetingForm.startTime', document.meetingForm.startTime.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the start Time"></a>
        </div>
        <br/>
        <div class="form-group">
            <label for="startTime">End Time: </label>
            <input type="Text" name="endTime" value="">
            <a href="javascript:show_calendar('document.meetingForm.endTime', document.meetingForm.endTime.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the end Time"></a>
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
    </body>
</html>
