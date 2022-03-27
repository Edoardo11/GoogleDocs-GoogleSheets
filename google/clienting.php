<?php

session_start();

require '../vendor/autoload.php';

  $secrets = json_decode(file_get_contents("credentials.json"), true);

  // init configuration
  $clientID = $secrets["web"]["client_id"];
  $clientSecret = $secrets["web"]["client_secret"];
  $redirectUri = 'http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/clienting.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
  $client->addScope(Google_Service_Drive::DRIVE);
  $client->addScope(Google_Service_Drive::DRIVE_FILE);

    if (isset($_SESSION["credentialsPath"])) {
        $accessToken = json_decode($_SESSION["credentialsPath"], true);
    } else {
        // Request authorization from the user.
        
        if(isset($_GET["code"])){
          $authCode = trim($_GET["code"]);
          // Exchange authorization code for an access token.
          $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

          $_SESSION["credentialsPath"] = json_encode($accessToken);
        } else {
        	echo "noAuth";
        }
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        $_SESSION["credentialsPath"]=json_encode($client->getAccessToken());
    }

?>