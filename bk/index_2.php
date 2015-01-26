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
</head>

<body>
<select id="selectmax">
	<option value="0" selected>--No Select--</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>

</select>
<div id="main">
	<div>

<div id="leftarea">
<div class="heading">Left</div>
<table class="leftseatstable" id="seats" border="0" cellspacing="2" cellpadding="0" width="455">
 <tbody style="width: 450px;">

<!-- -----------------------------------A LEFT ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=7;$i>0;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>

</tr>
<!-- -----------------------------------B LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=36;$i>26;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------C LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=36;$i>26;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=38;$i>27;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------L LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">L</font></td>
<?php for($i=49;$i>34;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="L-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>















<!--tr>
<?php for($i=1;$i<25;$i++){ 
$num_padded = sprintf("%02s", $i);?>
<td  valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>


</tr-->
</tbody>

</table>
</div>

<div id="center_left_area">
<div class="heading">Center Left</div>
<table class="center_left_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="350">
 <tbody style="width: 350px;">

<!-- -----------------------------------A Center LEFT ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=24;$i>13;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------B Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=26;$i>20;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------C Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=26;$i>20;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=27;$i>21;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

</tbody>
</table>
</div>

<div id="center_area">
<div class="heading">Center</div>
<table class="center_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="375">
 <tbody style="width: 350px;">

<!-- -----------------------------------A Center ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=27;$i>15;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>
</tbody>
</table>

</div>





<?php
//$num = 4;
//$num_padded = sprintf("%02s", $num);
//echo $num_padded; // returns 04
?>
</div>
</div>
You have Selected<br/><span id="selected"></span><br/>
<button id="ticketproceed" disabled>Proceed</button>
<div id="counter"></div>
</body>
</html>