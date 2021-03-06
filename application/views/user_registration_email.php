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
							<label for="firstEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" id="firstEmail" placeholder="Email" data-validate="required,email">
							</div>
						</div>
						<div class="form-group">
							<label for="confirmationEmail" class="col-lg-2 control-label">Confirm Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" id="confirmationEmail" placeholder="Email" data-validate="required,email,sameEmail">
							</div>
						</div>
						<a id="submit_email" class="btn btn-success" style="float:right;">Submit</a>
					</form>
				</div>
			</div>
        </div>
      </div>
	  
	  <div id="confirmation_message" style="display:none;">
		<p>Thanks, your email has just been verified, <a href="http://localhost/comp353/User/register_form">click here</a> to continue your registration</p>
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
		<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>/assets/js/vendor/verify.notify.min.js"></script>
		<script>
			$(function() {
				$( "#submit_email" ).click(function() {
					if ($("#confirmationEmail").val() == $("#firstEmail").val() && $("#firstEmail") != "") {
						$("#confirmation_message").find("a").attr("href", "http://localhost/comp353/User/register_form/" + $("#confirmationEmail").val());
						$("#confirmation_message").dialog();
					}
				});
			});
		</script>
		<script>
			$.verify.addRules({
				sameEmail: function(r) {
					if (r.val() == $("#firstEmail").val()) {
						return true;
					}
					else { return "Email do not match"; }
				}
			});
		</script>
    </body>
</html>