<?php
session_start();

require '../vendor/autoload.php';

  $secrets = json_decode(file_get_contents("credentials.json"), true);

  // init configuration
  $clientID = $secrets["web"]["client_id"];
  $clientSecret = $secrets["web"]["client_secret"];
  $redirectUri = 'http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/test.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
$client->addScope(Google_Service_Drive::DRIVE);
$client->addScope(Google_Service_Drive::DRIVE_FILE);

// authenticate code from Google OAuth Flow
if(isset($_REQUEST['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_REQUEST['code']);
  $_SESSION['code']=$_REQUEST['code'];
  //$client->setAccessToken($token['access_token']);
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  //$_SESSION['Gauth']['email'] = $google_account_info->email;
  
  $service = new Google_Service_Drive($client);
  // Get the API client and construct the service object.

    // Print the names and IDs for up to 5 files.
    $optParams = array(
      'pageSize' => 5,
      'q' => "mimeType = 'application/vnd.google-apps.spreadsheet'",
      'fields' => 'nextPageToken, files(id, name)',
      'orderBy' => 'modifiedByMeTime desc'
    );
    $results = $service->files->listFiles($optParams);
	
    var_dump($results);

$files=$results->getFiles();

	$service = new Google_Service_Sheets($client);

 	$spreadsheetId = $files[0]["id"]; //It is present in your URL
	$get_range = "A1:C13";
       
	$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
	$values = $response->getValues();
    echo json_encode($response);
    
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  $authurl=$client->createAuthUrl();
}
?>

<?php if(isset($authurl)){ ?>
<a href="<?php echo $authurl ?>">Demo</a>
<?php } ?>