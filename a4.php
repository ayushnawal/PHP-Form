<?php
$name = $email = $phone = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name =  $_POST["name"];
	$email =  $_POST["email"];
	$phone =  $_POST["phone"];
	$message =  $_POST["meesage"];
	echo "Your message has been stored succesfully";
}
?>