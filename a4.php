<? php 
$name_error = $email_error = $phone_error = $message_error = "";
$name = $email = $phone = $message ="";

if($_SERVER["REQUEST METHOD"]="POST"){
if(empty($_POST["name"])){
	$name_error = "Name is required";
}
else{
	$name= test_input($_POST["name"]);
	if(!preg_match ("/^[a-zA-Z\s]+$/",$name)){
		$name_error= "Only letters and whitespaces are allowed";
	}
}
if(empty($_POST["email"])){
	$email_error = "Email is required";
}
else{
	$email= test_input($_POST["email"]);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_error= "Please enter a valid email id";
	}
}
	$phone = test_input($_POST["phone"]);
	if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)){
		$phone_error= "This is not a valid phone no.";
	}
if(empty($_POST["message"])){
	$message_error = "message box cannot be empty";
}
else{
	$message= test_input($_POST["message"]);
}
if($name_error = '' and $email_error='' and $message_error=''){
	$message_body='';
	unset($_POST['submit']);
	forEach($_POST as $key => $value){
		$message_body .= "$key: $value\n";
	}
	$to= 'ayushnawal457@gmail.com';
	$subject= 'contact form';
	if(mail($to,$subject,$message)){
		$success="Message Sent, Thank you for contacting me!";
		$name = $email = $phone = $message ='';
	}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}