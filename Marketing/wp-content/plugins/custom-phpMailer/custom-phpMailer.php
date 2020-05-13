<?php
   /*
   Plugin Name: Custom PHP Mailer
   Description: Custom smtp plugin provide the smtp library and send mail function.
   Version: 1.0
   Author: Vishal Yadav
   CreatedOn: 24-Jan-2019
   */
use PHPMailer\PHPMailer\PHPMailer;
define( 'CustomSmtpMailerPath__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( CustomSmtpMailerPath__PLUGIN_DIR . 'class.CustomSmtpMailer.php' );

if( !function_exists('custom_smtp_send_mail') ){
   function custom_smtp_send_mail($to, $subject, $userInfo = array(), $attachements = array()){

      require_once( CustomSmtpMailerPath__PLUGIN_DIR . '/vendor/autoload.php' );
      
      $mail = CustomSmtpMailer::register_mail_variables();

      //Set the subject line in
      $mail->Subject = $subject;
      //Read an HTML message body from an external file, convert referenced images to embedded,
      //convert HTML into a basic plain-text alternative body
      $body = CustomSmtpMailer::view('mailbody', $userInfo);
      $mail->msgHTML( $body );
      //Replace the plain text body with one created manually
      $mail->AltBody = 'This is a plain-text message body';
      //Attach an image file
      foreach ($attachements as $key => $value) {
         $mail->addAttachment( $value['tmp_name'], $value['name'] );   
      }
      
      //send the message, check for errors
      if (!$mail->send()) {
          return false;
      } else {
          return true;
      }

      return false;
   }
}

?>
