<?php
session_start();

require 'clienting.php';

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

$response;
$response["files"]=[];

    foreach ($results->getFiles() as $file) {
        $f["name"]=$file->getName();
        $f["id"]=$file->getId();
        array_push($response["files"],$f);
    }
    
$response["result"]=true;
$response["error"]="";

   echo json_encode($response);

/*
	$service = new Google_Service_Sheets($client);

 	$spreadsheetId = $files[0]["id"]; //It is present in your URL
	$get_range = "A1:C13";
       
	$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
	$values = $response->getValues();
    echo json_encode($response);
    */
?>