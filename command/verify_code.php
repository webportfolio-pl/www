<?php
header('Content-Type: application/json');
require("apifunc.php");

$html = '';

if (empty($_POST["domains"])) {
    $_POST["domains"] = "softreck.pl
softreck.com";
}
$message = '';
$status = '1';

try {

    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'https://php.eachfunc.com/each_func.php',
        'https://domain.phpfunc.com/get_domain_by_url.php',
        'https://domain.phpfunc.com/clean_url.php',
        'https://domain.phpfunc.com/clean_url_multiline.php',
        'request.php',
    ], function () {

        // Clean URL
        $domains = clean_url_multiline($_POST["domains"]);

        if (empty($domains)) {
            throw new Exception("domain list is empty");
        }

        $domain_list = array_values(array_filter(explode(PHP_EOL, $domains)));

//        var_dump($domain_list);
//        die;
        if (empty($domain_list)) {
            throw new Exception("domain list is empty");
        }


        if (empty($_POST["email"])) {
            throw new Exception("EMAIL is empty");
        }

        global $html;


        if (empty($_POST["code"])) {
            throw new Exception("CODE is empty");
        } else {
            $html = "Verificated OK";
        }
//            $html = "Not";

        $html = implode("<br>", $domain_nameserver_list);
    });

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    $message = $e->getMessage();
    $status = '0';
}

echo $html;
echo def_json("", request($_POST, $html, $message, $status));
