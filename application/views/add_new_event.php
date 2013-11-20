      <div class="container">
          <h3>Add a new Event for conference:</h3>  
      <div class="panel-body">
        
        
    
        <div class="form-group">
        <p> Event Title </p>
        <input type="text" class="form-control" name ="event name" id="eventTitle">
        </div>        
        
        
        
        <div class="form-group">
        <p>Event Description</p>
        <input type="text"  class="form-control" name ="event description" style= "height:200px;" id= "eventDescription">
        </div>
   
        
        
        <div class="form-group">
        <p>Subject Hierarchy Class </p>
        <select class="form-control" id="idTopicHierarchy">
        <option value = "ACM">ACM</option>
        <option value="??">??</option>
        </select>
              
        </div>
       
        
         
         <div class="form-group">
        <p>Start Date: </p>
        <input type="text" class="form-control" name ="event start date" id="startDate">
        </div>
       
          <div class="form-group">
        <p>End Date: </p>
        <input type="text" class="form-control" name ="event end date" id="endDate">        
        </div>
        
        
        
        <div class="form-group">
        <p>Scheduling Template </p>
        <select class="form-control" id="schedulingTemplate">
        <option value = "Use the system default">Use the system default</option>
        <option value="??">??</option>
        </select>
                
        </div>
        
        
        
        <div class="form-group">
        <p>Copy Groups From </p>
        <select class="form-control" id = "copyGroupsFrom">
        <option value = "don't copy">Don't copy</option>
        <option value="??">??</option>
        </select>
                
        </div>
        
        
        
        
        <div class="form-group">
        <p>Choose Event Parameter </p>
        
        <div class="col-lg-6">
       
        <input type="radio" name="first" value="Request Full Paper" id="requestFullPaper"> Request Full Paper <br>
    
        <input type="radio" name="second" value="Request Abstract" id="requestAbstract"> Request Abstract<br>
      
       <input type="checkbox" name="firstcheckbox" value="Enable Registration Control" id="enableRegistration">Enable Registration Control<br>
        <input type="checkbox" name="secondcheckbox" value="Enable Paper Auction" id="enablePaperAuction">Enable Paper Auction<br>
        <input type="checkbox" name="thirdcheckbox" value="Enable Paper Review" id="enablePaperReview">Enable Paper Review<br>
        <input type="checkbox" name="fourthcheckbox" value="Enable Auto Review Allocation" id="enableAutoReviewAllocation">Enable Auto Review Allocation<br>
        <input type="checkbox" name="fifthcheckbox" value="Enable Blind Debate" id="enableBlindDebate">Enable Blind Debate<br>
        <input type="checkbox" name="sixthcheckbox" value="Request Publisher Copyright Form" id="requestPublisherCpoyright">Request Publisher Copyright Form<br>
            
       <input type="radio" name="upload" value="upload" id="upload"> Upload<br>
        <input type="radio" name="inline" value="inline" id="inline"> Inline<br>
        <input type="radio" name="online" value="online" id="online"> Online<br>
        <br>
        <input type="checkbox" name="seventhcheckbox" value="Request CINDI Copyright Form" id="requestCIDI">Request CINDI Copyright Form<br>
        <input type="radio" name="upload" value="upload" id="upload1"> Upload<br>
        <input type="radio" name="inline" value="inline" id="inline1"> Inline<br>
        <input type="radio" name="online" value="online" id="online1"> Online<br>
        <br>
        <input type="checkbox" name="eighthcheckbox" value="Request Final Version" id="requestFinal">Request Final Version<br>
        <input type="checkbox" name="ninethcheckbox" value="Request slide" id="requestSlide">Request Slide<br>
        <input type="checkbox" name="tenthcheckbox" value="Enable presentation/meeting" id="enablePresentation">Enable Presentation/Meeting<br>
        <input type="checkbox" name="eleventhcheckbox" value="Check Embedded Fonts of PDF file" id="checkFonts">Check Embedded Fonts of PDF file<br>
        
         <a href="<?php echo site_url('Event/submit/') ?>" class="btn btn-success" >Add New Event</a>
        
        <button type="cancel" class="btn btn-success" >cancel</button>
        
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
		<script src="assets/js/vendor/bootstrap.min.js"></script>
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/main.js"></script>
    </body>
</html>
