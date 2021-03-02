<?php 
namespace app\controller\controller_front;

class controller_front
{
	function afficheSignup() {
		require('app/view/signupView.php');
	}

	function afficheSignin() {
		require('app/view/signinView.php');
	}
}
?>