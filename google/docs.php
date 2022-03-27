<?php
session_start();
require '../vendor/autoload.php';

    $client = new \Google_Client();
    $client->setApplicationName('Google Docs');
    $client->setScopes(Google_Service_Docs::DOCUMENTS);
    $client->setAuthConfig('../credentials.json');
    $client->setAccessType('offline');
	$service = new Google_Service_Docs($client);

 	$documentId  = "11J1j3Md_blmNHXpQnTrtCmiX6_KiX9IqHVg6vxBpiao"; //It is present in your URL
       
	$response = $service->documents->get($documentId);
    
    $xml = file_get_contents("https://docs.googleapis.com/v1/documents/".$documentId."?suggestionsViewMode=DEFAULT_FOR_CURRENT_ACCESS&key=".$_SESSION["token"]);
    echo json_encode($xml);
?>