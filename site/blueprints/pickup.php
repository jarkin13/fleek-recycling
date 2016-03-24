<?php if(!defined('KIRBY')) exit ?>

title: Pickup
pages: false
fields:
	title:
		label: Pickup
		type: text
	id:
		label: ID
		type: text
		readonly: true
		width: 1/2
	user:
		label: User
		type: user
		readonly: true
		width: 1/2
	date:
		label: Date
		type: date
		format: YYYY-MM-DD
	time:
		label: Time From
		type: time
		width: 1/2
	time2:
		label: Time To
		type: time
		width: 1/2
	doorman: 
		label: Doorman
		type: checkbox
		options:
			true: Yes
		width: 1/2
	allday:
		label: All Day
		type: checkbox
		options:
			true: Yes
		width: 1/2
	contact:
		label: Preferred Way of Contact
		type: radio
		options:
			email: Email Me
			text: Text Me
	notes:
		label: Notes
		type: textarea
