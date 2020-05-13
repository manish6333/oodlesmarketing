<?php
// include '../php/PHPMailer/src/Exception.php';
// include '../php/PHPMailer/src/PHPMailer.php';
// include '../php/PHPMailer/src/SMTP.php';
include '../php/phpmail/dist/php/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
include '../php/phpmail/dist/php/vendor/phpmailer/phpmailer/class.phpmailer.php';
include '../php/phpmail/dist/php/vendor/autoload.php';
$host = $_SERVER['HTTP_HOST'];
//$adwordsData = 0;
$name = $_POST['username'];
$message = $_POST['usercomment'];
if(isset($_POST['quotes'])){
$quotes = $_POST['quotes'];
$message_new = $_POST['usercomment'];
}
$phone = $_POST['user_phone_footer'];
$emailid = $_POST['emailid'];
$current_url = $_POST['current_url'];
if($_POST['previous_url'] != ""){
$previous_url = $_POST['previous_url'];
}
else{
$previous_url = $_POST['current_url'];
}
$date = date_default_timezone_set('Asia/Kolkata'); 
$date = date("d M Y h:i a", time());
function getRealIpAddr()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
if($host=='localhost'){
    $secretKey = '6LfgZp0UAAAAAMauy5bjO5nLLDhTDsIDqnf16iHY';
}elseif($host=='marketing2.oodleslab.com'){
    $secretKey = '6Lcjo50UAAAAAPr29ArkbGafffW8pc5819hwZVbz';
}else{
    $secretKey = '6LfdzJ0UAAAAAE5c7XgrIdrset2DqX3GGOb-1Jvc';   
}
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
// Decode json data 
$responseData = json_decode($verifyResponse); 
$response_succ_status = $responseData->success;
$ip = getRealIpAddr();
//IP address and location
//$ip = '180.151.85.198'; 
 $ip = $_SERVER['REMOTE_HOST'];
$query = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
if($query && $query->geoplugin_countryName != null){
//$ip=$query['query'];
$country=$query->geoplugin_countryName;
$city= $query->geoplugin_city;
$state= $query->geoplugin_regionName;
} else {
// $ip='Unable to get IP Address';
$country='Unable to get Country';
$city='Unable to get City';
$state= 'Unable to get State';
//echo 'Unable to get location';
}
$mail = new PHPMailer(true); // Passing `true` enables exceptions
try {
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->SMTPDebug = 2;
$mail->isHTML(); 
$mail->Username = 'enquiry@oodlestechnologies.com'; // SMTP username
$mail->Password = 'oodlestech@oodlescrm'; 
if($host=='localhost'){
    //$mail->AddAddress('tanisha.sharma@oodlestechnologies.com');
    $mail->AddCC('rohit.kumar2@oodlestechnologies.com');
}elseif($host=='marketing2.oodleslab.com'){//Staging
    $mail->AddAddress('rohit.kumar2@oodlestechnologies.com');
    $mail->AddCC('pooja.kumari@oodlestechnologies.com');
}else{//Production
    $mail->AddAddress('business-development@oodlestechnologies.com');
    //$mail->AddAddress('crm@oodlestechnologies.com');
    $mail->AddCC('info@oodlesmarketing.com');
}
$mail->SetFrom($emailid); 
$mail->Subject = "Oodles Marketing Query | ".$name." | ".$country;
if(isset($quotes)){
$mail->Body = '<b>Date:</b> '.$date."<br>".
'<b>From:</b> ' . $name ."<br>" .
'<b>Email Address:</b> ' .$emailid."<br/>".
'<b>Phone No:</b> ' .$phone."<br/>".
'<b>Quote:</b> ' .$quotes."<br/>".
'<b>City:</b> '.$city."<br>".
'<b>State:</b> '.$state."<br>".
'<b>Country:</b> '. $country."<br>".
'<b>Current Url:</b> '. $current_url."<br>".
'<b>Previous Url:</b> '. $previous_url."<br>".
"<b>Message:</b> " . $message_new ;
// if(is_array($_FILES)) {
//     $mail->AddAttachment($_FILES['attachmentFile']['tmp_name'],$_FILES['attachmentFile']['name']); 
// }
if( !empty($_FILES) ){
    foreach ($_FILES as $key => $value) {
        if( $value['error'] != 4 ){
            $mail->addAttachment( $value['tmp_name'], $value['name'] );   
        }
    }
  }
}
// Set email format to HTML 
    if( $response_succ_status ){
        if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        echo 'Message has been sent';
        }
    }
} catch (Exception $e) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>