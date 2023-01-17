<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['btn'])){
$name=$_POST['name']; // super global variable in php
$email =$_POST['email'];
$number = $_POST['number'];
$textsubject =$_POST['subject'];
$textmsg = $_POST['message'];
  
 $to ="info@hellou.in";
 $from ="info@hellou.in";
 $subject ="DROP US A LINE FROM USER INTERFACE";

 $message ="Name:-> $name,
 Email Address:-> $email,
 Contact Number:-> $number,
 Subject:-> $textsubject,
 Everything in Detail:-> $textmsg
 ";
 $headers = "From:" .$from;    
 mail($to,$subject,$message,$headers);
 header("Location: contact.php?msg=Submitted Successfully, Sit and Relax");
    }
      
}



?>