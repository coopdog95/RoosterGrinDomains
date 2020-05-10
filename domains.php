<?php


function main() {

  $response = getDomains();
  $domains = Array();
  for($i = 0; $i<count($response); $i++) {
    $currentDomain = $response[$i]["domain"];
    $domains .= $currentDomain;
  }

  echo '<pre>';
  print_r($domains);
  echo '</pre>';

  return $domains;

}


function getDomains() {
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

  // echo '<pre>';
  // print_r($dn);
  // echo '</pre>';

  return $dn;

}




?>
