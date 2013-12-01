      <div class="container">
          <h3>Add a new Event for conference:</h3>  
      <div class="panel-body">
        
        
    
        <div class="form-group">
        <p> Event Title </p>
        <input type="text" class="form-control" name ="eventTitle" id="eventTitle">
        </div>        
        
        
        
        <div class="form-group">
        <p>Event Description</p>
        <input type="text"  class="form-control" name ="eventDescription" style= "height:200px;" id= "eventDescription">
        </div>
   
        
        
        <div class="form-group">
        <p>Subject Hierarchy Class </p>
        <select class="form-control" id="idTopicHierarchy" name="idTopicHierarchy">
        <option value = "ACM">ACM</option>
        <option value="??">??</option>
        </select>
              
        </div>
       
        
         
         <div class="form-group">
        <p>Start Date: </p>
        <input type="text" class="form-control" name ="startDate" id="startDate">
        </div>
       
          <div class="form-group">
        <p>End Date: </p>
        <input type="text" class="form-control" name ="endDate" id="endDate">        
        </div>
        
        
        
        <div class="form-group">
        <p>Scheduling Template </p>
        <select class="form-control" id="schedulingTemplate" name="schedulingTemplate">
        <option value = "Use the system default">Use the system default</option>
        <option value="??">??</option>
        </select>
                
        </div>
        
        
        
        <div class="form-group">
        <p>Copy Groups From </p>
        <select class="form-control" id = "copyGroupsFrom" name="copyGroupsFrom">
        <option value = "don't copy">Don't copy</option>
        <option value="??">??</option>
        </select>
                
        </div>
        
        
        
        
        <div class="form-group">
        <p>Choose Event Parameter </p>
        
        <div class="col-lg-6">
       
        <input type="radio" name="requestFullPaper" value="Request Full Paper" id="requestFullPaper"> Request Full Paper <br>
    
        <input type="radio" name="requestAbstract" value="Request Abstract" id="requestAbstract"> Request Abstract<br>
      
       <input type="checkbox" name="enableRegistration" value="Enable Registration Control" id="enableRegistration">Enable Registration Control<br>
        <input type="checkbox" name="enablePaperAuction" value="Enable Paper Auction" id="enablePaperAuction">Enable Paper Auction<br>
        <input type="checkbox" name="enablePaperReview" value="Enable Paper Review" id="enablePaperReview">Enable Paper Review<br>
        <input type="checkbox" name="enableAutoReviewAllocation" value="Enable Auto Review Allocation" id="enableAutoReviewAllocation">Enable Auto Review Allocation<br>
        <input type="checkbox" name="enableBlindDebate" value="Enable Blind Debate" id="enableBlindDebate">Enable Blind Debate<br>
        <input type="checkbox" name="requestPublisherCpoyright" value="Request Publisher Copyright Form" id="requestPublisherCpoyright">Request Publisher Copyright Form<br>
            
       <input type="radio" name="upload" value="upload" id="upload"> Upload<br>
        <input type="radio" name="inline" value="inline" id="inline"> Inline<br>
        <input type="radio" name="online" value="online" id="online"> Online<br>
        <br>
        <input type="checkbox" name="requestCIDI" value="Request CINDI Copyright Form" id="requestCIDI">Request CINDI Copyright Form<br>
        <input type="radio" name="upload1" value="upload" id="upload1"> Upload<br>
        <input type="radio" name="inline1" value="inline" id="inline1"> Inline<br>
        <input type="radio" name="online1" value="online" id="online1"> Online<br>
        <br>
        <input type="checkbox" name="requestFinal" value="Request Final Version" id="requestFinal">Request Final Version<br>
        <input type="checkbox" name="requestSlide" value="Request slide" id="requestSlide">Request Slide<br>
        <input type="checkbox" name="enablePresentation" value="Enable presentation/meeting" id="enablePresentation">Enable Presentation/Meeting<br>
        <input type="checkbox" name="checkFonts" value="Check Embedded Fonts of PDF file" id="checkFonts">Check Embedded Fonts of PDF file<br>
        
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
