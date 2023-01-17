<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['btn'])){
$subscribe=$_POST['subscribe']; // super global variable in php

 $to ="info@hellou.in";
 $from ="info@hellou.in";
 $subject ="REQUEST TO SUBSCRIBE FOR OFFERS FROM USER INTERFACE";

 $message ="Email Address:-> $subscribe
 ";
 $headers = "From:" .$from;    
 mail($to,$subject,$message,$headers);
 header("Location: index.php?msg=Subscription Successful, Sit and Relax");
    }
      
}



?>