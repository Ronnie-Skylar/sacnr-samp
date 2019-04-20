<?php

	require 'SACNRsamp.php';

	$TFA_SAMP = null;

	if(!isset($_GET['command']))
		die('{"success":"false", "message":"Command not GET!"}');

	switch($_GET['command']){
			case 'getInfoByID':{
			try{


				if(!isset($_GET['id']))
					die('{"success":"false", "message":"Server ID not GET!"}');

				$SACNR_SAMP = SACNRsamp::getInfoByID($_GET['id']);

				if($SACNR_SAMP){
					echo $SACNR_SAMP;
				}
			}
			catch(Exception $connectError){
				echo $connectError->getMessage();
				exit;
			}
			break;
		}
		case 'getPlayersByID':{
			try{

				if(!isset($_GET['id']))
					die('{"success":"false", "message":"Server ID not GET!"}');

				$SACNR_SAMP = SACNRsamp::getPlayersByID($_GET['id']);

				if($SACNR_SAMP){
					echo $SACNR_SAMP;
				}
			}
			catch(Exception $connectError){
				echo $connectError->getMessage();
				exit;
			}
			break;
		}
		case 'getQueryByID':{
			try{

				if(!isset($_GET['id']))
					die('{"success":"false", "message":"Server ID not GET!"}');

				$SACNR_SAMP = SACNRsamp::getQueryByID($_GET['id']);

				if($SACNR_SAMP){
					echo $SACNR_SAMP;
				}
			}
			catch(Exception $connectError){
				echo $connectError->getMessage();
				exit;
			}
			break;
		}
		case 'getInfoByIP':{
			try{

				if(!isset($_GET['ip']))
					die('{"success":"false", "message":"Server ID not GET!"}');
				if(!isset($_GET['port']))
					die('{"success":"false", "message":"Server port not GET!"}');

				$SACNR_SAMP = SACNRsamp::getInfoByIP($_GET['ip'], $_GET['port']);

				if($SACNR_SAMP){
					echo $SACNR_SAMP;
				}
			}
			catch(Exception $connectError){
				echo $connectError->getMessage();
				exit;
			}
			break;
		}

		case 'getPlayersByIP':{
			try{

				if(!isset($_GET['ip']))
					die('{"success":"false", "message":"Server ID not GET!"}');
				if(!isset($_GET['port']))
					die('{"success":"false", "message":"Server port not GET!"}');

				$SACNR_SAMP = SACNRsamp::getPlayersByIP($_GET['ip'], $_GET['port']);

				if($SACNR_SAMP){
					echo $SACNR_SAMP;
				}
			}
			catch(Exception $connectError){
				echo $connectError->getMessage();
				exit;
			}
			break;
		}

		case 'getQueryByIP':{
			try{

				if(!isset($_GET['ip']))
					die('{"success":"false", "message":"Server ID not GET!"}');
				if(!isset($_GET['port']))
					die('{"success":"false", "message":"Server port not GET!"}');

				$SACNR_SAMP = SACNRsamp::getQueryByIP($_GET['ip'], $_GET['port']);

				if($SACNR_SAMP){
					echo $SACNR_SAMP;
				}
			}
			catch(Exception $connectError){
				echo $connectError->getMessage();
				exit;
			}
			break;
		}

	}
?>