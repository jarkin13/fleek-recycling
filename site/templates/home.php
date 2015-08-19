<?php snippet('header') ?>
<div class="container home">
	<div class="row">
		<div class="col-sm-12">
			<div class="home-photo">
				<div class="content">
					<div class="headline">
						<?php echo $page->text()->kirbytext() ?>
					</div>
					<div class="keywords">
						<?php echo $page->slogan() ?>
					</div>
					<div class="help-block">
						<?php echo $page->helptext() ?>
					</div>
					<div class="button-group">
						<a href="<?php echo url('/schedules') ?>" class="btn btn-success no-radius">
							GET STARTED
						</a>
						<a href="<?php echo url('/about') ?>" class="link">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-12">
			<div class="home-photo mobile"></div>
		</div>
	</div>
	<?php snippet('register') ?>
</div>
<?php snippet('footer') ?>