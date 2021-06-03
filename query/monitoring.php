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

        $domain_nameserver_list = each_func($domain_list, function ($url) {

            if (empty($url)) return null;

            $url = clean_url($url);

            if (empty($url)) return null;

            if (!(strpos($url, "http://") === 0) && !(strpos($url, "https://") === 0)) {
                $url = "http://" . $url;
            }

            $domain = get_domain_by_url($url);

            $urle = urlencode($url);
            $url_screen = "http://webscreen.pl:3000/url/{$urle}";

            return "
 <br><div>
    SCREEN: <a href='$url_screen' target='_blank'> $url</a>
    <br>
    WEB: <a href='$url' target='_blank'> $url</a>
    <br>
    DNS: <a class='dns' href='https://domain-dns.parkingomat.pl/get.php?domain=$domain' target='_blank'> $domain </a>
    <br>
    REG: 
    <a class='registrar' href='https://ap.www.namecheap.com/domains/domaincontrolpanel/$domain/domain' target='_blank'> NAMECHEAP </a>
    <a class='registrar' href='https://premium.pl/ustawienia/$domain' target='_blank'> PREMIUM </a>

    <br>

    REG-DNS:
    <a class='registrar' href='https://premium.pl/domain/changens.html?name=$domain&type=domain' target='_blank'> PREMIUM </a>
    <a class='registrar' href='https://www.aftermarket.pl/Domain/NS/?domain=$domain' target='_blank'> AFTERMARKET </a>
    
    <br>
    <img src='$url_screen' class='img-responsive img-thumbnail' />
    <br>
    <iframe src='$url' title='$domain'></iframe> 
</div>
            ";

        });

        $html = implode("<br>", $domain_nameserver_list);
    });

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    $message = $e->getMessage();
    $status = '0';
}

echo $html;
echo def_json("", request($_POST, $html, $message, $status));
