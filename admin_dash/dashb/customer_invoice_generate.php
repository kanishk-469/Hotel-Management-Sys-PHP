<?php 
$customer_id=$_GET['customer_id'];
// echo $customer_id;
$connection = mysqli_connect("localhost","hotel","","hotel");

$sqlSelect = "SELECT * FROM booking NATURAL JOIN customer NATURAL JOIN room WHERE customer_id='$customer_id'";
$result = $connection->query($sqlSelect);
 if ($result) {
$row = mysqli_fetch_assoc($result);

$customer_name =$row['customer_name'];
$customer_address =$row['address'];
$contact =$row['contact_no'];
$email =$row['email'];
$room_number =$row['room_no'];
$booking_date = date("Y-m-d", strtotime($row['booking_date']));
$check_in_date =$row['check_in'];
$check_out_date =$row['check_out'];
$total_amount =$row['total_price'];

// echo $total_amount;
$invoice_id ="DdPr".rand();
$tax = $total_amount*10/100;
$tax_free_amount = $total_amount - $tax;
$customer_rand_id = 'CI'.$customer_id.rand();

}else{
    echo 'error';
}

require('fpdf17/fpdf.php');
// fpdf library used for invoice generation in pdf format
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

// set image path, x-axis, y-axis, size 
$pdf->Image('logo-small.png', 153, 43, 33.78);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(130	,5,'DEMO DHANRAJ HOTEL',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Kalithapur chamber, old Yarni on (2nd street), NH 30]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Kathmandu, NEPAL, 110027]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$booking_date,0,1);//end of line

$pdf->Cell(130	,5,'Phone [+118465748576]',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$invoice_id,0,1);//end of line

$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$customer_rand_id,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$customer_name,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$contact,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$customer_address,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$contact,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Taxable',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130	,5,'Room Number:'.$room_number,1,0);
$pdf->Cell(25	,5,$tax,1,0);
$pdf->Cell(34	,5,$tax_free_amount,1,1,'R');//end of line

$pdf->Cell(130	,5,$_POST['item2name'],1,0);
$pdf->Cell(25	,5,$_POST['item2tax'],1,0);
$pdf->Cell(34	,5,$_POST['item2amount'],1,1,'R');//end of line

$pdf->Cell(130	,5,$_POST['item3name'],1,0);
$pdf->Cell(25	,5,$_POST['item3tax'],1,0);
$pdf->Cell(34	,5,$_POST['item3amount'],1,1,'R');//end of line

//summary
$subtotal=$tax_free_amount+$_POST['item2amount']+$_POST['item3amount'];
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(6	,5,'Rs',1,0);
$pdf->Cell(28	,5,$subtotal,1,1,'R');//end of line

$tax=$tax+$_POST['item2tax']+$_POST['item3tax'];
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Taxable',0,0);
$pdf->Cell(6	,5,'Rs',1,0);
$pdf->Cell(28	,5,$tax,1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(6	,5,'%',1,0);
$pdf->Cell(28	,5,'10%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(6	,5,'Rs',1,0);
$pdf->Cell(28	,5,$subtotal+$tax,1,1,'R');//end of line

$file_name = "invoice".rand() .".pdf";

$pdf->Output($file_name,'I');       // $pdf->Output("test.pdf",'D'); $pdf->Output("test.pdf",'I'); 

?>
