<?php
    // VERIFICATION STEPS
    // file_put_contents( 'verify.log', print_r( $_GET, true ), FILE_APPEND );
    // echo $_GET['hub_challenge'];
    // die();

    // TESTING OF THE WEBHOOKS
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    file_put_contents( 'data.log', print_r( $data, true ), FILE_APPEND );

    $newdata = file_get_contents('data.log');
    var_dump($data);
    var_dump($newdata);
    die();

    $pageID = "100924122885991";
    $apiVersion = "v15.0";
    $recipientID = "6407845042576306";
    $acces_token = "EAAM70lGyuVABACZCWzZBLZCYNAWk27u8hyZBYGKGQPift2U6tDMtVepX01VdV90GHieIGEzame9ZBUC6uMzaWMauhH5qScYZAjBC9EBLz7VlER6Y32zpAKX8jo4IrEDPfyqvXS0KEXPPokCsUDvgDalIZB71rblHMQ3xbqyBVnwRZCeQLU7RB8XAwRPZCpW68UqVVicyZC4vEy5QZDZD";

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
            "acces_token" => $acces_token
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

    /* await $.ajax({
        url: 'https://graph.facebook.com/'+ apiVersion + '/' + pageID + "/messages",
        data: {
            recipient: {
                id: to
            },
            message: {
                text: message
            },
            access_token: pageTokentmp,
        },
        type: 'POST',
        success: (data) => {
            getMessageInfo(data.message_id, "creation");
            $("#input_message").val("");
        },
        error: (jqXHR, textStatus, errorThrown) => {
            console.log(textStatus);
        }
    }); */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Instagram Graph API Webhooks</h1>
</body>
</html>