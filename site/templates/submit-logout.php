<?php

if($user = $site->user()) {
	$user->logout();
};

go('/');



