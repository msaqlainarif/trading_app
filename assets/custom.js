
function deleteItem(elem){
	$(elem).closest("tr").remove();
}
function generate_purchase_invoice(baseUrl){
  
	
   var flag = true;

    $("#po_form .required").each(function () {

        if (($.trim($(this).val()) == "" || $(this).val() == 0) && $(this).attr("disabled") != "disabled") {

            if (!$(this).hasClass("error_fill"))

                $(this).addClass("error_fill");

            flag = false;


            }else{
    			$(this).removeClass("error_fill");
			}
    });
	
	if(flag){
	  var arr = [];
		$("#po_table tbody tr").each(function(){
            arr.push($(this).find(".item").val()+'-'+$(this).find(".quantity").val()+'-'+$(this).find(".price").val()+'-'+$(this).find(".disc_per").val()+'-'+$(this).find(".disc_value").val()+'-'+$(this).find(".value").val());
		});
		var objdata=new Object();
		objdata.po_items=arr;
		objdata.po_date=$("#po_date").val();
		objdata.party_id=$("#party_id").val();
		objdata.ref_no=$("#ref_no").val();
		objdata.remarks=$("#remarks").val();
		 $.ajax({

			type: 'POST',

			url: baseUrl+'salepurchase/generate_purchase_invoice',

			data: 'json_data='+JSON.stringify(objdata),

			dataType: 'json',

			success: function( data ) {
				
				var msg="Purchase invoice generated successfully ("+data.pur_id+"). <a href='javascript:void();' onClick='print_page();'>Click here</a> for printout.";
				$(".alert_div").show();
				$(".msg_div").html(msg);
				//displayMessage(msg);
				$('#po_form')[0].reset();
				//window.location=baseUrl+'salepurchase/ListPurchaseInvoice';
				
			},

			error: function(xhr, status, error) {

			//alert(status);

			},


		});
	}
}
function calculateDiscount(ele) {
   var rowID = $("#"+ele.id).closest('tr').attr('id');
   var distypeID = $("#"+rowID).find('.distype').attr('id');
   var DisID = $("#"+rowID).find('.discount').attr('id');
   var valID = $("#"+rowID).find('.value').attr('id'); 
   var disType=$("#po_table tbody tr#"+rowID+" #"+distypeID+"").val();
   var discount=$("#po_table tbody tr#"+rowID+" input#"+DisID+"").val();
   var value=$("#po_table tbody tr#"+rowID+" input#"+valID+"").val();
   var finalVal=0;
  // alert(value+"-"+discount);
   if(disType=="%"){
	   
	   	var val=parseFloat(value)*(parseFloat(discount)/100);
		//alert(val);
		//alert('sfd');
   		finalVal=parseFloat(value)-parseFloat(val);
   }else{
		finalVal=parseFloat(value)-parseFloat(discount);
	}
	alert(finalVal);
	if(isNaN(finalVal)==true){
   		$("#po_table tbody tr#"+rowID+" input#"+valID+"").val(finalVal);
	}
   GetOverallTotal();
}
 
function CalculateVal(ele){
	var rowID = $("#"+ele.id).closest('tr').attr('id'); 
	var inputID = $("#"+rowID).find('.value').attr('id'); 
	var QID = $("#"+rowID).find('.quantity').attr('id');
	var PID = $("#"+rowID).find('.price').attr('id'); 
	var quantity=$("#po_table tbody tr#"+rowID+" input#"+QID+"").val();
	var price=$("#po_table tbody tr#"+rowID+" input#"+PID+"").val();
	var result=parseInt(price)*parseInt(quantity);
	$("#po_table tbody tr#"+rowID+" input#"+inputID+"").val(result);
	GetOverallTotal();
}

function GetOverallTotal(){
	var total=0;
	$("#po_table tbody tr").each(function(){
         total += parseInt($(this).find(".value").val());
	});
	//alert(total);
	$("#total").html(total);
}
function displayMessage(msg){
$.growl({
        message: msg
    }, {
        position: {
            from: "bottom",
            align: "left"
        },
        delay: 80000
 });
}

function print_page(){
	$(".page-content").printThis();
}