<?php
session_start();

require '../vendor/autoload.php';

$secrets = json_decode(file_get_contents("secrets.json"), true);

  // init configuration
  $clientID = $secrets["googleapi"]["clientID"];
  $clientSecret = $secrets["googleapi"]["clientSecret"];
  $redirectUri = 'http://localhost/google/oauth.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
  

if(isset($_SESSION['Gauth'])){
	$tempglogin_email=$_SESSION['Gauth']['email'];
    require('rest/tempglogin.php');
    if($tempglogin_check){
    	$_SESSION["username"]=$tempglogin_username;
    	$_SESSION["logged"]=true;
		header("location: http://localhost/google/oauth.php");
    } else {
		header("location: http://localhost/google/oauth.php?le=Gauth error. Please log in using your email and password.");
    }
} else {
// authenticate code from Google OAuth Flow
if(isset($_REQUEST['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_REQUEST['code']);
  $client->setAccessToken($token['access_token']);
  $_SESSION["token"]=$token['access_token'];
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $_SESSION['Gauth']['email'] = $google_account_info->email;
  $_SESSION['Gauth']['familyName'] = $google_account_info->familyName;
  $_SESSION['Gauth']['givenName'] = $google_account_info->givenName;
  $_SESSION['Gauth']['id'] = $google_account_info->id;
  $_SESSION['Gauth']['picture'] = $google_account_info->picture;
  
    $_SESSION["username"]=$tempglogin_username;
    $_SESSION["logged"]=true;
	header("location: http://localhost/google/oauth.php");
} else {
  echo $client->createAuthUrl();
}
}
?>