<?php
Autoloader::map(array(
	'stripe-oauth' 	=> Bundle::path('laravel-stripe-oauth-bundle').'PHP-StripeOAuth/StripeOAuth.class.php',
));

Laravel\IoC::singleton('stripe-oauth', function()
{
    $config = array();
	$config['_cID'] = Config::get('stripeoauth._cid', Config::get('stripe-oauth::stripeoauth._cid'));
	$config['secret'] = Config::get('stripeoauth.secret', Config::get('stripe-oauth::stripeoauth.secret'));

	return new FoursquareApi($config['_cID'], $config['secret']);
});

?>