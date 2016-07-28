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

/**
 * fetch & return a Members object based on email
 * 
 * @global resource $db			: global Databoss handle
 * @param string $email			: the email address
 * @return object				: a Members object or null
 */	
public static function fetchByEmail($email=null) {
	global $db;
	if (! $email) return null;
	return $db->fetchObject("
		SELECT * FROM sds.members m
		WHERE m.email LIKE '$email'
		LIMIT 1
		","Members");
	}

/**
 * return the full name as: [Mr/Ms] First Last
 * 
 * @return string				: the member full name
 */
public function fullname() {
	global $db,$SDS;
	$parts = array();
	if ($this->salutation) $parts[] = $this->salutation;
	if ($this->firstname) $parts[] = $this->firstname;
	if ($this->lastname) $parts[] = $this->lastname;
	return join(' ',$parts);
	}

/**
 * compare supplied password to member password
 * 
 * @param string $password		: supplied password
 * @return boolean				: true or false
 */
public function verifyPassword($password) {
	if (substr($this->password,0,2) == '$2')	// encrypted
		return password_verify($password,$this->password);
	else										// plain
		return ($this->password == $password) ? true : false;
	}

/**
 * load array of dogs for this member & return ref.
 * 
 * @global resource $db			: global Databoss handle
 * @global object $SDS			: global application specs
 * @return ref					: ref. to the array of dogs or null
 */
public function &getDogs() {
	global $db,$SDS;
	$this->dogs = $db->fetchObjects("
		SELECT * FROM sds.dogs
		WHERE member = $this->member
		ORDER BY callname ASC
		","Dogs");
	return $this->dogs;
	}

/**
 * return a string with html for table of member dogs
 * 
 * @global resource $db			: global Databoss handle
 * @global object $SDS			: global application specs
 * @return string				: table of dogs
 */
public function listDogs() {
	global $db,$SDS;
	$result = "<table id='memberDogs' width='100%'>" .
			  "<tr>" .
			  "<th>Status</th><th>Name</th><th>Full name</th><th>Breed</th>" .
			  "</tr>\n";
	foreach ($this->dogs as $dog) {
		$result .= "<tr>" .
				   "<td>{$dog->status}</td>" .
				   "<td>{$dog->callname}</td>" .
				   "<td>{$dog->regname}</td>" .
				   "<td>{$dog->breed}</td>" .
				   "</tr>\n";
		}
	$result .= "<tr>" .
			   "<td></td><td></td><td></td><td></td>" .
			   "</tr>\n";
	$result .= "</table>\n";
	return $result;
	}

}
?>