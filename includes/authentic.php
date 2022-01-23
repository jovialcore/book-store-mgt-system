  <!-- modal for registration -->
	<div class="modal fade" id="signUp">

    <div class="modal-dialog modal-md" role="document">

      <div class="modal-content">

        <!-- modal header -->
        <div class="modal-header">
          <h3 class="modal-title">SIGN UP</h3>
          <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- modal header end here-->

        <!-- modal body -->
        <div class="modal-body">
          <div class="row">
            
            <div class="col-lg-12 col-md-12">

              <!-- form for registration -->
              <form  method="post" name="signup" id="registrationForm">
                <div class="form-group mt-4">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                <div class="form-group mt-4">
                  <input type="text" class="form-control" name="phone" placeholder="Mobile Number" maxlength="10" required="required">
                </div>
                <div class="form-group mt-4">
                  <input type="email" class="form-control" name="email" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                  <!-- <span id="user-availability-status" style="font-size:12px;"></span>  -->
                </div>
                <div class="form-group mt-4">
                  <input type="text" class="form-control" name="regid" id="regid" onBlur="checkAvailability()" placeholder="Enter School Reg Number" required="required">
                  <!-- <span id="user-availability-status" style="font-size:12px;"></span>  -->
                </div>
                <div class="form-group mt-4">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group mt-4">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
                <div class="form-group">
                  <div id="errorMsg"></div>
                </div>
                <div class="form-group text-center pt-3">
                  <input type="submit" value="SignUp" name="errorMsgSignup" class="btn btn-block btn-primary">
                </div>
              </form>
              <!-- form for registration end here -->
            </div>

          </div>
        </div>
        <!-- modal body end here -->

        <!-- modal footer -->
        <div class="text-center">
          <p style="color: black;">Already got an account? &nbsp;
            <a href="#signIn" data-bs-toggle="modal" data-bs-dismiss="modal" class="text-primary">Login Here
            </a>
          </p>
        </div>
        <!-- modal footer end here -->
      </div>
    </div>
  </div>

  	<!-- modal for login start here-->
	<div class="modal fade" id="signIn">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">SIGN IN</h4>
					<button type="button" class="close text-danger" data-bs-dismiss="modal">Close</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						
						<div class="col-lg-12 col-md-12">

							<!-- form for login -->
							<form  method="post" name="singIn" id="loginForm">
								<div class="form-group mt-4">
									<input type="text" class="form-control" name="email" id="text"  placeholder="Email required" required="required">
									<!-- <span id="user-availability-status" style="font-size:12px;"></span>  -->
								</div>
								<div class="form-group mt-4">
									<input type="password" class="form-control" name="password" placeholder="Password" required="required">
								</div>
								<div class="form-group">
									<div id="errorMsgSignin"></div>
								</div>
								<div class="form-group pt-3 text-center">
									<input type="submit" value="SignIn" name="signin" id="submit" class="btn btn-primary">
								</div>
							</form>
							<!-- form for login end here -->
						</div>

					</div>
				</div>

				<!-- Modal footer -->
				<div class="text-center">
					<p style="color: black;">Don't have an account? 
						<a href="#signUp" data-bs-toggle="modal" data-bs-dismiss="modal" class="text-primary">
							&nbsp;Signup Here
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- modal for login end here-->