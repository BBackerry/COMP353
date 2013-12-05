<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">Manage Topics</div>
	<div class="panel-body">
    <form role="form" class="form-horizontal" action="<?= site_url('Admin/createTopic');?>" method="post">
         <div class="form-group">
            <label class="col-lg-2 control-label" for="topicName">Topic Name</label>
			<div class="col-lg-10">
				<input class="form-control" type="text" name="topicName" value=""/>
			</div>
         </div>
         <div class="form-group">
            <label class="col-lg-2 control-label" for="topicParent">Topic Parent</label>
			<div class="col-lg-10">
				<select class="form-control" name="topicParent">
					<option value="0" selected>None</option>        
					<?php foreach($topic as $aTopic): ?>
								<option value="<?= $aTopic->idTopic;?>"> <?= $aTopic->topicName; ?> </option>
					<?php endforeach; ?>
				</select>
			</div>
         </div>
        <br/>  
        <button type="submit" style="float:right;" class="btn btn-success">Create Topic</button>
    </form>
	</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Edit Topics</div>
	<div class="panel-body">
    <form role="form" class="form-horizontal" action="<?= site_url('Admin/updateTopic');?>" method="post">
        <table class="table table-hover">
			<thead>
				<tr>
					<th>Topic Name</th>
					<th>Parent Topic</th>
				</tr>
			</thead>
			<tbody>
            <?php foreach ($topic as $t): ?>
                <tr>
                    <td> 
                        <input class="form-control" type="text" name="<?= $t->idTopic; ?>" value="<?= $t->topicName; ?>"/>
                    </td>
                    <td>
                        <select class="form-control" name="<?= $t->idTopic."Parent"; ?>">
                            <?php  
                                    $idParent = 0;
                                    foreach($hierarchy as $parent){
                                        if($parent->idTopic == $t->idTopic){
                                            $idParent = $parent->idTopicHierarchy;
                                            break;
                                        }
                                    }
                            ?>
                                    <option value="0" <?= ($idParent == 0) ? 'selected' : '';?>>None</option>
                                    
                            <?php   foreach($topic as $aTopic){
                                        if($aTopic->idTopic != $t->idTopic){ ?>
                                    <option value="<?= $aTopic->idTopic;?>" <?= ($idParent == $aTopic->idTopic) ? 'selected' : ''; ?>> <?= $aTopic->topicName; ?> </option>
                            <?php  }
                            }?>
                        </select>
                    </td>
                </tr>
            <?php endforeach; ?>
			</tbody>
        </table>
        <button type="submit" style="float:right;" class="btn btn-success">Update Topics</button>
    </form>
	</div>
    </div>
</div>

	<div class="container">
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
