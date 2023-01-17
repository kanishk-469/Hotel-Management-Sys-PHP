<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['reservebtn'])){
$name=$_POST['name']; // super global variable in php
$email =$_POST['email'];
$room_type = $_POST['room_type'];
$contact = $_POST['contact'];
$state =$_POST['state'];
$address = $_POST['address'];
  
 $to ="info@hellou.in";
 $from ="info@hellou.in";
 $subject ="RESERVATION REQUEST FROM USER INTERFACE";

 $message ="Name:-> $name,
 Email Address:-> $email,
 Room Type:-> $room_type,
 Contact Number:-> $contact,
 Full Address:-> $address $state
 ";
 $headers = "From:" .$from;    
 mail($to,$subject,$message,$headers);
 header("Location: reservation.php?msg=Reservation Request Sent, Sit and Relax");
    }
      
}



?>