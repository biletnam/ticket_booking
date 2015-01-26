<?php session_start();
$seatno_array=$_SESSION['tickets_step1'];
//print_r($_SESSION['tickets_step1']);
$seatlist=implode(",", $seatno_array);
//echo $seatlist;
$price=$_SESSION['price'];
//print_r($_SESSION['price']);
?>
<html>


<body>

	<div id="wait" style="display:block;text-align:center;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='demo_wait.gif' width="64" height="64" /><br>Loading..</div>
	<form id="paypalform" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	
	<input type="hidden" name="cmd" value="_xclick">
	
	<input type="hidden" name="business" value="office@gujaratisocietycfl.com">
	
	<input type="hidden" name="item_name" value="Book Ticket---<?php echo $seatlist;?>">
	
	<input type="hidden" name="item_number" value="112233">
	

	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="currency_code" value="USD">

	<input type="hidden" name="return" value="http://gujaratisocietycfl.arristosoft.com/ticketdemo/payment_success.php">

	<input type="hidden" class="input-text"  name="amount" value="<?php echo $price; ?>" />

	<!--input  type="submit" value="Transfer Amount" /-->
		
	</form>

</body>

</html>