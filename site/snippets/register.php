<div class="modal fade" id="register-form">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Register</h3>
			</div>
			<div class="register-response response"></div>
			<div class="modal-body">
				<form class="register-form">
		      <div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input type="text" id="first" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" id="last" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" id="username" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="email" id="email" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" id="password" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Reenter Password</label>
								<input type="password" id="password2" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="control-label">Address</label>
								<input type="text" id="address" class="form-control">
								<div class="help-block">Please click field to find address.</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label">Apartment</label>
								<input type="text" id="apartment" class="form-control">
							</div>
						</div>
					</div>
					<div class="address-fields">
						<input type="hidden" id="street_number">
						<input type="hidden" id="route">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">City</label>
									<input type="text" id="locality" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">State</label>
									<input type="text" id="administrative_area_level_1" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Zip Code</label>
									<input type="text" id="postal_code" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Phone</label>
						<input type="tel" id="phone" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Preferred Way of Contact</label>
			  		<div class="row">
			  			<div class="col-sm-6">
			      		<div class="radio">
			      			<label>
			      				<input type="radio" name="contact" id="contact" value="email">
			      				Email Me.
			      			</label>
			    			</div>
			    		</div>
			    		<div class="col-sm-6">
			      		<div class="radio">
			      			<label>
			      				<input type="radio" name="contact" id="contact" value="text">
			      				Text Me.
			      			</label>
			      		</div>
			      	</div>
			    	</div>
				  </div>
					<div class="form-group">
						<button type="submit" id="register" class="btn btn-success"><i class="fa fa-leaf"></i> Register</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
</div>