      <div class="container">
          <h3>Add a new Event for conference:</h3>  
      <div class="panel-body">
        
        
		<form role="form" class="form-horizontal" action="<?php echo site_url('Event/submitedEvent/') ?>">
        <div class="form-group">
        <p> Event Title </p>
        <input type="text" class="form-control" name ="eventName" id="eventName">
        </div>        
        
        
        
        <div class="form-group">
        <p>Event Description</p>
        <input type="text"  class="form-control" name ="eventDescription" style= "height:200px;" id= "eventDescription">
        </div>
   
        
        <!--
        <div class="form-group">
        <p>Subject Hierarchy Class </p>
        <select class="form-control" id="idTopicHierarchy" name="idTopicHierarchy">
        <option value = "ACM">ACM</option>
        <option value="??">??</option>
        </select>
              
        </div>  
-->		
        
         
         <div class="form-group">
        <p>Start Date: </p>
        <input type="text" class="form-control" name ="startDate" id="startDate">
        </div>
       
          <div class="form-group">
        <p>End Date: </p>
        <input type="text" class="form-control" name ="endDate" id="endDate">        
        </div>
        <button style="float:right;" class="btn btn-primary">Add Event</button>
       
        </form>
        
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
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>
