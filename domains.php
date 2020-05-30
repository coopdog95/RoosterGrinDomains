<?php


function main() {

  $response = getDomains(NULL);
  $numberOfAPICalls = 1;
  $domains = Array();

  for($i = 0; $i<count($response); $i++) {
    $currentDomain = $response[$i]["domain"];
    $domains[] = $currentDomain;
  }

  while(count($domains) == ($numberOfAPICalls*1000)) {
    $index = (($numberOfAPICalls*1000)-1);
    $marker = $domains[$index];
    $res = getDomains($marker);
    $numberOfAPICalls++;

    for($j = 0; $j<count($res); $j++) {
      $currentDomain = $res[$j]["domain"];
      $domains[] = $currentDomain;
    }
  }

  // $marker = $domains[count($domains)-1];
  // $response2 = getDomains2($marker);
  //
  //
  // for($j = 0; $j<count($response2); $j++) {
  //   $currentDomain = $response2[$j]["domain"];
  //   $domains[] = $currentDomain;
  // }

  return $domains;

  //



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

function getDomains($marker) {
  $status = "ACTIVE";
  $limit = '1000';

  $url = "";

  if(isset($marker)) {
    $url = "https://api.godaddy.com/v1/domains?statuses=$status&limit=$limit&marker=$marker";
  } else {
    $url = "https://api.godaddy.com/v1/domains?statuses=$status&limit=$limit";
  }


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

function getMarker($domains) {
  return $domains[count($domains)-1];
}





?>
