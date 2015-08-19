<?php
$username = $_POST['username'];
$password = $_POST['password'];

$response = array(
	'error' => false,
	'message' => ''
);

if( $username && $password ) {
	$user = $site->user($username);
	if( $user and $user->login($password) ) {
		$response['message'] = 'You are now logged in to schedule a pickup.';
	} else {
		$response['error'] = true;
		$response['loginmessage'] = 'The username or password you have entered is incorrect.';
		$response['message'] = 'You were not successfully logged in - <a href="/login">Login now</a>';
	}
}

$response = json_encode($response);
echo $response;