<?php
session_start();
require '../vendor/autoload.php';
  $secrets = json_decode(file_get_contents("credentials.json"), true);

  // init configuration
  $clientID = $secrets["web"]["client_id"];
  $clientSecret = $secrets["web"]["client_secret"];
  $redirectUri = 'http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/sheets.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
$client->addScope(Google_Service_Drive::DRIVE);
$client->addScope(Google_Service_Drive::DRIVE_FILE);

  $token = $client->fetchAccessTokenWithAuthCode($_SESSION['code']);
  //$client->setAccessToken($token['access_token']);


  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();

	$service = new Google_Service_Sheets($client);

 	$spreadsheetId = $_GET["id"];
	$get_range = "A1:C13";
       
	$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
	$values = $response->getValues();
    echo json_encode($response);

?>