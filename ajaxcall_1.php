<html>
<head>
</head>
<script>
$(document).on('mousewheel', '#main', function (e) {
         var delta = e.originalEvent.wheelDelta;
        this.scrollLeft += (delta < 0 ? 1 : -1) * 50;
        e.preventDefault();
		
});

/*--------------------- ---- Error Noty Alert------------------------------ */
    function errornoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'error',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			
			timeout:5000
        });
		$("#noty_top_layout_container li").css("background-color","rgb(187, 44, 44)");
		//$("#noty_top_layout_container li").css("transition","linear");
		//rgb(12, 119, 12) /*success
       // console.log('html: ' + n.options.id);
    }
	/*--------------------- ---- Success Noty Alert------------------------------ */
	 function successnoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'success',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			timeout:5000
        });
		$("#noty_top_layout_container li").css("background-color","rgb(12, 119, 12)");
		//rgb(12, 119, 12) /*success
        console.log('html: ' + n.options.id);
    }
	
	/*--------------------- ---- Information Noty Alert------------------------------ */
	
	
	function infonoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'information',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			timeout:5000
        });
		//$("#noty_top_layout_container li").css("background-color","rgb(12, 119, 12)");
		$("#noty_top_layout_container li").css("background-color","#2784ea");
		
        console.log('html: ' + n.options.id);
    }
    
