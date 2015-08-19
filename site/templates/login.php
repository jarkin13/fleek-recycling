<?php snippet('header') ?>
<?php $user = $site->user() ?>
<?php 
	if( !empty($user) ) :
		go('/');
	endif 
?>
  <div class="container">
    <div class="text login">
      <div class="row">
        <div class="col-sm-2 col-md-3"></div>
      	<div class="col-sm-8 col-md-6">
      		<div class="row">
      			<div class="col-sm-12">
      				<div class="slogan center">
		    				<?php echo $page->slogan() ?>
		    			</div>
      			</div>
      		</div>
    			<div class="login-section">
      			<hr>
      			<div class="response login-response"></div>
	      		<form class="login-form form-horizontal">
	      			<div class="form-group">
	      				<label class="col-sm-2 control-label">Username</label>
	      				<div class="col-sm-10">
	      					<input type="text" id="login-username" class="form-control">
	      				</div>
	      			</div>
	      			<div class="form-group">
	      				<label class="col-sm-2 control-label">Password</label>
	      				<div class="col-sm-10">
	      					<input type="password" id="login-password" class="form-control">
	      				</div>
	      			</div>
	      			<div class="form-group">
	      				<div class="col-sm-offset-2 col-sm-10">
	      					<button type="submit" class="btn btn-success" id="submit-login">Login</button>
	      				</div>
	      			</div>
	      		</form>
	      	</div>
      	</div>
        <div class="col-sm-2 col-md-3"></div>
      </div>
      <?php snippet('register') ?>
    </div>  
  </div>

<?php snippet('footer') ?>