<?php

use PHPMailer\PHPMailer\PHPMailer;
class CustomSmtpMailer{
	function __construct(){
		require_once( CustomSmtpMailerPath__PLUGIN_DIR . '/vendor/autoload.php' );
	}

	public static function register_mail_variables(){
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Set the hostname of the mail server
		$mail->Host = getenv('OT_GMAIL_HOST');
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = getenv('OT_GMAIL_USERNAME');
		//Password to use for SMTP authentication
		$mail->Password = getenv('OT_GMAIL_PASSWORD');
		//Set who the message is to be sent from
		$mail->setFrom('marketing@oodlestechnologies.com', 'Oodles Marketing');
		//Set an alternative reply-to address
		//$mail->addReplyTo('ravi.rose@oodlestechnologies.com', 'Oodles Marketing');
		//Set who the message is to be sent to
		//$mail->addAddress('ravi.rose@oodlestechnologies.com', 'Ravi Rose');
		


		$host=$_SERVER['HTTP_HOST'];
		if($host=='localhost'){       
					$mail->addAddress('ravi.rose@oodlestechnologies.com', 'Ravi Rose');
					$mail->AddAddress('aparajita.singh@oodlestechnologies.com');
		}
		elseif($host=='marketing2.oodleslab.com'){
		$mail->AddAddress('ravi.rose@oodlestechnologies.com');
		$mail->AddAddress('himani.sharma@oodlestechnologies.com');
		$mail->AddAddress('raj.kumar@oodlestechnologies.com');
		}
		else{
	        $mail->AddAddress('info@oodlesmarketing.com');
	        $mail->AddAddress('business-development@oodlestechnologies.com');
		}
		
		
		return $mail;
	}

	public static function view( $name, array $args = array() ) {
		
			$all_client_info = self::custom_client_detail();
			$html .= '<h1></h1>';
			$html .= "<table>";
			$html .= "<tbody>";
				$html .= '<tr>';
					$html .= '<th style="text-align:left;">From :</th>';
					$html .= "<td> " . $args['user_name'] . " </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<th style="text-align:left;">Email Address :</th>';
					$html .= "<td> " . $args['user_email'] . " </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<th style="text-align:left;">Contact Number :</th>';
					$html .= "<td> " . $args['user_phone'] . " </td>";	
				$html .= '</tr>';
					$html .= '<th style="text-align:left;">User Ip :</th>';
					$html .= "<td> ". self::getRealIpAddr() ." </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<th style="text-align:left;">Country :</th>';
					$html .= "<td> ". $all_client_info['country'] ." </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<th style="text-align:left;">City :</th>';
					$html .= "<td> ". $all_client_info['city'] ." </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
					$html .= '<th style="text-align:left;">State :</th>';
					$html .= "<td> ". $all_client_info['state'] ." </td>";	
				$html .= '</tr>';
				 $html .= '<tr>';
				 $html .= '<th style="text-align:left;">Current Url :</th>';
				$html .= "<td> " . $args['current_url'] . " </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<th style="text-align:left;">Previous Url :</th>';
				$html .= "<td> " . $args['previous_url'] . " </td>";	
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<th style="text-align:left;">Message :</th>';
				$html .= "<td> " . $args['user_query'] . " </td>";	
				$html .= '</tr>';
		return $html;
	}

	public static function getRealIpAddr()
	{
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	public static function custom_client_detail(){

		$ip = self::getRealIpAddr();
		$query = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
	    if($query && $query->geoplugin_countryName != null){
		    
		    $country=$query->geoplugin_countryName;
		    $city= $query->geoplugin_city;
		    $state= $query->geoplugin_regionName;

	    } else {

		    //Unable to get IP Address;
		    $country = 'N/A';
		    $city 	 = 'N/A';
		    $state 	 = 'N/A';
	    }

	    return array(
	    	'country' => $country,
	    	'city' 	  => $city,
	    	'state'   => $state
	    );

	}
}
