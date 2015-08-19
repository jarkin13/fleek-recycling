<div class="container">
	<hr>
  <footer class="footer" role="contentinfo">
    <div class="copyright">
      <?php echo $site->copyright()->kirbytext() ?>
    </div>

    <div class="colophon">
      <i class="fa fa-leaf"></i>
    </div>
  </footer>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<?php echo js(array(
		'assets/js/libs/jPushMenu.js',
		'assets/js/libs/moment.js',
		'assets/js/libs/rome.standalone.js',
		'assets/js/App.js',
		'assets/js/demos/DemoRegister.js',
		'assets/js/demos/DemoSchedule.js',
		'assets/js/demos/DemoLogin.js'
	)) ?>
</body>
</html>