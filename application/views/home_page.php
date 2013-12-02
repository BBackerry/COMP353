    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-2">
          <h3>Upcoming Dates:</h3>
		  <ul class="list-group">
			<li class="list-group-item"><a href="#">Link to event</a></li>
			<li class="list-group-item"><a href="#">Link to event</a></li>
			<li class="list-group-item"><a href="#">Link to event</a></li>
			<li class="list-group-item"><a href="#">Link to event</a></li>
			<li class="list-group-item"><a href="#">Link to event</a></li>
		  </ul>
        </div>
        <div class="col-lg-10">
          <h2>News</h2> 
          <?php if($this->session->userdata('isAdmin') || $this->session->userdata('isProgramChair')) { ?>
            <a href="<?php echo site_url('News/createNews'); ?>"> Add a News Message </a>
          <?php } ?>
          <?php $numOfNews = 5;
                foreach($news as $article) { ?>
              <div class="panel panel-default row">
			  <div class="panel-heading"><?php echo $article->newsTitle; ?></div>
			  <div class="col-lg-12">
                  <?php if(strlen($article->newsDescription) > 300){ ?>
                      <p><?php echo substr($article->newsDescription, 0, 300) . "..." ?></p>
                      <p><a class="btn btn-default" href="<?php echo site_url('News/viewNews?id='.$article->idNews); ?> ">View details &raquo;</a></p>
                  <?php } else { ?>
                      <p><?php echo $article->newsDescription; ?></p> 
                  <?php } ?>
                  <p>
                    <i><?php echo $article->createdBy ?></i> - <?php echo date( "Y-m-d H:i:s", strtotime($article->newsDate)); ?> 
                    <?php if($this->session->userdata('isAdmin') || $this->session->userdata('isProgramChair')) { ?>
                        <a class="btn btn-default" href="<?php echo site_url('News/editNews?id='.$article->idNews); ?> ">Edit News Message</a>
                        <a class="btn btn-default" href="<?php echo site_url('News/deleteNews?id='.$article->idNews); ?> ">Delete News Message</a>
                    <?php } ?>
                  </p>
			  </div>
              </div>
              <?php if($numOfNews == 0){ 
                        break; 
                    }else {
                        $numOfNews = $numOfNews-1;
                    }?>
          <?php } ?>
        </div>
       </div>
      </div>

      <hr>

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
