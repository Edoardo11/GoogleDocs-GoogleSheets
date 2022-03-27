<?php
session_start();

require '../vendor/autoload.php';

  $secrets = json_decode(file_get_contents("credentials.json"), true);

  // init configuration
  $clientID = $secrets["web"]["client_id"];
  $clientSecret = $secrets["web"]["client_secret"];
  $redirectUri = 'http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/clienttest.php';

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
        	$authUrl = $client->createAuthUrl();
            header("location: ".$authUrl);
        }
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        $_SESSION["credentialsPath"]=json_encode($client->getAccessToken());
    }

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path)
{
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
        $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
}

  $service = new Google_Service_Docs($client);

  // Prints the title of the requested doc:
  // https://docs.google.com/document/d/195j9eDD3ccgjQRttHhJPymLJUCOUjs-jmwTrekvdjFE/edit
  $documentId = '195j9eDD3ccgjQRttHhJPymLJUCOUjs-jmwTrekvdjFE';
  $doc = $service->documents->get($documentId);

  printf("The document title is: %s\n", $doc->getTitle());

?>