$(document).ready(function(){
/*		$('#main').hover(
  
    function() {
        $(this).animate({ 'zoom': 1 }, 400);
$("#right_area tr > td").css('height','24px');
    },
    function() {
        $(this).animate({ 'zoom': 0.61 }, 400);
				$("#right_area tr > td").css('height','23px');
    });
/*	var j ='{"booked":["A_2","A_9","A_11"]}';

var json = $.parseJSON(j);
$(json).each(function(i,val){
    $.each(val,function(k,v){
        console.log(v);       
});
}); */


	
	/*--------------------- ---- Get Expired Active Ticket and Delete It------------------------------ */
	
	$.ajax({
            url : 'getaction.php',
            method : 'POST',
			async: false, 
            data : {action:"delexpireactiveticket"},
            success: function(result){
                //bookedTickets=result;
				console.log("Successfully Deleted Active Records");
            }
        })
		/*--------------------- ---- Get Expired Inside Payment Ticket and Delete It------------------------------ */	
		$.ajax({
            url : 'getaction.php',
            method : 'POST',
			async: false, 
            data : {action:"delexpirepaymentticket"},
            success: function(result){
                //bookedTickets=result;
				console.log("Successfully Deleted Payment Records");
            }
        })
	
	/*--------------------- ---- Get Ticket Rate From Table and Display  It------------------------------ */
	var ticketrates;
	var ticketrate0,ticketrate1,ticketrate2,ticketrate3
	$.ajax({
            url : 'getaction.php',
            method : 'POST',
			async: false, 
            data : {action:"viewrates"},
            success: function(result){
                //bookedTickets=result;
				console.log("view result");
				console.log(result);
				ticketrates=result;
				console.log(ticketrates);
				var ticketrates=$.parseJSON(ticketrates);
				console.log(ticketrates);
//bookedticketno=bookedTickets.split(" ");
//var getallticketrate=[];

$(ticketrates).each(function(i,val){
    $.each(val,function(k,val){
       ticketrate0=val[0]; ticketrate1=val[1]; ticketrate2=val[2]; ticketrate3=val[3];
});});
				
            }
        })
	//console.log(ticketrate0);
	//console.log(ticketrate1);
	//console.log(ticketrate2);
	//console.log(ticketrate3);
	/*--------------------- ---- Get Already Active Ticket and Disable It------------------------------ */
var get_active_tickets =[];
		$.ajax({
            url : 'getaction.php',
            method : 'POST',
			async: false, 
            data : {action:"getactivetickets"},
            success: function(result){
                get_active_tickets=result;
            }
        });
		console.log(get_active_tickets);
		var active_ticket_seatno=$.parseJSON(get_active_tickets);
		
		var active_seats=[];
		$(active_ticket_seatno).each(function(i,val){
    	$.each(val,function(k,active_seats){
        console.log(active_seats); 
			for(var i=0;i<active_seats.length;i++)
			{
				console.log("#"+active_seats[i]);
				$("#"+active_seats[i]).attr("background","chairicon_cir_26_red.png");   
				$("#"+active_seats[i]).removeAttr("class");
				$("#"+active_seats[i]).css("cursor","context-menu");
			}
			});
		});
/*--------------------- ---- Get Already Booked Ticket and Disable It------------------------------ */
var bookedTickets = [];
		$.ajax({
            url : 'getaction.php',
            method : 'POST',
			async: false, 
            data : {action:"getticket"},
            success: function(result){
                bookedTickets=result;
            }
        });
		
		
console.log(bookedTickets);
var bookedticketno=$.parseJSON(bookedTickets);
//bookedticketno=bookedTickets.split(" ");
var seats=[];
$(bookedticketno).each(function(i,val){
    $.each(val,function(k,seats){
        console.log(seats); 
		for(var i=0;i<seats.length;i++)
		{
		$("#"+seats[i]).attr("background","chairicon_cir_26_red.png");   
		$("#"+seats[i]).removeAttr("class");
		$("#"+seats[i]).css("cursor","context-menu");
		}
});
});

/*--------------------- ---- Get Value From Select and Enable to select that max ticket------------------------------ */

if($("#selectmax").val()==0)
		{	
			//console.log("not sel change");
			$('#main').css('opacity','0.5');
			$('.flyerimage').show();
			//$('#wrapper').fadeOut("fast");
		}
//console.log(bookedticketno);
var number = 0;
var max_ticket;
$("#selectmax").change(function(e) {
    //var maxsel=Number(sel.length)+1;
	if($("#selectmax").val()==0)
		{	
			//console.log("not sel change");
			$('#wrapper').css('dispaly','none');
			$('#main').css('opacity','0.5');
			$('#wrapper').toggle("slow");
			$('.flyerimage').show();
			$("#main").addClass('cont_cursor');
		}
		else
		{
			$('.flyerimage').fadeOut();
			$('#wrapper').show("slow");
		$('#main').css('opacity','1');
		$("#main").removeClass('cont_cursor');
		}
	sel=[];
	
	price=0;
	$("#sum").html(price);
	number=0;
	$("#ticketproceed").attr("disabled","disabled");
	max_ticket=$(this).val();
	$(".available").attr("background","chairicon_cir_26.png");
	
	 $("#selected").html(sel.join(" , "));
});
	var seatno_first_array=['A','B'];
	var seatno_second_array=['C','D','E','F','G','H'];
	var seatno_third_array=['J','K','L','M','N','O','P'];
	var seatno_four_array=['Q','R','S','T','U'];
	
var sel=[];
var activeTickets;
var price=0;
function priceIncrManage(seat_row)
{
	if(jQuery.inArray(seat_row,seatno_first_array)!=-1)
	{
		price=Number(price)+Number(ticketrate0);
		$("#sum").html(price);
	}
	else if(jQuery.inArray(seat_row,seatno_second_array)!=-1)
	{
		price=Number(price)+Number(ticketrate1);
		$("#sum").html(price);
	}
	else if(jQuery.inArray(seat_row,seatno_third_array)!=-1)
	{
		price=Number(price)+Number(ticketrate2);
		$("#sum").html(price);
	}
	else
	{
		price=Number(price)+Number(ticketrate3);
		$("#sum").html(price);
	} 
	//console.log(seat_row[0]);
}
function priceDecrManage(seat_row)
{
	if(jQuery.inArray(seat_row,seatno_first_array)!=-1)
	{
		price=Number(price)-Number(ticketrate0);
		$("#sum").html(price);
	}
	else if(jQuery.inArray(seat_row,seatno_second_array)!=-1)
	{
		price=Number(price)-Number(ticketrate1);
		$("#sum").html(price);
	}
	else if(jQuery.inArray(seat_row,seatno_third_array)!=-1)
	{
		price=Number(price)-Number(ticketrate2);
		$("#sum").html(price);
	}
	else
	{
		price=Number(price)-Number(ticketrate3);
		$("#sum").html(price);
	} 
}
$(".available").on("click",function(e) {
	
	var b=$(this).attr("id");
	var seat_row_array=b.split('-');
	var seat_row=seat_row_array[0];
	

	if(Number(number)<Number(max_ticket))
	{
	switch ($(this).attr("background"))
		{
			case "chairicon_cir_26.png":
				$(this).attr("background","chairicon_cir_26_green.png");
				number++;
				sel.push(b);
				console.log(sel);
				sel.sort();			
				$("#selected").html(sel.join(" , "));
				priceIncrManage(seat_row);
				break;
			
			case "chairicon_cir_26_green.png":
				 $(this).attr("background","chairicon_cir_26.png");
				 number--;
				 //sel.pop(b);
				 sel.splice( $.inArray(b,sel) ,1 );
				 sel.sort();
				 $("#selected").html(sel.join(" , "));
				 priceDecrManage(seat_row);
				 break;
				 
		}
	
	
	} 
	else
	{
		switch ($(this).attr("background"))
		{
			
			case "chairicon_cir_26_green.png":
				 $(this).attr("background","chairicon_cir_26.png");
				  number--;
				  //sel.pop(b);
				  sel.splice( $.inArray(b,sel) ,1 );
				  sel.sort();
				 $("#selected").html(sel.join(" , "));
				 priceDecrManage(seat_row);
				 break;
				 
		}
	} 
	
	/*------------------ Disable Procees Button and Max alert    -------------------------- */
	if(Number(number)==max_ticket)
	{
		if ($(".noty_type_information").length == 0){
  				infonoty('top','You Can Remove Selected By Click Second Time');
			}
		
		$("#ticketproceed").removeAttr("disabled");
		console.log("max limit reached");
	}
	else
	{
		//$("#ticketproceed").attr("title","Please Select no. of tickets first");
		//$("#titicketproceed").tooltip({track: true});
		
		
	$("#ticketproceed").attr("disabled","disabled");
	}

});

/*-------------------------------    Proceed Button Hover               --------------------------------------/*/
$(".proceedbutton").hover(function(e) {
   
	if($(this).children(".button_example").attr("disabled")=="disabled")
	{
		 //console.log("yess..!!!");
		/* if ($(".noty_type_information").length == 0){
		 infonoty('top','Please Select No. of Tickets You have Entered.Then Proceed');
		 }*/
		 $(this).tooltip({
      position: {
         using: function( position, feedback ) {
          $( this ).addClass('ui-tooltip');
         
        }
      }
    });
	}
});

/*-------------------------------    Proceed Button Hover               --------------------------------------/*/
		
	var hallticket_status;		
$("#ticketproceed").click(function(e) {
	//console.log(sel);
    //console.log("ticketproceed clicked");
	$(this).attr("disabled","disabled");
	$(".noty_type_information").hide();
	
	infonoty('top','Online Booking Is Closed.It Will Open at 4:30 PM at venue');
	/*
		if(Number(number)==max_ticket && max_ticket==sel.length)
		{
			
			
			/* $.ajax({
						url : 'getaction.php',
						method : 'POST',
						data : {action:"getbooked",seatno:sel},
						success: function(result){
							console.log(result);
							//activeTickets=result;
						}
       				 }) */
			
		/*	
			$.ajax({
						url : 'getaction.php',
						method : 'POST',
						data : {action:"setactive",seatno:sel},
						success: function(result){
							hallticket_status=result;
							//activeTickets=result;
							var count =0;
							 switch (hallticket_status) {
											case "error":
										 	errornoty('top','Sorry,Seats Not Avilable.Please Select Others');
											var timer = $.timer(function() {
												count++;
												//$('#main_container').load('loading.html');
											if(Number(count)>5){location.reload();}else{$('#main_container').load('loading.html');}
											});timer.set({ time : 1000, autostart : true }); 
											break;
											case "success":
											$('#main_container').load('loading.html');
											
											var timer = $.timer(function() {
												count++;
												
											if(Number(count)<5){
												$('#main_container').load('loading.html');
												
													}
													else{
														$('#main_container').load('ticket_user_info.php').fadeIn("slow");;
														//$("#wait").css('dispay','none');
														timer.stop();
														}
													
													});
											timer.set({ time : 1000, autostart : true }); 
											//$('#main_container').load('ticket_user_info.php');
											successnoty('top','Tickets Selected.Successfully Proceed');
											//infonoty('top','Tickets Selected.Successfully Proceed');
											break;
											}
							/* if(hallticket_status=="error")
								{
									console.log("in noty error");
									 errornoty('top','Sorry,Seats Not Avilable.Please Select Others');
								}
							if(hallticket_status=="success")
							{
								console.log("in noty success");
									successnoty('top','Tickets Selected.Successfully Proceed');
									$('#main_container').load('ticket_user_info.php');
							}	*/
							
			/*			}
       				 });
			//console.log("Yes..u r right..!!");
				 var count = 185;
			var timer = $.timer(function() {
				
				$('#counter').html(count);
				count--;
				$("#countdown").html(count);
				//console.log(count);
				if(Number(count)==5)
				{
					
					infonoty('top','Sorry.Your Time is going to expire.Please Reselect after reload..');
				}
				if(Number(count)==0)
				{
					
					location.reload();
				}
					
					/*
						$.ajax({
						url : 'getaction.php',
						method : 'POST',
						data : {action:"delactive",seatno:sel},
						success: function(result){
							console.log(result);
							//activeTickets=result;
						}
       				 })*/
		/*			
				
			});
			timer.set({ time : 1000, autostart : true });
				
			
		}
		
	*/
}); 

});

	function infopaypalnoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'information',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			timeout:false
        });
		$("#noty_top_layout_container li").css("background-color","#2784ea");
        console.log('html: ' + n.options.id);
    }
	
