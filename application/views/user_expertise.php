    <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel panel-heading">
				<h2>User Expertise</h2>
			</div>
			<div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="<?= site_url('User/update_expertise') ?>">
				<div class="form-group">
					<label for="expertise[]" class="col-sm-2 control-label">Expertise List:</label>
					<div class="col-sm-10">
						<select id="interestSelect" name="expertise[]" class="form-control" size="10" multiple>
							<?php 
								$parents = explode("&", substr($hierarchy, 1));
								foreach($parents as $parent){
									$strlen = strlen( $str );
									$tab = "";
									$idTopic = "";
									for( $i = 0; $i <= strlen($parent); $i++ ) {
										$char = substr( $parent, $i, 1 );
										if($char === "["){ 
											if($idTopic !== ""){ 
												foreach($topic as $t){
													if($t->idTopic == $idTopic){ 
														$selected = false;
														foreach($expertise as $topicExpertise){
															if($topicExpertise->idTopic == $idTopic){
																$selected = true;
															}
														} 
							 ?>
														<option value="<?= $idTopic; ?>" <?= $selected ? 'selected' : ''; ?>><?= $tab.$t->topicName; ?></option>
							<?php                       $idTopic ="";
													}
												}
											}
											$tab = $tab."&nbsp;&nbsp;";    
										}
										else if ($char === "]"){
											if($idTopic !== ""){ 
												foreach($topic as $t){
													if($t->idTopic == $idTopic){ 
														$selected = false;
														foreach($expertise as $topicExpertise){
															if($topicExpertise->idTopic == $idTopic){
																$selected = true;
															}
														} 
							 ?>
														<option value="<?= $idTopic; ?>" <?= $selected ? 'selected' : ''; ?>><?= $tab.$t->topicName; ?></option>
							<?php                       $idTopic ="";
													}
												}
											}
											$tab = substr($tab,0, -12);
										}
										else{
											$idTopic = $idTopic.$char;
										}
									}
									if($idTopic !== ""){ 
										foreach($topic as $t){
											if($t->idTopic == $idTopic){ 
												$selected = false;
												foreach($expertise as $topicExpertise){
													if($topicExpertise->idTopic == $idTopic){
														$selected = true;
													}
												} 
							 ?>
												<option value="<?= $idTopic; ?>" <?= $selected ? 'selected' : ''; ?>><?= $tab.$t->topicName; ?></option>
							<?php               $idTopic ="";
											}
										}
									}
								} ?>
						</select>
					</div>
				</div> <!-- Topic list form-group -->
				<button class="btn btn-success" style="float:right;">Update</button>
			</form>
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
		<script src="<?= base_url(); ?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>/assets/js/plugins.js"></script>
		<script src="<?= base_url(); ?>/assets/js/main.js"></script>
		<script>
			$("#interestSelect").focus();
		</script>
    </body>
</html>
