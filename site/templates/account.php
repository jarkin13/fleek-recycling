<?php snippet('header') ?>
<?php $user = $site->user() ?>
    <div class="container">
      <h1>Welcome <?php echo $user->firstName() ?>!</h1>
      <?php 
				if( $schedules = $site->page('schedules') ) : 
					if( $dates = $schedules->children() ) : 
						foreach( $dates as $date ) { 
							foreach( $date->children() as $client ) { 
								if( $client->user() == $user->username() ) : ?>
									<div class="row">
										<div class="col-sm-12">
											<h4><?php echo $date->title() ?></h4>
											
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