<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['muntah'] = function() {
	echo "<pre>";
	var_dump($_SESSION);
	echo "</pre>";

	die;
};

$route['buatpassword/(:any)'] = function($plain_text) {
	$token = password_hash($plain_text, PASSWORD_DEFAULT);

	echo "<pre>";
	echo "Teks password: ".$plain_text;
	echo "<br>";
	echo "Hash password(db): ".$token;
	echo "</pre>";

	die;
};
