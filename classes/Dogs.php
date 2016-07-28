<?php
/**
 * Sniffing Dog Sports - Dogs class
 * June 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */

class Dogs extends Container {

	public $database	= "sds";
	public $table		= "dogs";


/**
 * return a cluster of Dogs objects for one member
 * 
 * @param int $member			: member id
 * @return array				: returns array or null
 */
public static function getMemberDogs($member) {
	global $db,$SDS;
	return $db->fetchObjects("
		SELECT * FROM sds.dogs
		WHERE member = $member
		ORDER BY callname ASC
		","Dogs");
	}

}
?>