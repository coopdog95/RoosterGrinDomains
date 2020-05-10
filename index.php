<?php

include_once('domains.php');

$domains = main();
$response = getDomains();

?>

<html lang="en" dir="ltr">
  <head>
    <title>Domains | Rooster Grin</title>
    <meta charset="utf-8">
    <style><?php include 'styles.css'; ?></style>
    <!-- <link rel="stylesheet" href="./styles.css"> -->
    <link rel="shortcut icon" href="https://www.roostergrin.com/wp-content/themes/cockerel_s-child/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- <pre><?php //print_r($response); ?></pre> -->
    <div class="heading">
      <h1>Domains</h1>
      <h3><?php echo count($domains); ?> domains available!</h3>
    </div>
    <div class="search-container">
      <!-- Search form -->
      <form class="form-inline d-flex justify-content-center md-form form-sm active-pink darken-4 active-pink-2 darken-4 mt-2">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
          aria-label="Search">
      </form>

    </div>

    <div class="container domains-container">
      <div class="row">
        <div class="col-12">

          <?php foreach ($domains as $key => $domain) { ?>
            <div class="domain-container">
              <h3><?php echo $domain; ?></h3>
            </div>
            <hr>
          <?php } ?>

        </div>
      </div>
    </div>


  </body>
</html>
