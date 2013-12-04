  
    <div class="container">
          <h3>Manage Topics:</h3>  
    <div class="panel-body">
    
    <h3>Add a new Topic</h3>
    <br/>
    <form name="newTopicForm" action="<?php echo site_url('Admin/createTopic');?>" method="post">
         <div class="form-group">
            <label for="topicName">Topic Name: </label>
            <input type="Text" name="topicName" value=""/>
         </div>
        <br/>
         <div class="form-group">
            <label for="topicParent">Topic Parent: </label>
            <select name="topicParent">
                <option value="0" selected> None </option>        
                <?php   foreach($topic as $aTopic){?>
                            <option value="<?php echo $aTopic->idTopic;?>"> <?php echo $aTopic->topicName; ?> </option>
                <?php  } ?>
            </select>
         </div>
        <br/>  
        <button type="submit" class="btn btn-success">Create Topic</button>
    </form> 
    <br/>
    <hr/>
    <br/>
    <h3>Edit Topics </h3>
    <form name="topicHierarchyForm" action="<?php echo site_url('Admin/updateTopic');?>" method="post">
        <table border="1">
            <tr>
                <th> Topic Name </th>
                <th> Topic Parent </th>
            </tr>
            <?php foreach ($topic as $t) { ?>
                <tr>
                    <td> 
                        <input type="text" name="<?php echo $t->idTopic; ?>" value="<?php echo $t->topicName; ?>"/>
                    </td>
                    <td>
                        <select name="<?php echo $t->idTopic."Parent"; ?>">
                            <?php  
                                    $idParent = 0;
                                    foreach($hierarchy as $parent){
                                        if($parent->idTopic == $t->idTopic){
                                            $idParent = $parent->idTopicHierarchy;
                                            break;
                                        }
                                    }
                            ?>
                                    <option value="0" <?php echo ($idParent == 0) ? 'selected' : '';?>> None </option>
                                    
                            <?php   foreach($topic as $aTopic){
                                        if($aTopic->idTopic != $t->idTopic){ ?>
                                    <option value="<?php echo $aTopic->idTopic;?>" <?php echo ($idParent == $aTopic->idTopic) ? 'selected' : ''; ?>> <?php echo $aTopic->topicName; ?> </option>
                            <?php  }
                            }?>
                        </select>
                    </td>
                </tr>
            <?php } ?>                 
        </table> 
        <br/>
        <button type="submit" class="btn btn-success">Update Topics</button>
    </form>  
    <br/> 
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
