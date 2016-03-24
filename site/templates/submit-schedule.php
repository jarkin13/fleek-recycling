<?php
$username = $_POST['username'];
$id = $_POST['id'];
$date = $_POST['date'];
$doorman = $_POST['doorman'];
$timefrom = $_POST['timefrom'];
$timeto = $_POST['timeto'];
$allday = $_POST['allday'];
$notes = $_POST['notes'];
$slug = $_POST['slug'];
$dateFolder = $site->page('schedules/'. $slug);

$response = array(
	'error' => false,
	'message' => '',
	'newdateError' => false,
	'newdateMessage' => ''
);

if( empty($dateFolder) ) {
	try {
		$newDate = page('schedules')->children()->create($slug, 'default', array(
			'title' => $date
		));
		$response['newdateMessage'] = 'Date has been created';
	} catch(Exception $e) {
		$response['newdateError'] = true;
	  $response['newdateMessage'] = $e->getMessage();
	}
}

$user = $site->users()->findBy('username', $username);
try {
	$newPickup = page('schedules/'. $slug)->children()->create($username, 'pickup', array(
		'title' => 'Pickup for ' . $user->firstName() . ' ' . $user->lastName(),
		'user' => $username,
		'ID' => $id,
		'date' => $date,
		'doorman' => $doorman,
		'time' => $timefrom,
		'time2' => $timeto,
		'contact' => $contact,
		'allday' => $allday,
		'notes' => $notes
	));
	$response['message'] = 'Pick Up has been scheduled. Please wait for a email or text from us confirming your pickup.';
} catch(Exception $e) {
	$response['error'] = true;
	$response['message'] = 'You have a scheduled pickup during this time. If you would like to update your pickup request, please email us at <a href="mailto:schedule@fleekrecycling.com" class="email-address">schedule@fleekrecycling.com</a>';
}

$response = json_encode($response);
echo $response;
