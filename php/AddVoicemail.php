<?php
/**
 * @file        AddUserGroup.php
 * @brief       
 * @copyright   Copyright (c) 2018 GOautodial Inc.
 * @author     Demian Lizandro A, Biscocho
 * @author      Alexander Jim H. Abenoja
 * @author     Jerico James F. Milo
 *
 * @par <b>License</b>:
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
require_once('APIHandler.php');
$api = \creamy\APIHandler::getInstance();

/*
	$url = gourl."/goVoicemails/goAPI.php"; # URL to GoAutoDial API file
	$postfields["goUser"] 			= goUser; #Username goes here. (required)
	$postfields["goPass"] 			= goPass; #Password goes here. (required)
	$postfields["goAction"] 		= "goAddVoicemail"; #action performed by the [[API:Functions]]
	$postfields["responsetype"] 	= responsetype; #json (required)
	$postfields["hostname"] 		= $_SERVER['REMOTE_ADDR']; #Default value
	
	$postfields["voicemail_id"] 	= $_POST['voicemail_id']; 
	$postfields["pass"] 			= $_POST['password']; 
	$postfields["fullname"] 		= $_POST['name'];
	$postfields["email"] 			= $_POST['email']; 
	$postfields["user_group"] 		= $_POST['user_group']; 
	$postfields["active"] 			= $_POST['active'];
	
	$postfields["log_user"]			= $_POST['log_user'];
	$postfields["log_group"]		= $_POST['log_group'];
*/

	$postfields = array(
		'goAction' => 'goAddVoicemail',
		'voicemail_id' => $_POST['voicemail_id'], 
		'pass' => $_POST['password'], 
		'fullname' => $_POST['name'],
		'email' => $_POST['email'], 
		'user_group' => $_POST['user_group'], 
		'active' => $_POST['active']
	);

   $output = $api->API_addVoicemail($postfields);
	
	if ($output->result=="success") {
		$status = 1;
		//$return['msg'] = "New User has been successfully saved.";
	} else {
		//$status = 0;
		// $return['msg'] = "Something went wrong please see input data on form.";
        $status = $output->result;
	}

	echo $status;

?>