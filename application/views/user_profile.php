   <div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>User Profile</h2>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="post" action="<?= site_url('User/update_profile') ?>">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input disabled type="text" class="form-control" name="username" value="<?= $user->idUser ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="firstName" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="firstName" value="<?= $user->firstName ?>" data-validate="required">
						</div>
					</div>
					
					<div class="form-group">
						<label for="lastName" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="lastName" value="<?= $user->lastName ?>" data-validate="required">
						</div>
					</div>
					
					<div class="form-group">
						<label for="oldPassword" class="col-sm-2 control-label">Old Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="oldPassword" name="oldPassword" value="" data-validate="required,verifyPassword">
						</div>
					</div>
					
					<div class="form-group">
						<label for="newPassword" class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" value="" data-validate="required">
						</div>
					</div>
					
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" value="<?= $user->email ?>" data-validate="required,email">
						</div>
					</div>
					
					<div class="form-group">
						<label for="country" class="col-lg-2 control-label">Country</label>
						<div class="col-lg-10">
							<select class="form-control" id="country" name="country">
								<?php foreach($countries as $country): ?>
									<?php $selected = ($country->idCountry == $oldCountryId ? "selected" : "") ?>
									<option <?= $selected ?> value="<?= $country->idCountry ?>"><?= $country->countryName ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="organization" class="col-lg-2 control-label">Organization</label>
						<div class="col-lg-10">
							<select class="form-control" id="organizationSelect" name="organization">
								<?php foreach($organizations as $organization): ?>
									<?php $selected = ($organization->idOrganization == $oldOrganizationId ? "selected" : "") ?>
									<option <?= $selected ?> value="<?= $organization->idOrganization ?>"><?= $organization->organizationName ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="department" class="col-lg-2 control-label">Department</label>
						<div class="col-lg-10">
							<select class="form-control" id="departmentSelect" name="department">
								<?php $selected = "" ?>
								<?php foreach($departments as $department): ?>
									<?php $selected = ($department->idDepartment == $oldDepartmentId ? "selected" : "")	 ?>
									<option <?= $selected ?> value="<?= $department->idDepartment ?>"><?= $department->departmentName ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<button class="btn btn-success" style="float:right;">Submit</button>
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
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script>
			$.verify.addRules({
				verifyPassword: function(r) {
					r.prompt(r.field, "Checking password...");
					var result;
					$.ajax({
						url: "<?= site_url('User/verify_password') ?>",
						data: { password: $("#oldPassword").val() },
						type: 'POST',
						success: function(opt) {
							if (opt == "1") { result = true; }
							else if (opt == "0") { result = "Invalid password"; }
							r.callback(result);
						},
						error: function() {
							result = "Error connecting to the database. Try again.";
							r.callback(result);
						}
					});
				}
			});
		</script>
    </body>
</html>
