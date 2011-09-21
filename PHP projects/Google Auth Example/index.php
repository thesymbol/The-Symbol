<?php
	require_once('googleauth.php');
	
	/*
	*	You can use this information to generate codes for the example:
	*	
	*	https://www.google.com/chart?chs=200x200&chld=M|0&cht=qr&chl=otpauth://totp/root@localhost.localdomain%3Fsecret%3D7BRJU34GPOWBEQOF
	*	Your new secret key is: 7BRJU34GPOWBEQOF
	*/
	
	$ga = new GoogleAuth();
	if(isset($_POST['submit'])){ //if submited form
		if(!empty($_POST['auth_code'])){ //if input
			//use database to store secret keys for all users (random keys for everyone).
			$secretkey = 'XZ4EIMSCIJJSOKO5H';
			//the auth code that the users enter
			$currentcode = $_POST['auth_code'];
			//call the google auth function to check code.
			if ($ga->checkCode($secretkey, $currentcode)){ //if valid
				echo "Code is valid\n";
				echo "
				<br/>
				Code: ".$_POST['auth_code'];
			}else{ //if invalid
				echo "Invalid code\n";
				echo "
				<br/>
				Code: ".$_POST['auth_code'];
			}
		}else{ //if No input
			echo "Invalid code\n";
			echo "
			<br/>
			Code: ".$_POST['auth_code'];
		}
	}
	//Generate random secreat keys
	function genRandomMasterCode(){
		$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
		$string="";
		for($p=0;$p<17;$p++){
			$string.=$characters[mt_rand(0, strlen($characters))];
		}
		return $string;
	}
?>
<html>
	<head>
		<title>GA - Test</title>
	</head>
	<body>
		<br/>
		<!--Display the random secreat keys-->
		<?php echo genRandomMasterCode(); ?>
		<!--Form for submiting your number-->
		<form action="" method="post">
			<input type="text" name="auth_code" maxlength="6"/>
			<input type="submit" value="send" name="submit"/>
		</form>
	</body>
</html>