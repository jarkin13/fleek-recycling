<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/
//c::set('url', 'http://localhost:8888/fleek-recycling');
//c::set('subfolder', 'fleek-recycling');
c::set('license', 'K2-PERSONAL-ed0933eebfe46aee1cd35afdbe42c880');
c::set('roles', array(
	array(
    'id'      => 'admin',
    'name'    => 'Admin',
    'default' => true,
    'panel'   => true
  ),
  array(
    'id'      => 'editor',
    'name'    => 'Editor',
    'panel'   => true
  ),
	array(
		'id' => 'user',
		'name' => 'User',
		'panel' => false
	)
));

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/