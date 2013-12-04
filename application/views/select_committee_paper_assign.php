<div class="container">
<div class="row">
	<div class="panel panel-default">
		<h3>Paper Details:</h3>  
		<div class="panel-body">
            <div class="panel panel-default">
                <h3><a href="<?= site_url('Paper/viewPaper') . '?idPaper=' . $paper->idPaper; ?>"><?= $paper->title; ?></a></h3>
                Abstract: <?= $paper->abstract; ?><br />
                Keywords: <?= $paper->keywords;?><br />
                <br />
            </div>
        </div>
        <!-- $param['commiteeMembers'] = $committeeMember;
        $param['commiteeExpertise'] = $expert;
        $param['commiteeBid'] = $bid; -->
        <h3>Select a Committee Member to Assign This Paper To:</h3>
        <br/>
        <div class="col-lg-12">
            <table border="1">
                <tr>
                    <th>Username</th>
                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>Bid Score </th>
                    <th>Expert in Some of This Paper's Topics </th>
                    <th>Expert in All of This Paper's Topics </th>
                    <th></th>
                </tr>
                <?php foreach($committeeMembers as $member){?>
                    <tr>
                        <td><?= $member->idUser; ?></td>
                        <td><?= $member->firstName; ?></td>
                        <td><?= $member->lastName; ?></td>
                        <td>
                            <?php if($committeeBid[$member->idUser]) { 
                                    echo $committeeBid[$member->idUser][0]->bid;
                                } else {
                                    echo "N/A";
                                }?>
                        </td>
                        <?php 
                            $expertise = $committeeExpertise[$member->idUser];
                            $expert = false;
                            $expertInAll = 0;
                            foreach($expertise as $expertTopic){
                                foreach($paperTopics as $topic){
                                    if($topic->idTopic == $expertTopic->idTopic){
                                        $expert = true;
                                        $expertInAll = $expertInAll +1;
                                        break;
                                    }
                                }
                            }
                            ?>
                        <td><?= $expert ? "YES" : "NO"; ?></td>
                        <td><?= ($expertInAll==count($paperTopics)) ? "YES" : "NO"; ?></td>
                        <?php 
                            $assigned = false;
                            foreach($reviewAssignment as $assignment){
                                if($assignment->idAssignedTo == $member->idUser){
                                    $assigned = true;
                                    break;
                                }
                            }
                            if($assigned){
                                $url = site_url('ProgramChair/deleteReviewAssignment');
                                $btnClass = "btn btn-warning";
                                $btnValue = "Un-Assign This Committee Member";
                            }else {
                                $url = site_url('ProgramChair/createReviewAssignment');
                                $btnClass = "btn btn-success";
                                $btnValue = "Assign This Committee Member";
                            }?>
                            <td>
                            <form action="<?= $url; ?>">
                                <input type="hidden" name="idPaper" value="<?=$paper->idPaper;?>"/>
                                <input type="hidden" name="idEvent" value="<?=$idEvent;?>"/>
                                <input type="hidden" name="idAssignedTo"  value="<?=$member->idUser;?>"/>
                                <input class="<?= $btnClass; ?>" style="width:100%" type="submit" value="<?= $btnValue; ?>">
                            </form>
                            </td>
                   </tr>
                <?php }?>
            </table>
        </div>
        <br/>
	</div>
</div>
</div>

    <div class="container">
      <!-- Example row of columns -->

         <footer>
        <p>&copy; Best Concordia Team</p>
      </footer>
    </div> <!-- /container -->
	
		<script src="../assets/js/vendor/jquery-1.10.1.min.js"></script>
		<script src="../assets/js/vendor/bootstrap.min.js"></script>
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="../assets/js/datepicker.js"></script>
    </body>
</html>
