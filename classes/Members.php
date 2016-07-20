<?php
/**
 * Sniffing Dog Sports - Members class
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */

class Members extends Container {

	public $database	= "sds";
	public $table		= "members";

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