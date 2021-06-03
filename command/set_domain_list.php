<?php
header('Content-Type: application/json');
require("apifunc.php");

if (empty($_POST["domains"])) {
    $_POST["domains"] = "softreck.pl
softreck.com";
}
$html = '';
$domain_nameserver_list = [];
$message = '';
$status = '1';
$id = time();

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

        global $domain_nameserver_list;

        $domain_nameserver_list = each_func($domain_list, function ($url) {

            if (empty($url)) return null;

            $url = clean_url($url);

            if (empty($url)) return null;

            if (!(strpos($url, "http://") === 0) && !(strpos($url, "https://") === 0)) {
                $url = "http://" . $url;
            }

            $domain = get_domain_by_url($url);
            return $domain;
            /*
                            return "
             <div>
                <a class='dns' href='https://domain-dns.parkingomat.pl/get.php?domain=$domain' target='_blank'> $domain </a>
                REG-DNS:
                <a class='registrar' href='https://premium.pl/domain/changens.html?name=$domain&type=domain' target='_blank'> PREMIUM </a>
                <a class='registrar' href='https://www.aftermarket.pl/Domain/NS/?domain=$domain' target='_blank'> AFTERMARKET </a>

            </div>
                        ";*/

        });
//            $html = implode(",", $domain_nameserver_list);
    });

} catch (Exception $e) {


// Set HTTP response status code to: 500 - Internal Server Error
    $message = $e->getMessage();
    $status = '0';
}

echo def_json("", request($_POST, $domain_nameserver_list, $message, $status, $id));