$(document).on("submit","#buyticketform",function(event) {
  //alert( "Handler for .submit() called." );
   event.preventDefault();
   $("#buyticket").attr("disabled","disabled");
   infopaypalnoty('top','Please Keep Patience.We are Redirecting to Paypal ');
   $('#main_container').load('loading.html');
 	
   var val=$(this).serialize();
   /*--- User is in paypal.So give 8 minutes....----    */
   $.ajax({
						url : 'getaction.php',
						method : 'POST',
						data : {action:"insidepaypal"},
						success: function(result){
							console.log(result);
							//activeTickets=result;
						}
       				 })
	/*--- User is in paypal.So give 8 minutes....----    */
	
	/*--- Paypal Redirection Auto After Buy Ticket Click......----    */				 
   $.ajax({
						url : 'step1.php',
						method : 'POST',
						data : {val:val},
						success: function(result){
													
							$('#main_container').html(result);
							$("#paypalform").submit();
							//activeTickets=result;
						}
       				 })
	/*--- Paypal Redirection Auto After Buy Ticket Click......----    */	
});


$(document).on("submit","#paytickettockenform",function(event) {
	event.preventDefault();
	var tokenval=$(this).serialize();
	console.log(tokenval);
	$("#main_container_payform").load("loading.html");
	 $.ajax({
						url : 'getaction.php',
						method : 'POST',
						data : {action:'checktoken',val:tokenval},
						success: function(result){
							
							//console.log(result);	
							if(result=="error")	
							{
								errornoty('top','Sorry,You have Entered Wrong Token No.');
									var count = 0;
									var timer = $.timer(function() {
									count++;									
									if(Number(count)==3)
									{
										location.reload();
									}});
									timer.set({ time : 1000, autostart : true });
				
							}	
							else
							{
								$("#main_container_payform").html(result);
							}			
							//$('#main_container').html(result);
							//$("#paypalform").submit();
							//activeTickets=result;
						}
       				 })
});

