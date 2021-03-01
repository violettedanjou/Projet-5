<?php 
namespace app\controller\controller_front;

class controller 
{
	function afficheSignup() {
		require('app/view/SignupView.php');
	}

	function afficheSignin() {
		require('app/view/signinView.php');
	}
}
?>