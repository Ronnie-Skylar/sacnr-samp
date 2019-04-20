<?php  

	require 'Monitor.php';

	class Monitor_ extends SACNR\Monitor{
		public $success;
	}

	class SACNRsamp{
		
		public function getInfoByID($_serverid){

			if(!$_serverid)
				throw new InvalidArgumentException('{"success":"false", "message":"Server ID not passed as argument."}');			
			
			$_sacnr = new Monitor_;

			$result = $_sacnr->get_info_by_id($_serverid);

			if(!$result)
				$result['success'] = 'false';
			else
				$result->success = 'true';

			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
	        	return json_encode($result, JSON_PRETTY_PRINT);
	      	}
	      	return json_encode($result);
		}

		public function getPlayersByID($_serverid){

			if(!$_serverid)
				throw new InvalidArgumentException('{"success":"false", "message":"Server ID not passed as argument."}');			
			
			$_sacnr = new Monitor_;

			$result = $_sacnr->get_players_by_id($_serverid);

			if(!$result)
				$result['success'] = 'false';
			else
				$result['success'] = 'true';

			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
	        	return json_encode($result, JSON_PRETTY_PRINT);
	      	}
	      	return json_encode($result);
		}

		public function getQueryByID($_serverid){

			if(!$_serverid)
				throw new InvalidArgumentException('{"success":"false", "message":"Server ID not passed as argument."}');			
			
			$_sacnr = new SACNR\Monitor;

			$result = $_sacnr->get_query_by_id($_serverid);

			if(!$result)
				$result['success'] = 'false';
			else
				$result['success'] = 'true';
			

			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
	        	return json_encode($result, JSON_PRETTY_PRINT);
	      	}
	      	return json_encode($result);
		}

		public function getInfoByIP($_serverip, $_port){

			if(!$_serverip)
				throw new InvalidArgumentException('{"success":"false", "message":"Server ID not passed as argument."}');
			if(!$_port)
				throw new InvalidArgumentException('{"success":"false", "message":"Server Port not passed as argument."}');			
			
			$_sacnr = new SACNR\Monitor;

			$result = $_sacnr->get_info_by_ip($_serverip, $_port);

			if(!$result)
				$result['success'] = 'false';
			else
				$result->success = 'true';

			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
	        	return json_encode($result, JSON_PRETTY_PRINT);
	      	}
	      	return json_encode($result);
		}

		public function getPlayersByIP($_serverip, $_port){

			if(!$_serverip)
				throw new InvalidArgumentException('{"success":"false", "message":"Server ID not passed as argument."}');
			if(!$_port)
				throw new InvalidArgumentException('{"success":"false", "message":"Server Port not passed as argument."}');			
			
			$_sacnr = new SACNR\Monitor;

			$result = $_sacnr->get_players_by_ip($_serverip, $_port);
			
			if(!$result)
				$result['success'] = 'false';
			else
				$result['success'] = 'true';

			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
	        	return json_encode($result, JSON_PRETTY_PRINT);
	      	}
	      	return json_encode($result);
		}

		public function getQueryByIP($_serverip, $_port){

			if(!$_serverip)
				throw new InvalidArgumentException('{"success":"false", "message":"Server ID not passed as argument."}');
			if(!$_port)
				throw new InvalidArgumentException('{"success":"false", "message":"Server Port not passed as argument."}');			
			
			$_sacnr = new SACNR\Monitor;

			$result = $_sacnr->get_query_by_ip($_serverip, $_port);
			
			if(!$result)
				$result['success'] = 'false';
			else
				$result['success'] = 'true';

			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
	        	return json_encode($result, JSON_PRETTY_PRINT);
	      	}
	      	return json_encode($result);
		}
	}
?>