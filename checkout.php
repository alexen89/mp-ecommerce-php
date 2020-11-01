<?php
// SDK
require __DIR__ .  '/vendor/autoload.php';
$baseUrl = $_SERVER['SERVER_NAME'];
//credentiales
MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = 1234;
$item->title = $_POST['price'];
$item->description = "​Dispositivo móvil de Tienda e-commerce";
$item->picture_url = $_POST['img'];
$item->quantity = $_POST['unit'];
$item->unit_price = $_POST['price'];
$preference->items = array($item);
// Crea Payer  en la preferencia
$payer = new MercadoPago\Payer();
$payer->name = 'Lalo';
$payer->surname = 'Landa';
$payer->email = 'test_user_81131286@testuser.com';
$payer->phone  = array(
				    "area_code" => "52",
				    "number" => "5549737300"
				  );
$payer->address  = array(
				    "zip_code" => "0394​0",
				    "street_name" => "Insurgentes Sur",
				    "street_number" => "1602"
				  );
$preference->payer = $payer;
// Crea Payment Method en la preferencia
$preference->payment_methods = array(
							  "excluded_payment_methods" => array(array("id" => "amex")),
							  "excluded_payment_types" => array(array("id" => "atm")),
							  "installments" => 6
							);
$preference->external_reference = 'aalvaro.encisoj@outlook.com';
$preference->back_urls = array(
						'success' => $baseUrl."/success.php", 
						'pending' => $baseUrl."/pending.php",
						'failure' => $baseUrl."/failure.php"
					);
$preference->notification_url = "https://al3x3n.000webhostapp.com/mp-ecommerce-php/notification.php?source_news=webhooks";
$preference->auto_return = 'approved';
$preference->save();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>
    <script src="https://www.mercadopago.com/v2/security.js" view=""></script>
  </head>
  <body>
    <a href="<?php echo $preference->init_point; ?>">Pagar la compra</a>
  </body>
</html>