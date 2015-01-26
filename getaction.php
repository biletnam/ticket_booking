<?php
include('functions.php');
$action=$_POST["action"];
if($action=="getticket")
{
    getticketinfo($con,$data);
}

if($action=="setactive")
{
    check_if_booked($con);
}
if($action=="delactive")
{
    delete_active_ticket($con);
}
if($action=="delexpireactiveticket")
{
    del_expired_inserted_active_seats($con);
}
if($action=="delexpirepaymentticket")
{
    del_expired_inserted_payment_seats($con);
}
if($action=="getbooked")
{
check_if_booked($con);
}
if($action=="getactivetickets")
{
	getactivetickets($con);
}
if($action=="insidepaypal")
{
inside_payment_update_limit();
}
if($action=="viewrates")
{
	getrates();
//inside_payment_update_limit();
}
if($action=="checktoken")
{
checktokenno();

}

if($action=="customer_paypal_redirect")
{
paypal_customer_direct_redirect();

}

if($action=="get_booked_mem_ticket")
{
get_booked_member_ticket($con,$data);
}



if($action=="get_mem_record")
{
//get_booked_member_ticket($con,$data);
insert_mem_record();
}

?>