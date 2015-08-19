<?php $user = $site->user() ?>
<div class="login-action">
  <?php if( $user ) : ?>
    <a href="<?php echo url('/submit/logout') ?>" class="nav-link">Logout</a>
  <?php else : ?>
    <a href="login" class="nav-link">Login</a>
  <?php endif ?>
</div>
<nav class="navmenu cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
  <div class="navhead cf">
    <a href="<?php echo url('/schedules') ?>" class="btn btn-default no-radius">Get Started</a>
    <button class="close-btn">x</button>
  </div>
  <a href="<?php echo url() ?>">Home</a>
  <a href="<?php echo url('/about') ?>">About</a>
  <a href="<?php echo url('/schedules') ?>">Schedule</a>
    <?php if( $user ) : ?>
      <a href="<?php echo url('/submit/logout') ?>" class="nav-link">Logout</a>
    <?php else : ?>
      <a href="login" class="nav-link">Login</a>
      <button class="nav-link nav-link-btn" id="register-nav-link">Register</button>
    <?php endif ?>
  </ul>
</nav>