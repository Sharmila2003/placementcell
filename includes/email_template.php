<?php
session_start();
include('db_connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
function send_password_reset($get_firstname,$get_email,$token,$content)
{

    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.mailosaur.net";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "waswyzrd@mailosaur.net";                     //SMTP username
    $mail->Password   = "mFheEnSsqub53jH8";   
                                //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("waswyzrd@mailosaur.net",$get_firstname);
    $mail->addAddress($get_email);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Set Your Password";

    $email_template=$content;

    $mail->Body = $email_template;
    $mail->send();


}
function tokenGeneration(){
    return md5(rand());
}

function userRestrationLinkEmailTemplate($user_name,$emailId,$token){
    $content="<h2>Hello $user_name</h2>
    <h3>You are receiving this email to set your password to login into placementcell</h3>
    <br/><br/>
    <a href='http://localhost/placementcell/passwordsetting.php?signuplink=$token&emailid=$emailId'>Click Me</a>";
    send_password_reset($user_name,$emailId,$token,$content);
}

function comapanyRemainderEmailTemplate($user_name,$emailId,$token,$companyName){
    $content="<h2>Hello $user_name</h2>
    <h3>$companyName has  been arrived for placement please login for register</h3>
    <br/><br/>
    <a href='http://localhost/placementcell/login.php'>Click Me</a>";
    send_password_reset($user_name,$emailId,$token,$content);
}

?>

