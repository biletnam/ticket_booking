<?php
session_start();
$ticketlist=array();
$ticket_first_array=array('A','B');
$ticket_second_array=array('C','D','E','F','G','H');
$ticket_third_array=array('J','K','L','M','N','O','P');
$ticket_four_array=array('Q','R','S','T','U');
?>
<div class="ticketlist" style="padding-left:4%;margin-top:80px;">
<h3>You Have Selected</h3>
<?php
foreach($_SESSION['tickets_step1'] as $key=>$value)
    {
    // and print out the values
    echo "<span>".$value."</span>";
    }
	
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
			$price=$price+100;
		}
		else if(in_array($ticketrow,$ticket_second_array))
		{
			$price=$price+50;
		}
		else if(in_array($ticketrow,$ticket_third_array))
		{
			$price=$price+30;
		}
		else
		{
			$price=$price+15;
		}
	}
	echo "<br/><h1>Ticket Price:$".$price."</h1>";
	$_SESSION['price']=$price;
?>
  </div>
  <div style="clear:both;"></div>
<section class="c_form">
    
    	    
        <form id="buyticketform" method="post" action="">
        
            <label>Name</label>
            <input name="name" placeholder="Type Here" required>
            
            <label>Email</label>
            <input name="email" type="email" placeholder="Type Here" required>
            
            <label>Contact No</label>
            <input name="cno" type="text" maxlength="10" placeholder="Type Here" required>
        
         <button id="buyticket" class="button_example" style="margin-top: 10px;float: right;margin-right: 20px;" name="submit" type="submit" value="Submit">Buy Ticket</button>
        
        </form>
   
       
    </section>
  