<?php 
namespace app\controller\controller_front;

class controller {

	function afficheSignup() {
		require('view/SignupView.php');
	}

	function afficheSignin() {
		require('view/signinView.php');
	}
}


?>