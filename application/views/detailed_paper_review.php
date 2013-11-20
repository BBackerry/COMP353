    <div class="container">
      <h3 class="panel-title">Paper Review (Paper DEtail)</h3>
      	<div class="panel-body">
      <p>If you are unable to review this paper, you may assign it to an external reviewer who is:<br>
        - a user ConfSys.<br>- has no conflict of intrests and <br> - you know this persons email address as registered in ConfSys
      </p>
      
      <hr>
      
     
      
      <div class="form-group">
      <h3> External Reviewer Email:</h3>
      <input type="text" name="email" class="form-control" id="Email">
      <button type="button"> Assign </button>
      </div>
    

      <hr>  
      
     
        
        <h3 class="panel-title"> Paper Information</h3>
       
        <div class="form-group">
        <h4 class="panel-title">Paper</h4>
        <div class="col-lg-10">
        <h3 class="panel-title">This title of this paper is 1212</h3> 
        </div>        
        </div>
        
        
       
        <div class="form-group">
        <h4 class="panel-title">Paper Abstract</h4>       
        <div class="col-lg-10">
        <h3 class="panel-title">This is a short summary of the paper whose title is given above 1212</h3>        
        </div>
        </div>
       
        <div class="form-group">
        <h4 class="panel-title">Paper Subjects</h4>
        
        <div class="col-lg-10">
        <h3>[<ICCM>2.21] ICCM:Milti-functional composites<br>[<ICCM>2.41]ICCM:Nanotechnology composites</h3> 
         </div>
         </div>
        
       
        <div class="form-group">
        <h4 class="panel-title">Version</h4>        
        <div class="col-lg-10">
        <h3>Version 1 [2013-01-16 17:59:54]: icing, carbon nanotubes, aerosurface, thermal, electrical</h3> 
        </div>
        </div>     
      
      
        <h3 class="panel-title">My Review Result{* Indicated required fields. Please see the on-line help about timeout.)</h3>
        
        <div class="form-group">
        <h4 class="panel-title">Paper Score</h4>               
        <div class="col-lg-10">
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
        
        </div>
        
               
        <div class="form-group">
        <h4 class="panel-title">My Confidence:</h4>
        
        <div class="col-lg-10">
        <select class="form-control" id="confidence">
        <option>1.0</option>
        <option>2.0</option>
        <option>3.0</option>
        <option>4.0</option>
        <option>5.0</option>
        </select>
        </div>
        
        </div>
                
        
        <div class="form-group">
        <h4 class="panel-title">Originality:</h4>
        
        <div class="col-lg-10">
        <select class="form-control" id="originality">
        <option>Very Good</option>
        <option>Good</option>
        <option>Aerage</option>
        <option>Bad</option>
        <option>Very Bad</option>
        </select>
        </div>
        
        </div>
        
        
        <div class="form-group">
        <h4 class="panel-title">Strong Point:</h4>
        
        <input type="text" name="point" class="form-control" style="width:500px">
        </div>
                
        
        <div class="form-group">
        <h4 class="panel-title">Other Comment:</h4>
        <input type="text" name="point" class="form-control" style="height:200px; width:500px" id="comment">
        </div>
        
        <div class="form-group">
        <hr>
        <h4 class="panel-title">Paper Comments</h4>        
        <h4 class="panel-title">My Comments to Authors (Would be shown to the author)</h4>
        <input type="text" name="point" class="form-control" style="height:200px; width:600px">        
        <hr>        
        <h4 class="panel-title">My Comments to Program/General Chair(Show only to a General/Program Chair)</h4>
        <input type="text" name="point"  class="form-control" style="height:200px; width:600px">
        <hr>
        <a href="<?php echo site_url('Event/submit/') ?>" class="btn btn-success" >Submit</a>
        
             
      </div>
      
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
