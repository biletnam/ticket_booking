<?php
include('../config.php');
include('../functions.php');
file_put_contents('ipn.txt', json_encode($_POST).PHP_EOL, FILE_APPEND);

$ipn_post_data=array();
	$ipn_post_data = $_POST;
	$fp = fopen('file/file.csv', 'a');
$file='file.csv';
 fputcsv($fp, $ipn_post_data);
 fclose($fp);
	//file_put_contents(serialize($_POST), 'post.log');
	//$data="nisarg";
	
	$address_name=$_POST["address_name"];
$payer_email=$_POST["payer_email"];
$item_name=$_POST["item_name"];
$custom=$_POST["custom"];

$address_street=$_POST["address_street"];
$payment_date=$_POST["payment_date"];
$payment_status=$_POST["payment_status"];
$seatnosplit=explode("---",$item_name);
//echo $seatnosplit[0],$seatnosplit[1];
$temp=$seatnosplit[1];
$seatno=explode(",",$temp);

$date = new DateTime();
	$timestamp=$date->format('Y-m-d H:i:s');
	
	/*-- --------------- ----------- Mail Fixed Header Code --------------------------   -*/
	$to =$payer_email;
$subject = 'Florida Society-Purchased Tickets';

$headers = "From:info@gujaratisocietycfl.com\r\n";
$headers .= "Reply-To:info@gujaratisocietycfl.com\r\n";
//$headers .= "CC:crpcomfort@yahoo.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type:text/html; charset=ISO-8859-1\r\n";
 
		/*-- --------------- ----------- Mail Fixed Header Code --------------------------   -*/
		

if($payment_status=='Completed')
{

		//$seat_temp=$seatno[$i];
$qtemp="UPDATE ticket_customer SET status='$payment_status' WHERE itemnumber='$custom'";
$rtemp=mysql_query($qtemp);
	
	
$q1="INSERT INTO ticket_buyer(name,address,email,itemnumber,paymentdate) VALUES('$address_name','$address_street','$payer_email','$custom','$payment_date')";
$r=mysql_query($q1);
		
		
		
		/*-- --------------- ----------- get Customer id for Customer Change Status --------------------------   -*/
		$q3="select id from ticket_customer WHERE itemnumber='$custom'";
		$r3=mysql_query($q3);
		while($row=mysql_fetch_array($r3))
		$tcid=$row["id"];
/*-- --------------- ----------- get Customer id for Customer Change Status --------------------------   -*/

/*-- --------------- ----------- get Buyer id for Customer Change Status --------------------------   -*/
		$q4="select id from ticket_buyer WHERE itemnumber='$custom'";
		$r4=mysql_query($q4);
		while($row=mysql_fetch_array($r4))
		$tbuyerid=$row["id"];
/*-- --------------- ----------- get Buyer id for Customer Change Status --------------------------   -*/


/*-- --------------- ----------- Change the records in ticket_detail  --------------------------   -*/
	$event_id=1;
	
	
	for($i=0;$i<sizeof($seatno);$i++)
	{
		$seat=$seatno[$i];
		$q_check="SELECT * FROM ticket_detail WHERE seat_no='$seat'";
		$r_check=mysql_query($q_check);
		if(mysql_num_rows($r_check)>0)
		{
		$q_tb_update="UPDATE ticket_detail SET timestamp='$timestamp',status='$payment_status',buyer_id='$tbuyerid' WHERE seat_no='$seat'";
		$r_tb_ipdate=mysql_query($q_tb_update);	
		}
		else
		{
	$q2="INSERT INTO ticket_detail(seat_no,status,timestamp,customer_id,buyer_id,event_id) VALUES('$seat','$payment_status','$timestamp','$tcid','$tbuyerid','$event_id')";
	$r2=mysql_query($q2);
		}
		
	}
/*-- --------------- ----------- Change the records in ticket_detail  --------------------------   -*/
	$message=eventbooked($address_name,$payer_email,$address_street,$custom,$temp);
	mail($to, $subject, $message, $headers);
	$to1='jpatel5000@yahoo.com';
	$headers1= "CC:crpcomfort@yahoo.com\r\n";
	$message23=eventbooked_admin_notify($address_name,$payer_email,$address_street,$custom,$temp);
	mail($to1, $subject, $message23, $headers1);
	
}
if($payment_status=='Refunded')
{
	$q5="UPDATE ticket_customer SET status='$payment_status' WHERE itemnumber='$custom'";
	$r5=mysql_query($q5);
	
	$q7="UPDATE ticket_buyer SET status='$payment_status',paymentdate='$payment_date' WHERE itemnumber='$custom'";
	$r7=mysql_query($q7);
	
	
	$event_id=1;
	for($i=0;$i<sizeof($seatno);$i++)
	{
		$seat_r=$seatno[$i];
	$q6="UPDATE ticket_detail SET status='$payment_status',timestamp='$timestamp' WHERE itemnumber='$custom' and seat_no='$seat_r'";
	$r6=mysql_query($q6);
	}
	
		$message=eventRefunded($address_name,$payer_email,$address_street,$custom,$temp);
	mail($to, $subject, $message, $headers);
	
	
}

?>