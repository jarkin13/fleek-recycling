<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <link rel="shortcut icon" type="image/ico" href="<?php echo url('assets/images/favicon.ico') ?>"/>
  <?php if( $site->environment() == 'staging' ) : ?>
  	<?php $font = '//use.typekit.net/pdd7mag.js'; ?>
  <?php endif ?>
  <?php if( $site->environment() == 'production' ) : ?>
  	<?php $font = '//use.typekit.net/wmj0ilf.js'; ?>
  <?php endif ?>
  <?php if( $font ) : ?>
  	<script src="<?php echo $font ?>"></script>
  <?php endif ?>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <?php echo css(array(
  'assets/css/libs/jPushMenu.css',
  'assets/css/libs/rome.css',
	'assets/css/main.css'
	)) ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
  <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-66104730-1', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body class="tk-proxima-nova">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<header class="header cf" role="banner">
			    <a class="logo" href="<?php echo url() ?>">
			      <img src="<?php echo url('assets/images/fleek-logo.png') ?>" alt="<?php echo $site->title()->html() ?>" />
			    </a>
			    <?php snippet('menu') ?>
			    <button class="toggle-menu menu-right"><i class="fa fa-bars"></i></button>
					</div>
			  </header>
			</div>
		</div>
	</div>