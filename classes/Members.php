<?php
/**
 * Sniffing Dog Sports - Members class
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */

class Members extends Container {

	public	$database	= "sds";
	public	$table		= "members";

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

// member flags/switches:
	public static $flags = array(
		'Renewal Notice Sent'		=> 0x0001,
		'Account Info Sent'			=> 0x0002,
		'Dues 2016-2017'			=> 0x0004
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
 * return a summary list of members
 * note: each row contains these columns
 *	member			: member ID
 *	type			: member type (Member,Administrator,Developer,etc.)
 *	firstname		: member first name
 *	lastname		: member last name
 *	city			: member city
 *	state			: member state
 *	phone			: member home or mobile phone
 *	anniversary		: member join date
 *	
 * @return type
 */
public static function summaryList() {
	global $db;
	return $db->fetchArrays("
		SELECT `member`,`type`,`firstname`,`lastname`,`city`,`state`,
			   `homephone`,`mobilephone`,`anniversary`
		FROM sds.members
		ORDER BY `member` ASC
		");
	}

/**
 * override Container store method to handle timestamp
 * 
 * @return mixed				: key of record or false
 */
public function store() {
	$this->referenced = null;	// force new timestamp
	if (! $this->anniversary) {
		$this->anniversary = Date::today(SHORTDATE);
		$this->renewed = null;
		}
	return parent::store();
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
	return ($this->password == $password) ? true : false;
	}

/**
 * set a flag/switch bit on
 * 
 * @param string $tag			: key of boolean value in array
 */
public function setFlag($tag,$value=1) {
	$bits = self::$flags[$tag];
	$this->flags &= (-1 ^ $bits);
	$this->flags |= ($value * $bits);
	}

/**
 * test if a flag/switch bit is on
 * 
 * @param string $tag			: key of boolean value in array
 * @return boolean				: true or false
 */
public function isFlagSet($tag) {
	return ($this->flags & self::$flags[$tag]) ? true : false;
	}

}
?>