<?php
/*How to send notification to android mobile app using Firebase and php & mysql?
Author: Shashi Dhar Kumar
Author URI: https://www.shashidharkumar.in
Plugin URL: https://www.shashidharkumar.com
*/
if(isset($_POST['']))
{
 $servername = "localhost"; //mostly localhost or use the host name
 $username = "Your database username"; //database username
 $password = "Your database password"; //database password
 $conn = new PDO("mysql:host=$servername;dbname=Your database name", $username, $password);
 
 //set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 define( 'API_ACCESS_KEY', 'Firebase Cloud Messaging api key' ); //Firebase Cloud Messaging api key - For this login to your firebase console and see the project setting icon just right after Project Overview and Click on Cloud Messagging tab and copy value of "Legacy server key" 

 $mobile = $_POST["mobile"];
 //Here we will send specific user
 $sql = "SELECT * FROM registeruser WHERE mobile ='$mobile'";
 
 $resultt = $conn->prepare($sql);
 $resultt->execute();
 $token = array();
 if ($resultt->rowCount()>0) 
 {
    while($row =$resultt->fetch())
       {
         $token[]=$row["mobiletoken"]; 
         echo $row["mobiletoken"];  
  }
 }
 var_dump($token);
 $title = $_POST["title"];
 $notification = $_POST["message"];
 $msg =
 [
    'message'   => $notification,
    'title'   => $title
 ];
 $fields = 
 [
    'registration_ids'  => $token,
    'data'      => $msg
 ];
 
 $headers = 
 [
   'Authorization: key=' . API_ACCESS_KEY,
   'Content-Type: application/json'
 ];
 $ch = curl_init();
 curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
 curl_setopt( $ch,CURLOPT_POST, true );
 curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
 curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
 curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
 curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
 $result = curl_exec($ch );
 curl_close( $ch );
 echo $result;
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send notification to android mobile app using Firebase and php & mysql</title>
<meta content="Send notification to android mobile app using Firebase and php & mysql. Android Push Notifications using Firebase Cloud Messaging (FCM), PHP and MySQL. For more information call at +91-999-050-4600" name="description" />
<meta content="send notification to android mobile app using Firebase and php & mysql" name="keywords" />
</head>

<body>
<form name="sendnotitication" action="" method="post" enctype="multipart/form-data">
Mobile: <input type="text" name="mobile" value="" /><br />
Title of notification: <input type="text" name="title" value="" /><br />
Message of notification: <input type="text" name="message" value="" /><br />
<input type="submit" name="submit" value="Send Notification" />
</form>
</body>
</html>