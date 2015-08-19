<?php snippet('header') ?>
<?php $user = $site->user() ?>
  <div class="container">
    <div class="text home-text">
      <div class="row">
      	<div class="col-sm-12">
      		<div class="home-photo">
      			<div class="row">
	      			<div class="col-sm-6">
		      			<div class="register-response register-head-response response"></div>
		      			<div class="schedule-response response"></div>
				      	<form class="schedule-form">
				      		<?php if( !empty($user) ) : ?>
										<input type="hidden" id="schedule-username" value="<?php echo $user->username() ?>">
									<?php endif ?>
					      	<div class="row">
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<label class="control-label">Pick Up Date</label>
												<input id="date" class="datetime form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<label class="control-label">Pick Up Time Availability <span class="time-optional">(optional)</span></label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6 col-sm-6">
											<div class="form-group">
												<input id="time" placeholder="From" class="form-control">
											</div>
										</div>
										<div class="col-xs-6 col-sm-6">
											<div class="form-group">
												<input id="time2" placeholder="To" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="response time-response"></div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<div class="checkbox help-block">
													<label>
														<input type="checkbox" name="allday" id="allday" value="true">		  
														I'll be available all day 			
													</label>
												</div>
												<div class="checkbox help-block">
													<label>
														<input type="checkbox" name="doorman" id="doorman" value="true">		  
														I will leave with my doorman
													</label>
												</div>
												<hr>
											</div>
										</div>
									</div>
									<div class="form-group">
										<textarea class="form-control" id="notes" rows="3" placeholder="Other Notes"></textarea>
									</div>
				    			<div class="form-group">
										<button type="submit" id="schedule" class="btn btn-success"><i class="fa fa-leaf"></i> Recycle</button> 
									</div>
				    		</form>
				    	</div>
				    	<div class="col-sm-7"></div>
				    </div>
		    	</div>
	    	</div>
      </div>
      <?php snippet('register') ?>
    </div>    
  </div>

<?php snippet('footer') ?>