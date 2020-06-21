#!/usr/bin/php

<?php
	$port 	= 8080;
	$host 	= 'localhost';
	$wsdl 	= 'http://' . $host . ':' . $port . '?wsdl';
	#-------------------------------------------------------------------
	$soap = new SoapClient( $wsdl );
	while(FALSE !== ($line = fgets(STDIN))){
		$res  = $soap->simpleService($line);
	}
?>
