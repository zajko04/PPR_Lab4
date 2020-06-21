<?php
	$stderr = fopen('php://stderr', 'w');
	$qs_master = $_SERVER['QUERY_STRING'];
	fwrite($stderr, "WSDL request \n");
	fwrite($stderr, "query string: '$qs_master' \n");

	if( preg_match( "/^wsdl$/i", $_SERVER['QUERY_STRING'])){
		$wsdl = file_get_contents('example.wsdl');
		if($wsdl)
			echo $wsdl;
	}else{
		class PPRSrv{
			public function simpleService($str){
				if($str == ''){
					$fp = fopen('hex','r+');
					$result = fgets($fp);
					ftruncate($fp,0);
					fclose($fp);
					return $result;
				}
				$result = bin2hex($str);
				$fp = fopen('hex','w');
				fwrite($fp, $result);
				fclose($fp);
				return $result;
			}
		}
		$opt = array('uri' => 'http://localhost/soap_prowadzacy_soap/php/bin/proces2.php');
		$srv = new SoapServer(NULL, $opt);
		$srv->setClass('PPRSrv');
		$srv->handle();
	}
?>
