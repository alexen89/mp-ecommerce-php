 <?php

 header("HTTP/1.1 200 OK");
 require __DIR__ .  '/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
    $content = 'iniciamos';
    $fp = fopen("notification.log","w");
    chmod("notification.log", 0777);
    fwrite($fp,$content);
    if (!empty($_POST)) {
        fwrite($fp,$_POST);
    }
    fwrite($fp,'fin');
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