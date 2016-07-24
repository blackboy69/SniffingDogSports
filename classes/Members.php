<?php
/**
 * Sniffing Dog Sports - Members class
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */

class Members extends Container {

	public $database	= "sds";
	public $table		= "members";

// member types:
	public static $types = array(
		"Member",
		"Judge",
		"Sponsor",
		"Administrator",
		"Special",
		"Developer"
		);

// member statuses:
	public static $statuses = array(
		"Active",
		"inactive",
		"Suspended",
		"Deleted"
		);

// member salutations:
	public static $salutations = array(
		"Mr",
		"Mrs",
		"Ms"
		);

// fetch a Handler record by email address:
	
static public function fetchByEmail($email=null) {
	global $db;
	if (! $email) return null;
	return $db->fetchObject("
		SELECT * FROM sds.members m
		WHERE m.email LIKE '$email'
		LIMIT 1
		","Members");
	}

// Return full name as: [Mr/Ms] First last

public function fullname() {
	$parts = array();
	if ($this->salutation) $parts[] = $this->salutation;
	if ($this->firstname) $parts[] = $this->firstname;
	if ($this->lastname) $parts[] = $this->lastname;
	return join(' ',$parts);
	}

}
?>