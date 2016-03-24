<?php snippet('header') ?>
<?php $user = $site->user() ?>
    <div id="account" class="container">
      <h1>Welcome <?php echo $user->firstName() ?>!</h1>
      <?php 
				if( $schedules = $site->page('schedules') ) : 
					if( $dates = $schedules->children() ) : 
						foreach( $dates as $date ) { 
							foreach( $date->children() as $client ) { 
								if( $client->user() == $user->username() ) : ?>
									<div class="row pickup">
										<div class="col-sm-4">
											<h4 id="date" data-date="<?php echo strftime('%m/%d/%Y', $client->date()) ?>"></h4>
											<p><?php echo $client->time() ?> - <?php echo $client->time2() ?></p>
										</div>
										<div class="col-sm-3">
											Pickup #<?php echo $client->pickupid() ?>
										</div>
									</div>
								<?php endif;
							}; 
						}; 
					endif; 
				endif;
			?>
    </div>

<?php snippet('footer') ?>