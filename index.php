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