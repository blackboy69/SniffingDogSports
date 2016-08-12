<?php
/**
 * Sniffing Dog Sports - Members class
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */

class Members extends Container {

	const	RenewalNoticeSent		= 0b0000000000000001;
	const	AccountInfoSent			= 0b0000000000000010;
	const	Dues_2016_2017			= 0b0000000000000100;
	
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
 *	lastname		: member last name
 *	firstname		: member first name
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
		SELECT `member`,`type`,`lastname`,`firstname`,`city`,`state`,
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
 * check is Dues paid for 2016-2017
 * 
 * @return boolean				: true or false
 */
public function isDues_2016_2017() {
	return ($this->flags & self::Dues_2016_2017) ? true : false;
	}

/**
 * set the flag for Dues paid for 2016-2017
 */
public function setDues_2016_2017() {
	$this->flags |= self::Dues_2016_2017;
	}

/**
 * check if a Renewal Notice was sent
 * 
 * @return boolean				: true or false
 */
public function isRenewalNoticeSent() {
	return ($this->flags & self::RenewalNoticeSent) ? true : false;
	}

/**
 * set the flag for Renewal Notice Sent
 */
public function setRenewalNoticeSent() {
	$this->flags |= self::RenewalNoticeSent;
	}

/**
 * check if Account Info was Sent
 * 
 * @return boolean				: true or false
 */
public function isAccountInfoSent() {
	return ($this->flags & self::AccountInfoSent) ? true : false;
	}

/**
 * set the flag for Account Info Sent
 */
public function setAccountInfoSent() {
	$this->flags |= self::AccountInfoSent;
	}

}
?>