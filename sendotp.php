
<?php
    include "dangky.php";
    $flagOTP=false;
    echo $otp_chuoi=str_shuffle("0123456789");
    echo "<br>";
    echo $otp=substr($otp_chuoi,0,5);
    if(isset($_POST['sendOTP'])){
	// Authorisation details.
	$username = "longvo04100000@gmail.com";
	$hash = "80d33486c205dd645c5b2c6f9771b6681578d92160939624e3e0ea6e322b0948";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "Website bán hoa"; // This is who the message appears to be from.
	$numbers = $_POST['number']; // A single number or a comma-seperated list of numbers
    setcookie("otp",$otp);
	$message = "Chào bạn".$name." mã OTP của bạn là: ".$otp;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('https://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    }
    if(isset($_POST['create'])){
        $dkOtp=$_POST['otp'];
        if($dkOtp=$_COOKIE['otp']){
            $flagOTP=true;
        }
    }
?>