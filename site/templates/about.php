<?php snippet('header') ?>
	<div class="page-header about-header">
  	<h1><?php echo $page->pagetitle()->html() ?></h1>
  </div>
  <div class="container about page-header-container">
  	<div class="row step-row">
  		<div class="col-sm-4">
  			<h3>Gather</h3>
  			Get together your cans, plastic & glass bottles in a bag.
  		</div>
  		<div class="col-sm-4">
  			<h3>Schedule</h3>
  			<a href="<?php echo url('schedules') ?>">Schedule</a> a pick up with a minimum of an hour window for us to pick up your recycling.
  		</div>
  		<div class="col-sm-4">
  			<h3>Confirmation</h3>
  			You will receive an email or text confirming your pickup.
  		</div>
  	</div>
  	<div class="separator">
  		<hr>
  	</div>
  	<div class="row">
  		<div class="col-sm-3">
  			<h2>Our Mission</h2>
  		</div>
  		<div class="col-sm-9">
  			<?php echo $page->missiontext()->kirbytext() ?>
  		</div>
  	</div>
  </div>

<?php snippet('footer') ?>