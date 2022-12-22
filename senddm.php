<?php
    $pageID = "100924122885991";
    $apiVersion = "v15.0";
    $recipientID = "6407845042576306";

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
            "access_token" => $acces_token
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