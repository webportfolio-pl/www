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
        'value/EmailAddress.php',
        'value/EmailMessage.php',
        'value/EmailReceiver.php',
        'value/EmailSender.php',
        'value/EmailSubject.php',
        'request/send_email.php',
        'model/Email.php',
        'command/SendEmail.php',

    ], function () {


//        if (empty($domain_list)) {
//            throw new Exception("domain list is empty");
//        }


//        send_email(\EmailAddress $EmailAddress, \EmailMessage $EmailMessage, $EmailReceiver, $EmailSender, $EmailSubject){

        $email = new Email();
        $email->from($_POST['address'], $_POST['message'], $_POST['receiver'], $_POST['sender'], $_POST['subject']);
//        $email->from($_POST['address'], $_POST['message'], $_POST['receiver'], $_POST['sender'], $_POST['subject']);
//        $email->fromArray([$address, $message]);

        $sendEmail = new SendEmail($email);
        $sendEmail->send();

    });

} catch (Exception $e) {


// Set HTTP response status code to: 500 - Internal Server Error
    $message = $e->getMessage();
    $status = '0';
}

echo def_json("", request($_POST, $domain_nameserver_list, $message, $status, $id));