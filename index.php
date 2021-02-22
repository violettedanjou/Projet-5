<?php
require "vendor/autoload.php";

use app\controller\controller;


if (isset($_GET['action'])) {
	echo 'Il y a une action';
	$testController = new controller();
	$testController->test();
}
else {
	echo 'Il ny a pas daction';
	/* renvoyer sur une autre page */
}
?>