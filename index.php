<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();

// Define a HTTP POST route:
$app->post('/callback', function() use($app) {

  $req = $app->request();
  $req->post();
  $log = $app->getLog();

  // make a buffer to avoid dumping to the screen:
  ob_start();

    // print_r($app->request());
    print_r($req->post());
    $my_string = ob_get_contents();

  // end our buffer so it's in a string for us to use
  ob_end_clean();

  $log->info($my_string);

});

// Run the Slim application:
$app->run();

?>