<!--SEND all booking request to company web mail-->

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
$fname=$_POST['first_name']; // SUPER GLOBAL VARIABLE
$lname=$_POST['last_name'];
$room_type=$_POST['room_type'];
$checkindate=$_POST['check_in'];
$checkoutdate=$_POST['check_out'];

$no_of_adults=$_POST['adults'];
$no_of_children=$_POST['children'];
$email=$_POST['email'];
$contact=$_POST['number'];
$address=$_POST['address'];
 
 $to = 'info@hellou.in';
 $from ='info@hellou.in';
 
 $subject ='BOOKING REQUEST FROM UI';
 $message = "First_name:-> $fname 
 Last_name:-> $lname,
 Room_Type:-> $room_type,
 Checking_details:-> $checkindate, $checkoutdate,
 No_of_adults:-> $no_of_adults,
 No_of_children:-> $no_of_children,
 Email:-> $email,
 Contact:-> $contact,
 Address:-> $address,
 Please Contact our Customer for further processing";
   $headers ="From:" .$from;
  mail($to,$subject,$message , $headers);
  header("Location: book.php?msg=Booking Request Sent,Sit and Relax");
    
}

?>