
<?php

try {
    $wsdl_url = 'http://www.webservicex.com/globalweather.asmx?wsdl';
    $client = new SOAPClient($wsdl_url);
    $params = array(
        'CountryName' => "France",
    );
    $return = $client->GetCitiesByCountry($params);
    print_r($return);
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}
?>
