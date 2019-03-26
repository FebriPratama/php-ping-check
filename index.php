<?php

	$ips =  [
				[ 'ip' => '127.0.0.1', 'name' => 'Local1', 'status' => true ],
				[ 'ip' => '127.0.0.1', 'name' => 'Local2', 'status' => true ],
				[ 'ip' => '122.0.0.2', 'name' => 'Local2', 'status' => true ],
				[ 'ip' => '127.0.0.1', 'name' => 'Local2', 'status' => true ]
			];	
			
	while (true) {
		echo "================================================= \r\n";
		echo "================================================= \r\n";
		echo "================================================= \r\n";
		echo "Running at ".date('Y-m-d H:m:s')."\r\n";
		echo "\tIp\t\tName\tStatus\r\n";
		foreach($ips as $ip){
			$output = [];
			$string = '';	
			exec("ping -n 3 ".$ip['ip'], $output, $status);
			foreach($output as $o){
				//echo $o."\r\n";
				$string = $string.$o;
			}

			if(strpos($string,'Request timed out.') == true){
				$ip['status'] = false;
			}

			$status = $ip['status'] ? 'Ok' : 'Mati';
			echo "\t".$ip['ip']."\t".$ip['name']."\t".$status."\r\n";

		}
		sleep(20);	
	}

?>