<?php 
session_start();

if(isset($_POST['send'])){
	$mob=$_POST['mob'];
	echo $mob;
require('textlocal.class.php');
require('credential.php');
$textlocal = new Textlocal(false, false,API_KEY);

$numbers = array(8960428759);
$sender = 'TXTLCL';
$otp=mt_rand(10000,99999);
$message = 'hello please verity this otp'.$otp;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    echo "successfully  send OTP";
    $_SESSION['OTP']=$otp;
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mobile number verification</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="form-group">
			<div class="form pt-4 pb-4 bg-secondary">
				<form action="" method="POST">
				<label>Mobile no.</label>
				<input type="number" name="mob">
				<input type="submit" name="send" value="send" class="btn btn-success">
			</form>
			</div>
		</div>
	</div>
</body>
</html>