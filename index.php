<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

// Define a HTTP GET route:
$app->get('/', function() use($app) {

    // echo var_dump($app);

});

$app->get('/hello/:name', function ($name) {

  echo "Hello, $name";

});

// Define a HTTP POST route:
$app->post('/callback', function() use($app) {
  $req = $app->request();
  $req->post();
  $log = $app->getLog();

  // make a buffer to avoid dumping to the screen:
  ob_start();
    print_r($app->request());
    $my_string = ob_get_contents();
  // end our buffer so it's in a string for us to use
  ob_end_clean();

  $log->info($my_string);

  // $out = fopen('logger.txt', 'a');
  // $stdoutLogWriter = new \Slim\LogWriter($out);
  // $stdout_log = new \Slim\Log($stdoutLogWriter);
  // $stdout_log->info(json_encode(print_r($req)));



});

// Run the Slim application:
$app->run();


?>