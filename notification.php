 <?php

 //header("HTTP/1.1 200 OK");
 header('Content-type: application/json');
 require __DIR__ .  '/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
    $content = 'iniciamos\n';
    $fp = fopen("notification.log","w");
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);
    chmod("notification.log", 0777);
    fwrite($fp,$content);
    fwrite($fp,$data);
    fwrite($fp,$_POST['link']);
        fwrite($fp,$_POST['id']);
        fwrite($fp,$_POST['live_mode']);
        fwrite($fp,$_POST['type']);
        fwrite($fp,$_POST['date_created']);
        fwrite($fp,$_POST['application_id']);
        fwrite($fp,$_POST['user_id']);
        fwrite($fp,$_POST['version']);
        fwrite($fp,$_POST['api_version']);
        fwrite($fp,$_POST['action']);
        fwrite($fp,$_POST['data']['id']);
    fwrite($fp,'fin\n');
    fclose($fp);
    switch(isset($_POST["type"])) {
        case "payment":
            $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
            break;
        case "plan":
            $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
            break;
        case "subscription":
            $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
            break;
        case "invoice":
            $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
            break;
    }

?>