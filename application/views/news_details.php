    <div class="container">
       <div class="col-lg-10">
          <h2>News</h2>
          <?php foreach($news as $article) { ?>
              <div class="panel panel-default row">
			  <div class="panel-heading"><?php echo $article->newsTitle; ?></div>
			  <div class="col-lg-12">
                  <p><?php echo $article->newsDescription; ?></p> 
                  <p><i><?php echo $article->createdBy ?></i> - <?php echo date( "Y-m-d H:i:s", strtotime($article->newsDate)); ?></p>
			  </div>
              </div>
          <?php } ?>
        </div>
    </div>

    <hr>

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
