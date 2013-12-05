<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">Edit User</div>
	<div class="panel-body">
		<form role="form" class="form-horizontal" action="<?= site_url('Admin/updateUser')?>" method="post">
				 <div class="form-group">
					<label class="col-lg-2 control-label" for="user">Username</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="user" value="<?= $user->idUser?>" disabled>
					</div>
				 </div>
                 <input type="hidden" name="username" value="<?= $user->idUser?>" />
				 <div class="form-group">
					<label class="col-lg-2 control-label" for="password">Password</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="password" value="<?= $user->password?>"/>
					</div>
				 </div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="firstname">First Name</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="firstname" value="<?= $user->firstName; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="lastname">Last Name</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="lastname" value="<?= $user->lastName; ?>"/>
					</div>
				</div>
				 <div class="form-group">
					<label class="col-lg-2 control-label" for="email">Email</label>
					<div class="col-lg-10">
						<input class="form-control" type="text" name="email" value="<?= $user->email; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="country">Country</label>
					<div class="col-lg-10">
						<select class="form-control" name="country">
							<?php foreach($country as $c): ?>
								<option value="<?= $c->idCountry; ?>" <?php if($c->idCountry == $user->country) echo "selected"; ?>><?= $c->countryName; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="organization">Organization</label>
					<div class="col-lg-10">
						<select class="form-control" name="organization">
							<?php foreach($organization as $o): ?>
							<option value="<?= $o->idOrganization; ?>" <?php if($o->idOrganization == $user->organization) echo "selected"; ?>><?= $o->organizationName; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="department">Department</label>
					<div class="col-lg-10">
						<select class="form-control" name="department">
							<?php foreach($department as $d): ?>
								<option value="<?= $d->idDepartment; ?>" <?php if($d->idDepartment == $user->department) echo "selected"; ?>><?= $d->departmentName; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<br/>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="interest[]">Interested In Topic(s)</label>
					<div class="col-lg-10">
						<select class="form-control" name="interest[]" size="10" multiple>
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
														foreach($interest as $topicInterest){
															if($topicInterest->idTopic == $idTopic){
																$selected = true;
															}
														} 
							?>
														<option value="<?= $idTopic?>" <?= $selected ? 'selected' : ''?>><?= $tab.$t->topicName?></option>
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
														foreach($interest as $topicInterest){
															if($topicInterest->idTopic == $idTopic){
																$selected = true;
															}
														} 
							?>
														<option value="<?= $idTopic?>" <?= $selected ? 'selected' : ''?>><?= $tab.$t->topicName?></option>
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
												foreach($interest as $topicInterest){
													if($topicInterest->idTopic == $idTopic){
														$selected = true;
													}
												} 
							?>
												<option value="<?= $idTopic?>" <?= $selected ? 'selected' : ''?>><?= $tab.$t->topicName?></option>
							<?php               $idTopic ="";
											}
										}
									}
								}?>
						</select>
					</div>
				</div>
				<br/>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="expert[]">Expert In Topic(s)</label>
					<div class="col-lg-10">
						<select class="form-control" name="expert[]" size="10" multiple>
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
														foreach($expert as $topicExpert){
															if($topicExpert->idTopic == $idTopic){
																$selected = true;
															}
														} 
							?>
														<option value="<?= $idTopic?>" <?= $selected ? 'selected' : ''?>><?= $tab.$t->topicName?></option>
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
														foreach($expert as $topicExpert){
															if($topicExpert->idTopic == $idTopic){
																$selected = true;
															}
														} 
							?>
														<option value="<?= $idTopic?>" <?= $selected ? 'selected' : ''?>><?= $tab.$t->topicName?></option>
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
												foreach($expert as $topicExpert){
													if($topicExpert->idTopic == $idTopic){
														$selected = true;
													}
												} 
							?>
												<option value="<?= $idTopic?>" <?= $selected ? 'selected' : ''?>><?= $tab.$t->topicName?></option>
							<?php               $idTopic ="";
											}
										}
									}
								}?>
						</select>
					</div>
				</div>
			<button type="submit" style="float:right;" class="btn btn-success">Save User</button>
			</form>  
	</div>
	</div>
</div>
    <!-- Example row of columns -->
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
