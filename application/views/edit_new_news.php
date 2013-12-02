    <script language="JavaScript" src="../assets/js/ts_picker.js">
    //Script by Denis Gritcyuk: tspicker@yahoo.com
    //Submitted to JavaScript Kit (http://javascriptkit.com)
    //Visit http://javascriptkit.com for this script
    </script>    
     <div class="container">
          <h3>Edit a News Message:</h3>  
      <div class="panel-body">
        
        
    <form name="newsForm" action="<?php echo site_url('News/updateNews');?>" method="post">
        <?php foreach ($news as $article) { ?>
            <input type="hidden" name="id" value="<?php echo $article->idNews; ?>"/>
             <div class="form-group">
                <label for="date">Date: </label>
                <input type="Text" name="date" value="<?php echo  date( "Y-m-d H:i:s", strtotime($article->newsDate)); ?>">
                <a href="javascript:show_calendar('document.newsForm.date', document.newsForm.date.value);"><img src="../assets/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the start Time"></a>
            </div>
            <br/>
            <div class="form-group">
                <label for="title">Title (limit 100 characters): </label>
                <input type="Text" name="title" size="100" value="<?php echo $article->newsTitle; ?>">
            </div>
            <br/>
            <div class="form-group">
                <label for="description">News Description (limit 2000 characters): </label>
                <textarea name="description" rows="10" cols="150"> 
                    <?php echo $article->newsDescription; ?>
                </textarea>
            </div>
            <br/>
        <?php } ?>
        <button type="submit" class="btn btn-success">Save News Message</button>
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
