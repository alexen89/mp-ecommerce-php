<?php

$pageurl = "http://hostname/@api/deki/pages/=TestPage/files/=";
$filename = "test.png";

$theurl = $pageurl . $filename;

$ch = curl_init($theurl);
curl_setopt($ch, CURLOPT_COOKIE, ...); // -b
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); // -X
curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: image/png']); // -H
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0); // -0

...
?>