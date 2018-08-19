<?php
 
require 'vendor/autoload.php'; 

define('SITE_URL','https://www.researchpaperweb.com/admin/pages/paypal');

$paypal = new \PayPal\Rest\ApiContext(

	new PayPal\Auth\OAuthTokenCredential(
		'AXSnzlZrc3FFtPFu0tDzXROTowo6gqbpInGOgFcwqhiuNcjgn448zPgNDlYk-oozDP5qWhchCi8Zx_IS',
		'EMeKFxggUDYi5PfOU_OdB9vZWhE39k9ys8cjtGBGFIJQ4wnwFp2qWOBF4KDSMyce_13Ad7mNaS6oNEdM'
		) 
	);
?>