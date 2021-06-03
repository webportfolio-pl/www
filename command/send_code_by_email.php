<?php
header('Content-Type: application/json');
require("apifunc.php");

$html = '';

try {

    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'request.php',

    ], function () {

        if (empty($_POST["email"])) {
            throw new Exception("EMAIL is empty");
        }

        global $html;
//            $html = "Code is VALID";
        $html = "Check Code is EMAIL Message, 10 Charts with numbers";
    });

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    $html = $e->getMessage();
}

echo $html;
//echo def_json("", whois_data($_GET));
