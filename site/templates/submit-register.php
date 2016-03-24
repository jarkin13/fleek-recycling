<?php
$newuser = array(
	'username' => $_POST['username'],
	'role' => 'user',
	'email' => $_POST['email'],
	'password' => $_POST['password'],
	'firstName' => $_POST['first'],
	'lastName' => $_POST['last'],
	'address' => $_POST['address'],
	'apartment' => $_POST['apartment'],
	'city' => $_POST['city'],
	'state' => $_POST['state'],
	'zip' => $_POST['zip'],
	'tel' => $_POST['phone'],
	'contact' => $_POST['contact']
);

$emailTaken = $site->users()->findBy('email', $_POST['email']);
$userTaken = $site->users()->findBy('username', $_POST['username']);

$response = array(
	'error' => false,
	'message' => ''
); 

if( !empty($emailTaken) ) {
	$response['error'] = true;
	$response['message'] = 'This email is already registered';
} 

if( !empty($userTaken) ) {
	$response['error'] = true;
	$response['message'] = 'This username is already is use';
}

if( !empty($emailTaken) && !empty($userTaken) ) {
	$response['message'] = 'The email and username are already registered';
}

if( !$response['error'] ) {
	try {
		$user = $site->users()->create($newuser);
		$response['message'] = 'You have registered successfully!';
	} catch(Exception $e) {
		$response['error'] = true;
		$response['message'] = 'The user could not be created';
	}
} 

$response = json_encode($response);
echo $response;


