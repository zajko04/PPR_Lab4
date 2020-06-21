use SOAP::Lite;
$| = 1;

my $soap = SOAP::Lite->new(
	uri 	=> 'http://localhost/',
	proxy   => 'http://localhost/soap_prowadzacy_soap/php/bin/'
);
my $service = $soap->service('http://localhost:8080?wsdl');
while(1){
	my $result = $service->simpleService('');
	if($result != "error"){
		print $result."\n";
	}
}
