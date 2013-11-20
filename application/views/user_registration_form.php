    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ConfSys New User Sign Up</h3>
				</div>
				<div class="panel-body">
					<p>You need to be sign up as a user in Confsys to be able to access the features provided to various of its group of users. The system allows signed-up users to be associated with one or more conference series and on-line journals. All access to information and functions associated with these are managed by ConfSys.</p>
					<p>Important: please make sure to input your valid email address, confirmation emails will be sent to you to help you complete the Step 2 of the sign up. You may change your email address once you have completed your sign up process. 
					Please keep your profile and email address updated.</p>
					
					<form role="form" class="form-horizontal">
						<div class="form-group">
							<label for="firstName" class="col-lg-2 control-label">First Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="firstName">
							</div>
						</div>
						<div class="form-group">
							<label for="middleName" class="col-lg-2 control-label">Middle Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="middleName">
							</div>
						</div>
						<div class="form-group">
							<label for="lastName" class="col-lg-2 control-label">Last Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="lastName">
							</div>
						</div>
						<div class="form-group">
							<label for="country" class="col-lg-2 control-label">Country</label>
							<div class="col-lg-10">
								<select class="form-control" id="country">
									<option>Canada</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="organization" class="col-lg-2 control-label">Country</label>
							<div class="col-lg-10">
								<select class="form-control" id="organization">
									<option>Google</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="department" class="col-lg-2 control-label">Department</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="department">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-lg-2 control-label">Address</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="address">
							</div>
						</div>
						<div class="form-group">
							<label for="city" class="col-lg-2 control-label">City</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="city">
							</div>
						</div>
						<div class="form-group">
							<label for="province" class="col-lg-2 control-label">Province/State</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="province">
							</div>
						</div>
						<div class="form-group">
							<label for="postCode" class="col-lg-2 control-label">Postal Code</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="postCode">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" id="email">
							</div>
						</div>
						<div class="form-group">
							<label for="emailConfirmation" class="col-lg-2 control-label">Confirm Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" id="emailConfirmation">
							</div>
						</div>
						<a href="<?php echo site_url('User/registration_complete/') ?>" class="btn btn-success" style="float:right;">Submit</a>
					</form>
				</div>
			</div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Best Concordia Team</p>
      </footer>
    </div> <!-- /container -->
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../<?php echo base_url();?>/<?php echo base_url();?>/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>/<?php echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/<?php echo base_url();?>/assets/js/plugins.js"></script>
		<script src="<?php echo base_url();?>/<?php echo base_url();?>/assets/js/main.js"></script>
    </body>
</html>