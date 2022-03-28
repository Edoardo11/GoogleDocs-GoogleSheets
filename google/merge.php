<?php
header("Access-Control-Allow-Origin: *"); 
session_start();

require 'clienting.php';

$service = new Google_Service_Drive($client);
  // Get the API client and construct the service object.

    // Print the names and IDs for up to 5 files.
    $optParams = array(
      'pageSize' => 5,
      'q' => "mimeType = 'application/vnd.google-apps.document'",
      'fields' => 'nextPageToken, files(id, name)',
      'orderBy' => 'modifiedByMeTime desc'
    );
    $results = $service->files->listFiles($optParams);

$response;
$response["result"]=true;
$response["error"]="";

if(!isset($_GET["sheetID"])){
  $response["result"]=false;
  $response["error"]="Sheet ID missing";
  echo json_encode($response);
  exit();
}
if(!isset($_GET["docID"])){
  $response["result"]=false;
  $response["error"]="Doc ID missing";
  echo json_encode($response);
  exit();
}

try{
	$services = new Google_Service_Sheets($client);

 	$spreadsheetId = $_GET["sheetID"]; //It is present in your URL
	$get_range = "ToMerge";
       
	$resp = $services->spreadsheets_values->get($spreadsheetId, $get_range);
	$response["sheetdata"] = $resp->getValues();

	echo json_encode($response);
} catch (Exception $e) {
	$response;
	$response["result"]=false;
	$response["error"]="Sheet not complying with the standard";
    echo json_encode($response);
    exit();
}
try{
	$serviced = new Google_Service_Documents($client);

 	$documentId = $_GET["docID"]; //It is present in your URL
       //https://developers.google.com/docs/api/reference/rest/v1/documents/request#replacealltextrequest
	$resp = $serviced->document_values->get($documentId);
	$response["docdata"] = $resp;

echo json_encode($response);
} catch (Exception $e) {
	$response;
	$response["result"]=false;
	$response["error"]="Invalid doc";
    echo json_encode($response);
    exit();
}

?>