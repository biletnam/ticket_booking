<?php include("config.php"); 
include("functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="style.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="ajaxcall.js"></script>
<script src="jquery_timer.js"></script>
<style>

</style>
</head>

<body>
<div id="wrapper">

<section class="c_form">
    
    	    
        <form method="post" action="test/mail.php">
        
            <label>Name</label>
            <input name="name" placeholder="Type Here" required>
            
            <label>Email</label>
            <input name="email" type="email" placeholder="Type Here" required>
            
            <label>Contact No</label>
            <input name="cno" type="text" maxlength="10" placeholder="Type Here" required>
        
         <button class="conntactsubmit" name="submit" type="submit" value="Submit">Buy Ticket</button>
        
        </form>
   
       
    </section>



<?php
//$num = 4;
//$num_padded = sprintf("%02s", $num);
//echo $num_padded; // returns 04
?>

</div>

<!--div id="counter"></div-->
</body>
</html>