//var loader=$(document).load("loading.html");

$(document).on("submit","#customer_paypal_redirect",function(event) {
	event.preventDefault();
	$(".button_example").attr("disabled","disabled");
	//$("#main_container_payform").load("loading.html");
   //infopaypalnoty('top','Please Keep Patience.We are Redirecting to Paypal ');
   infopaypalnoty('top','Payment is Closed.Please Pay at Vanue');
   /* $.ajax({
						url : 'getaction.php',
						method : 'POST',
						data : {action:'customer_paypal_redirect'},
						success: function(result){
								//console.log(result);						
							$("#main_container_payform").html(result);
							$("#c_paypalform").submit();
							//activeTickets=result;
						}
       				 })*/
	
});

$(document).on(function(event) {
	if($("#paypalform").length != 0)
	{
	console.log("paypal___");
	}
	
});


  $(document).on("keypress",".tbxText",function (e) {
          /* if ((e.which < 97 || e.which > 122 )) {
        	 e.preventDefault();
	 }
	 if((e.which > 65 || e.which < 90))
	 {
		 //e.preventDefault();
		}
		
		
	*/if ((e.which < 97 || e.which > 122 ) ||(e.which > 65 || e.which < 90)) {
		//e.preventDefault()
	}
	else
	{
		// e.preventDefault();
	}
        });
		
  $(document).on("focus",".quantity",function (e) {
     $(this).mask("(999) 999-9999");
	 //if the letter is not digit then display error and don't type anything
	 
    /* if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
	 }*/
   });
</script>
</html>
