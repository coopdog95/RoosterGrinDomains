<?php

include_once('domains.php');

$domains = main();
$lastDomain = $domains[999];
$response1 = getDomains1();
$response2 = getDomains2($lastDomain);

?>

<html lang="en" dir="ltr">
  <head>
    <title>Domains | Rooster Grin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <style><?php include 'styles.css'; ?></style>
    <!-- <link rel="stylesheet" href="./styles.css"> -->
    <link rel="shortcut icon" href="https://www.roostergrin.com/wp-content/themes/cockerel_s-child/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="main">
      <!-- <pre><?php //print_r($response);?></pre> -->
      <div class="heading container">
        <div class="heading-logo"></div>
        <h1>Rooster Grin Domains</h1>
        <h3><?php echo count($domains);?> domains available!</h3>
      </div>
      <div class="search-container container">
        <!-- Search form -->
          <input class="search-bar" id="searchy" type="text" placeholder="Search..." aria-label="Search">
      </div>

      <div class="domains-container container">
        <div class="row">
          <div class="col-12">
            <div class="numberOfResults"></div>
            <div class="matchingDomains"></div>
            <div class="originalDomains">
              <?php foreach ($domains as $key => $domain) { ?>
                <div class="domain-container">
                  <h3><?php
                  if (strlen($domain) >= 23) {
                      echo '<span class="long-url">' . $domain . '</span>';
                  } else {
                      echo $domain;
                  }
                  ?></h3>
                  <a href="#" class="contact-btn">Contact Us!</a>
                </div>
                <hr>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>


    <script type="text/javascript">
      const response1 = <?php echo json_encode($response1); ?>;
      const response2 = <?php echo json_encode($response2); ?>;
    </script>
    <script type="text/javascript">

      const lastDomain = <?php echo $lastDomain; ?>;
      console.log('Last domain: ' + lastDomain);

    </script>
    <script src="searchScript.js" type="text/javascript"></script>
    </div>
  </body>
</html>
