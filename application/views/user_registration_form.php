    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ConfSys New User Sign Up</h3>
				</div>
				<div class="panel-body">
					<p>You need to be sign up as a user in Confsys to be able to access the features provided to various of its group of users. The system allows signed-up users to be associated with one or more conference series and on-line journals. All access to information and functions associated with these are managed by ConfSys.</p>
					<p>Important: please make sure to input your valid email address, confirmation emails will be sent to you to help you complete the Step 2 of the sign up. You may change your email address once you have completed your sign up process. 
					Please keep your profile and email address updated.</p>
					
					<form role="form" class="form-horizontal" method="post" action="<?php echo site_url('User/register_new/') ?>">
						<div class="form-group">
							<label for="username" class="col-lg-2 control-label">Username</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="username" name="username" data-validate="required,userNotExist">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" class="form-control" id="password" name="password" data-validate="required">
							</div>
						</div>
						<div class="form-group">
							<label for="firstName" class="col-lg-2 control-label">First Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="firstName" name="firstName" data-validate="required">
							</div>
						</div>
						<div class="form-group">
							<label for="lastName" class="col-lg-2 control-label">Last Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="lastName" name="lastName" data-validate="required">
							</div>
						</div>
						<div class="form-group">
							<label for="country" class="col-lg-2 control-label">Country</label>
							<div class="col-lg-10">
								<select class="form-control" id="country" name="country">
									<?php foreach($countries as $country): ?>
										<option value="<?= $country->idCountry ?>"><?= $country->countryName ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="organization" class="col-lg-2 control-label">Organization</label>
							<div class="col-lg-10">
								<select class="form-control" id="organizationSelect" name="organization">
									<?php foreach($organizations as $organization): ?>
										<option value="<?= $organization->idOrganization ?>"><?= $organization->organizationName ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="department" class="col-lg-2 control-label">Department</label>
							<div class="col-lg-10">
								<select class="form-control" id="departmentSelect" name="department">
									<?php foreach($departments as $department): ?>
										<option value="<?= $department->idDepartment ?>"><?= $department->departmentName ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-lg-2 control-label">Address</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="address" name="address" data-validate="required">
							</div>
						</div>
						<div class="form-group">
							<label for="city" class="col-lg-2 control-label">City</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="city" name="city" data-validate="required">
							</div>
						</div>
						<div class="form-group">
							<label for="province" class="col-lg-2 control-label">Province/State</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="province" name="province" data-validate="required">
							</div>
						</div>
						<div class="form-group">
							<label for="postalCode" class="col-lg-2 control-label">Postal Code</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="postalCode" name="postalCode" data-validate="required,regex([A-Z]{1}\d{1}[A-Z]{1}\d{1}[A-Z]{1}\d{1})">
							</div>
						</div>
						<input type="hidden" name="email" value="<?= $email ?>">
						<button class="btn btn-success" style="float:right;">Submit</button>
					</form>
				</div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Best Concordia Team</p>
      </footer>
    </div> <!-- /container -->
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../<?php echo base_url();?>/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/assets/js/main.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script>
			$("#username").blur(function () {
				$.ajax({
					url: "<?= site_url('User/validate_user_registration') ?>",
					data: { username: $("#username").val() },
					type: 'POST',
					success: function(opt) {
						window.userNotExist = opt;
					}
				});
			});
		</script>
		<script>
			$.verify.addRules({
				userNotExist: function(r) {
					r.prompt(r.field, "Checking username...");
					var result;
					$.ajax({
						url: "<?= site_url('User/validate_user_registration') ?>",
						data: { username: $("#username").val() },
						type: 'POST',
						success: function(opt) {
							if (opt == "1") { result = true; }
							else if (opt == "0") { result = "Username already exists"; }
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