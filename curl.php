<?php

$ch = curl_init();

curl_setopt_array(
    $ch, array( 
    CURLOPT_URL => "https://www.yahoo.com",
     CURLOPT_RETURNTRANSFER =>true,         // return web page 
	 CURLOPT_COOKIESESSION=>true,
	 CURLOPT_FORBID_REUSE=>true,
        CURLOPT_HEADER         => true,        // don't return headers 
        CURLOPT_FOLLOWLOCATION => true,         // follow redirects 
        CURLOPT_ENCODING       => "",           // handle all encodings 
       
        CURLOPT_AUTOREFERER    => false,         // set referer on redirect 
        CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect 
        CURLOPT_TIMEOUT        => 120,          // timeout on response 
        CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects 
        CURLOPT_POST            => 0,            // i am sending post data 
             // this are my post vars 
        CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl 
        CURLOPT_SSL_VERIFYPEER => false,        // 
        CURLOPT_VERBOSE        => 0        
));
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD'); // HTTP request is 'HEAD'
// execute
$output = curl_exec($ch);
echo $output;
echo curl_error($ch);

// free
curl_close($ch);
exit();
?>