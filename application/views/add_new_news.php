  
     <div class="container">
          <h3>Add a News Message:</h3>  
      <div class="panel-body">
        
        
    <form name="newsForm" action="<?php echo site_url('News/submitedNews');?>" method="post">
        <div class="form-group">
            <label for="title">Title (limit 100 characters): </label>
            <input type="Text" name="title" size="100" value="" data-validate="required">
        </div>
        <br/>
        <div class="form-group">
            <label for="description">News Description (limit 2000 characters): </label>
            <textarea name="description" rows="10" cols="150" data-validate="required">
            </textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-success">Create News Message</button>
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
