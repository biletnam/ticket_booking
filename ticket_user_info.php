<?php include('functions.php');
$ticketlist=array();
$ticket_first_array=array('A','B');
$ticket_second_array=array('C','D','E','F','G','H');
$ticket_third_array=array('J','K','L','M','N','O','P');
$ticket_four_array=array('Q','R','S','T','U');
$date = new DateTime();
	$timestamp=$date->format('U');
	$rand=rand();
	//echo $timestamp."<br/>";
	//echo $rand."<br/>";
	$abc=$timestamp."".$rand;
	//echo $abc."<br/>";
	$_SESSION["item_no"]=md5($abc);
	//print_r(md5($abc));
$ticketrate=array();
$q="SELECT * FROM ticket_rate";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
while($row=mysql_fetch_array($r))
{
	$p=$row["price"];
	array_push($ticketrate,$p);
}
}
$price1=$ticketrate[0];
$price2=$ticketrate[1];
$price3=$ticketrate[2];
$price4=$ticketrate[3];
//print_r($ticketrate[0]);
?>
<div class="count_container">You have<span id="countdown"></span> seconds to proceed</div>
<div class="ticketlist" style="padding-left:4%;margin-top:20px;">
<h3>You Have Selected</h3>
<?php
echo "<div class='seat_list' style='width:900px;'>";
foreach($_SESSION['tickets_step1'] as $key=>$value)
	{
    // and print out the values
    echo "<span>".$value."</span>";
    }
	echo "</div>";
	$price=0;
	$ticketlist=$_SESSION['tickets_step1'];
	//if()
	for($i=0;$i<sizeof($ticketlist);$i++)
	{
		$ticketno=$ticketlist[$i];
		$ticketrowsplit=explode('-',$ticketno);
		$ticketrow=$ticketrowsplit[0];
		if(in_array($ticketrow,$ticket_first_array))
		{
			$price=$price+$price1;
		}
		else if(in_array($ticketrow,$ticket_second_array))
		{
			$price=$price+$price2;
		}
		else if(in_array($ticketrow,$ticket_third_array))
		{
			$price=$price+$price3;
		}
		else
		{
			$price=$price+$price4;
		}
	}
	echo "<br/><div style='clear:both;'></div><h1>Ticket Price:&nbsp;&nbsp;<font class='totalrate'>$ &nbsp;".$price."</font></h1>";
	$_SESSION['price']=$price;
?>
  </div>
 
<section class="c_form">
    
    	    
        <form id="buyticketform" method="post" action="">
        
            <label>Name</label>
            <input class="tbxText" name="name" placeholder="Type Here" required>
            
            <label>Email</label>
            <input name="email" type="email" placeholder="Type Here" required>
            
            <label>Contact No</label>
            <input class="quantity" name="cno1" type="text" maxlength="10" placeholder="Type Here" required>
            
             <label>Alternate No</label>
            <input class="quantity" name="cno2" type="text" maxlength="10" placeholder="Type Here" >
        
         <button id="buyticket" class="button_example" style="margin-top: 10px;float: right;margin-right: 20px;" name="submit" type="submit" value="Submit">Buy Ticket</button>
        
        </form>
   
       
    </section>
    <div style="clear:both;"></div>
  <img src="secure-paypal.jpg" width="220" height="100" style="
    padding-left: 16%;
">
        