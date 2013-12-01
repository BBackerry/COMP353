    <div class="container">
    <br>
    
      <h3 class="panel-title"><b>Paper Review (Paper DEtail)</b></h3>
      	<div class="panel-body">
        
      <p>If you are unable to review this paper, you may assign it to an external reviewer who is:<br>
        - a user ConfSys.<br>- has no conflict of intrests and <br> - you know this persons email address as registered in ConfSys<br>
      </p>
      <br>
      
      <div class="form-group">
            <h3 class="panel-title"><b>External Reviewer Email:</b></h3>
            <input type="text" name="email" class="form-control" id="Email">
            <br>
            <a href="<?php echo site_url('Event/submit/') ?>" class="btn btn-success" > Assign </a>
            <br>    
    </div>   
   
     
        
       <h3 class="panel-title"><b>Paper Information</b></h3>
       <br>
        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Paper Title</label>
            <p>This title of this paper is 1212</p>
        </div> 
       
        <div class="form-group">
            <label for="abstract" class="col-lg-2 control-label">Paper Abstract</label>  
            <p>This is a short summary of the paper whose title is given above 1212</p> 
        </div>
        
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Paper Subjects</label>
            <p>[<ICCM>2.21] ICCM:Milti-functional composites<br>[<ICCM>2.41]ICCM:Nanotechnology composites</p> 
        </div>
       
        <div class="form-group">
            <label for="version" class="col-lg-2 control-label">Version</label>
            <p>Version 1 [2013-01-16 17:59:54]: icing, carbon nanotubes, aerosurface, thermal, electrical</p> 
           
        </div>     
      
      <br>
        <h3 class="panel-title"><b>My Review Result {* Indicated required fields. Please see the on-line help about timeout.)</b></h3>
            <br>
            
        <div class="form-group">
            <label for="subject" class="col-lg-2 control-label">Paper Score</label>               
            <select class="form-control" id="score">
            <option>1.0</option>
            <option>2.0</option>
            <option>3.0</option>
            <option>4.0</option>
            <option>5.0</option>
            <option>6.0</option>
            <option>7.0</option>
            <option>8.0</option>
            <option>9.0</option>
            <option>10.0</option>         
            </select>
        </div>
        
               
        <div class="form-group">
            <label for="confidence" class="col-lg-2 control-label">My Confidence:</label>
            <select class="form-control" id="confidence">
            <option>1.0</option>
            <option>2.0</option>
            <option>3.0</option>
            <option>4.0</option>
            <option>5.0</option>
            </select>  
        </div>
                
        
        <div class="form-group">
            <label for="originality" class="col-lg-2 control-label">Originality:</label>
            <select class="form-control" id="originality">
            <option>Very Good</option>
            <option>Good</option>
            <option>Average</option>
            <option>Bad</option>
            <option>Very Bad</option>
            </select>        
        </div>
        
        
        <div class="form-group">
            <label for="strongPoint" class="col-lg-2 control-label">Strong Point:</label>
            <input type="text" name="point" class="form-control" style="width:500px" id="strongPoint">
        </div>           
        
        <div class="form-group">
            <label for="Comment" class="col-lg-2 control-label">Other Comment:</label>
            <input type="text" name="point" class="form-control" style="height:200px; width:500px" id="comment">
        </div>
        
        
        <h3 class="panel-title"><b>Paper Comments</b></h3>
        <br> 
        
        <div class="form-group">
            <label for="AuthorComments" class="col-lg-2 control-label">My Comments to Authors <br>(Would be shown to the author)</label>
            <input type="text" name="point" class="form-control" style="height:200px; width:600px" id="paperComment">        
            
        </div>    
        <div class="form-group">
            <label for="ProgramComments" class="col-lg-2 control-label">My Comments to Program/General Chair <br>(Show only to a General/Program Chair)</label>
            <input type="text" name="point"  class="form-control" style="height:200px; width:600px" id="commentToAuthor">
       </div>
       
        <a href="<?php echo site_url('Paper/paperReview/') ?>" class="btn btn-success" >Submit</a>       
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
