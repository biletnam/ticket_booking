<?php session_start();
include('config.php');
$data=array();

function getticketinfo($con_e1,$data)
{
$q="SELECT * FROM ticket_detail";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{	
	while($row=mysql_fetch_array($r))
	{

		$seat= $row['seat_no'];	
		array_push($data,$seat);
		
	}
}
$dataarray=array("booked"=>$data);
        echo json_encode($dataarray);
//print_r($data);
mysql_close($con_e1);
}
//getticketinfo($con_e1,$data);

function getactivetickets($con_e1)
{
$activeticket=array();
$q="SELECT * FROM ticket_currently_active";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{	
	while($row=mysql_fetch_array($r))
	{
		$seat= $row['seatno'];	
		array_push($activeticket,$seat);
		
	}
}
$activeticketarray=array("active"=>$activeticket);
        echo json_encode($activeticketarray);
//print_r($data);
mysql_close($con_e1);
}
//getactivetickets($con_e1);
function check_if_booked($con_e1)
{
	$stat="ok";
	$status="active";
	$booked_ticket=array();
	$seats=array();
	$seats=$_POST["seatno"];
	//getticketinfo($con_e1,$data);
	//echo $data;
	//$seats=$_POST["seatno"];
	//print_r($seats);
	$q1="SELECT * FROM ticket_detail";
	$r1=mysql_query($q1);
	if(mysql_num_rows($r1)>0)
	{	
		while($row=mysql_fetch_array($r1))
		{
			$seat= $row['seat_no'];	
			array_push($booked_ticket,$seat);
			
		}
	}
	//print_r($booked_ticket);
	$active_ticket=array();
	
	$q2="SELECT * FROM ticket_currently_active";
	$r2=mysql_query($q2);
	if(mysql_num_rows($r2)>0)
	{	
		while($row=mysql_fetch_array($r2))
		{
			$seat= $row['seatno'];	
			array_push($active_ticket,$seat);
			
		}
	}
	
	
	//print_r($active_ticket);
	
	$date = new DateTime();
	$timestamp=$date->format('U');
	
	for($i=0;$i<sizeof($seats);$i++)
	{
		//echo $seats[$i];
		if(in_array($seats[$i],$booked_ticket) || in_array($seats[$i],$active_ticket))
		{
			$stat="error";
		}		
	}
	$final_status_step1_array=array();
	if($stat=='error')
	{
		echo "error";
	}
	else
	{	
		
		for($i=0;$i<sizeof($seats);$i++)
		{
			$seat_n=$seats[$i];
			$query="INSERT INTO ticket_currently_active VALUES(NULL,'$seat_n','$status','$timestamp')";
			$r=mysql_query($query);
			if($r)
			{
				array_push($final_status_step1_array,$seat_n);
			}
		}
		echo "success";
	}
	$_SESSION['tickets_step1']=$final_status_step1_array;
	//echo $stat."<br>";
	/* for($i=0;$i<sizeof($seats);$i++)
	{
		if(in_array($seats[i],$data))
		{
			$stat="error";
		}
	}
	echo $stat;*/
	
	
mysql_close($con_e1);
}

//check_if_booked($con_e1);


function insert_active_ticket($con_e1)
{
	//$seats_insidetable=array();
	$status="active";
	$seats=array();
	$seats=$_POST["seatno"];
	
	$date = new DateTime();
	$timestamp=$date->format('U');
	
	//$seats_insidetable=getallactiveticketinarray();
	//echo $seats_insidetable;
	for($i=0;$i<sizeof($seats);$i++)
	{
		/*if(in_array($seats[i],$seats_insidetable))
		{
			echo "Error";
		}
		else
		{*/
		$seat_n=$seats[$i];
		$query="INSERT INTO ticket_currently_active VALUES(NULL,'$seat_n','$status','$timestamp')";
		$r=mysql_query($query);
		
		echo $seat_n;	
		
	}
//echo "In PHP function".$_POST["seatno"];

mysql_close($con_e1);
}
function del_expired_inserted_active_seats($con_e1)
{
	$date = new DateTime();
	$timestamp=$date->format('U');
	$timestamp=(int)$timestamp;
	$timelimit=$timestamp-300;
	echo $timestamp."<br/>",$timelimit."<br/>";
	$q="SELECT * FROM ticket_currently_active WHERE status='active'";
	$r=mysql_query($q);
	if(mysql_num_rows($r)>0)
	{	
		while($row=mysql_fetch_array($r))
			{
				$table_timestamp=$row["timestamp"];
				if($table_timestamp<$timelimit)
				{
					$q1="DELETE FROM ticket_currently_active WHERE status='active' and timestamp='$table_timestamp'";
					mysql_query($q1);
					
				}
				//echo $table_timestamp."<br/>";
			}
	}
	mysql_close($con_e1);
}

function delete_active_ticket($con_e1)
{
	//$seat_no=$_POST["seatno"];
	//$status="active";
	$seats=array();
	$seats=$_POST["seatno"];
	//print_r($seats);
	for($i=0;$i<sizeof($seats);$i++)
	{
		$seat_n=$seats[$i];
		$query="DELETE FROM ticket_currently_active WHERE seatno='$seat_n'";
		$r=mysql_query($query);
		echo $seat_n;	
	}
//echo "In PHP function".$_POST["seatno"];

mysql_close($con_e1);
}
//del_expired_inserted_active_seats();
/*
$seats=array(23,24,25,"12321");
	//$seats=$_POST["seatno"];
	print_r($seats);
	//$max=sizeof($seats);
	for($i=0;$i<sizeof($seats) ;$i++)
	{
		echo $seats[$i];	
	}
	*/
	//date_default_timezone_set("INDIAN");
	//$date = new DateTime('2000-01-01', new DateTimeZone('Pacific/Nauru'));
//echo $date->format('Y-m-d H:i:sP') . "\n";

//echo "<br/>";
//date_default_timezone_set("Asia/Kolkata");
//$date = new DateTime();
//echo $date->format('U');
//$timestamp = strtotime($date->format('U'));
//$date = date('d-m-Y', $timestamp);
//$time = date('Gi.s', $timestamp);
//echo "$timestamp","$date","$time";
//echo "<br/>";

//$date->setTimestamp(1395167100);
//echo $date->format('U = Y-m-d H:i:s') . "\n";

//echo "Indian Standart time Time: ". date("h:i:s")."\n";

function getallactiveticketinarray()
{
$activeticket=array();
$q="SELECT * FROM ticket_currently_active";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{	
	while($row=mysql_fetch_array($r))
	{
		$seat= $row['seatno'];	
		array_push($activeticket,$seat);
	}
}
print_r($activeticket);
}

?>
