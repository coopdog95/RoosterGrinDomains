<?php

$lastDomain = "";

function main() {

  $response1 = getDomains1();

  $domains = Array();

  for($i = 0; $i<count($response1); $i++) {
    $currentDomain = $response1[$i]["domain"];
    $domains[] = $currentDomain;
  }

  $marker = $domains[count($domains)-1];
  $lastDomain = $marker;
  $response2 = getDomains2($marker);


  for($j = 0; $j<count($response2); $j++) {
    $currentDomain = $response2[$j]["domain"];
    $domains[] = $currentDomain;
  }

  return $domains;

}


function getDomains1() {
  $status = "ACTIVE";
  $limit = '1000';

  $url = "https://api.godaddy.com/v1/domains?statuses=$status&limit=$limit";

  $header = array(
      'Authorization: sso-key e4MzyMPn8fAg_FzDC2wsTtydo2FscwYDXBX:LLsJGWYhAfcVRBqMGvQPbX'
  );

  //open connection
  $ch = curl_init();
  $timeout=60;

  //set the url and other options for curl
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); // Values: GET, POST, PUT, DELETE, PATCH, UPDATE
  //curl_setopt($ch, CURLOPT_POSTFIELDS, $variable);
  //curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

  //execute call and return response data.
  $result = curl_exec($ch);

  //close curl connection
  curl_close($ch);

  // decode the json response
  $dn = json_decode($result, true);

  return $dn;

}

function getDomains2($marker) {
  $status = "ACTIVE";
  $limit = '1000';

  $url = "https://api.godaddy.com/v1/domains?statuses=$status&limit=$limit&marker=$marker";

  $header = array(
      'Authorization: sso-key e4MzyMPn8fAg_FzDC2wsTtydo2FscwYDXBX:LLsJGWYhAfcVRBqMGvQPbX'
  );

  //open connection
  $ch = curl_init();
  $timeout=60;

  //set the url and other options for curl
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); // Values: GET, POST, PUT, DELETE, PATCH, UPDATE
  //curl_setopt($ch, CURLOPT_POSTFIELDS, $variable);
  //curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

  //execute call and return response data.
  $result = curl_exec($ch);

  //close curl connection
  curl_close($ch);

  // decode the json response
  $dn = json_decode($result, true);

  return $dn;

}





?>
