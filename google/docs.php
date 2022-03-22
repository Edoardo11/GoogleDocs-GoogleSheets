<?php

curl \
    'https://www.googleapis.com/drive/v3/files?pageSize=1000&q=mimeType%3D%27application%2Fvnd.google-apps.document%27%20and%20trashed%3Dfalse' \
    --header 'Authorization: Bearer [YOUR_ACCESS_TOKEN]' \
    --header 'Accept: application/json' \
    --compressed


    
// https://stackoverflow.com/questions/65841191/google-docs-api-get-all-the-document
?>