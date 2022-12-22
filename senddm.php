<?php
    $pageID = "100924122885991";
    $apiVersion = "v15.0";
    $recipientID = "6407845042576306";
    $access_token = $_GET["access_token"];

    $params = array(
        "endpoint_url" => "https://graph.facebook.com/". $apiVersion . "/" . $pageID . "/messages",
        "type" => "POST",
        "url_params" => array(
            "recipient" => array(
                "id" => $recipientID
            ),
            "message" => array(
                "text" => "Réponse automatique du webhook"
            ),
            "access_token" => $access_token
        )
    );

    $responseInfo = makeApiCall($params);

    echo '<pre>';
    print_r($responseInfo);

    function makeApiCall($params) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $parmas["url_params"]));

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_URL, $params["endpoint_url"]);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);

        curl_close($ch);

        $responseArray = json_decode( $response, true);

        return;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>