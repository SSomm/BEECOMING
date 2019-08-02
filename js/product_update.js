$(document).ready(function(){
	// alert("a");
	$(".product_delivery").focusin(function(){
		$(".delivery_info").show();
	});
	$(".delivery_info > p").click(function(){
		$(".product_delivery").val($(this).text());
		// alert($(this).text());
		// alert("a");
	});
	$(".product_delivery").focusout(function(){
		setTimeout(function(){
$(".delivery_info").hide();
		},100);
		
	});
	$(".delivery_info > p").mouseover(function(){
		$(this).css("background","#ddd");
	});
	$(".delivery_info > p").mouseleave(function(){
		$(this).css("background","white");
	});
	$(document).on("change",".product_count_insert",function(){
// alert($(this).val());
		if($(this).val() < 0){
			$(this).val("0");
		}
	});
	$(".product_price").on("keyup", function() {
    	$(this).val(addCommas($(this).val().replace(/[^0-9]/g,"")));
	});
	$(".product_sale").on("keyup", function() {
    	$(this).val($(this).val().replace(/[^0-9]/g,""));
	});

	 //상품 상세 카테고리 동적 추가
	 //폴더설정
	 var p_manage_cate;
	 var thumb_img_array=new Array();
	 var detail_img_array=new Array();



	 // alert($(".get_cate").text());
	 var get_cate = $(".get_cate").text();
	 if(get_cate == "clothes"){
	 	$('.product_select option[value=clothes]').attr('selected','selected');
	 }else if(get_cate == "shoe"){
	 	$('.product_select option[value=shoe]').attr('selected','selected');
	 }else if(get_cate == "jewels"){
	 	$('.product_select option[value=jewels]').attr('selected','selected');
	 }else if(get_cate == "fashion_acc"){
	 	$('.product_select option[value=fashion_acc]').attr('selected','selected');
	 }else if(get_cate == "makeup"){
	 	$('.product_select option[value=makeup]').attr('selected','selected');
	 }else if(get_cate == "perfume"){
	 	$('.product_select option[value=perfume]').attr('selected','selected');
	 }else if(get_cate == "diffuser"){
	 	$('.product_select option[value=diffuser]').attr('selected','selected');
	 }else if(get_cate == "flowers"){
	 	$('.product_select option[value=flowers]').attr('selected','selected');
	 }else if(get_cate == "tea"){
	 	$('.product_select option[value=tea]').attr('selected','selected');
	 }else{
	 	$('.product_select option[value=digital]').attr('selected','selected');
	 }



	 var p_manage_cate = $(".product_select option:selected").val();
	 // alert(p_manage_cate);
	 
	 setTimeout(function(){



$('#producnt_file-upload_backup').ssi_uploader({
	 	url: 'detail_img_upload.php',
	   			type:"POST",
	        	data:{"product_cate":p_manage_cate},

	        	onEachUpload: function (fileInfo) {
	            // console.log(fileInfo);
	            // alert(fileInfo.responseMsg);
	            detail_img_array.push(fileInfo.responseMsg);
	        	},
	        	
    });


	$('#thumbnail-upload_backup').ssi_uploader({
         url: 'upload.php',
	        type:"POST",
	        data:{"product_cate":p_manage_cate},

	        onEachUpload: function (fileInfo) {
	            // console.log(fileInfo);
	            // alert(fileInfo.name);
	            thumb_img_array.push(fileInfo.responseMsg);

	        }
    });


	 },100);

	 

	
	 
	
	$(".product_select").change(function(){
    	// var yearVal =  $(this).val();
    	var select = $(".product_select option:selected").text();
    	p_manage_cate=$(".product_select option:selected").val();;
    	// alert(select);
    	if(select == "의류" || select == "슈즈" || select == "패션소품" || select == "향수"){
    		$(".more_div").show();
    		$(".more_select>option").remove();
    		var default0 = "<option value='null'>선택하세요.</option>";
    		var optionman = "<option value='남성"+select+"'>남성"+select+"</option>";
    		var optionwoman = "<option value='여성"+select+"'>여성"+select+"</option>";
    		$(".more_select").append(default0);
    		$(".more_select").append(optionman);
    		$(".more_select").append(optionwoman);
    	}else{
    		$(".more_div").hide();
    	}

    	

});

	$(".product_select").one("change",function(){
		var detail_img_array=new Array();
			$(".thumbnail_div>.ssi-uploader").hide();
	    var p_manage_cate = $(".product_select option:selected").val();
		$('#thumbnail-upload').ssi_uploader({
	        url: './upload.php',
	        type:"POST",
	        data:{"product_cate":p_manage_cate},

	        onEachUpload: function (fileInfo) {
	            // console.log(fileInfo);
	            // alert(fileInfo.name);
	            thumb_img_array.push(fileInfo.responseMsg);

	        }
	    });
			$(".producnt_file_div>.ssi-uploader").hide();

	    	 $('#producnt_file-upload').ssi_uploader({
	      		url: 'detail_img_upload.php',
	   			type:"POST",
	        	data:{"product_cate":p_manage_cate},

	        	onEachUpload: function (fileInfo) {
	            // console.log(fileInfo);
	            // alert(fileInfo.responseMsg);
	            detail_img_array.push(fileInfo.responseMsg);
	        	},
	        	


	    });
	});




// alert(p_manage_cate);
	//할인율 자동처리
	$(".product_sale").focusout(function(){
		var onepirce = $(".product_price").val();
		var discountRate = $(this).val();
		var percent = (100-discountRate) / 100;
		var newprice = removeCommas(onepirce) * percent;
		$(".product_sale_success").val(addCommas(newprice));
	});


	//상품 옵션 처리
	$(document).on("change", ".product_more_option",function(){

			var option=$(this).children("option:selected").text();
			$(this).prop("option",option);

	});

	//섬네일 이미지 업로드
	 
	 //상품 상세이미지 등록하기

	 //상품 등록 버튼 누르기
	
	 $(document).on("click", ".producnt_insert_success", function(){
	 	//thumb_img_array, detail_img_array
	 	// alert(p_manage_cate);
	 	var product_brand=$(this).attr("data-name");
	 	var num=$(this).data("num");
	 	var pm_num=$(this).data("pmnum");
	 	// alert(product_brand);
	 	var id=$(this).attr("data-id");
	 	var product_name=$(".product_name").val();
	 	var product_brand=$(this).attr("data-name");
	 	var product_category=p_manage_cate;
	 	var detail_cate;

	 	if(product_category == "clothes" || product_category == "shoe" || product_category == "fashion_acc" || product_category == "perfume"){
	 			detail_cate=$(".more_select option:selected").val();
	 	}else{
	 			detail_cate=null;
	 	}
	 		
	 	var product_price=$(".product_price").val();
	 	var sale_percent=$(".product_sale").val();
	 	var product_drice=$(".product_sale_success").val();
	 	var product_delivery=$(".product_delivery").val();
	 	var product_exchange=$(".exchange_input").val();
	 	var product_refund=$(".refund_input").val();
	 	var product_desc=$(".prodcunt_guild_input").val();
	
	 	// var product_option=$(".product_more_option option:selected").val();
	 	// var product_detail1=$(".detail_opt1").val();
	 	// var product_detail2=$(".detail_opt2").val();
	 	// alert(product_option);

	 		var b=0;
	 		var c=0;
	 		var thumb_string="";
	 		var detail_string="";
	 		for (b in thumb_img_array){
	 				thumb_string=thumb_string+thumb_img_array[b]+',';
	 		}
	 		for (c in detail_img_array){
	 				detail_string=detail_string+detail_img_array[c]+',';
	 		} 
	 var product_option=new Array();
	 var product_detail1=new Array();
	 var product_detail2=new Array();
	 var product_quantity=new Array();
	 // alert(thumb_string);


	 		$.ajax({
	 				type:"POST",
	 				url:"./php/product_new_update.php",
	 				data:{thumb:thumb_string, detail:detail_string, p_name:product_name,
	 					p_cate:product_category, p_detailcate:detail_cate, p_price:product_price,
	 					s_percent:sale_percent, p_drice:product_drice, p_delivery:product_delivery, p_ex:product_exchange, p_refund:product_refund,
	 					p_desc:product_desc, p_brand:product_brand, num:num, pm_num:pm_num},

	 				success:function(response){
	 					var product_num=response;
	 					// alert(response);
	 					
	 					$(".product_more_option").each(function(){
	 						
	 							var status=$(this).prop("option");
	 							if(status){
	 								product_option.push($(this).prop("option"));	
	 							}	 							
	 						});
	 					$(".product_more").each(function(){
	 						// alert("a");
	 						product_detail1.push($(this).children(".detail_opt1").val());
	 						product_detail2.push($(this).children(".detail_opt2").val());
	 						// product_quantity.push($(this).children(".product_item_count").children(".product_count_insert").val());
	 					});
	 						// product_option.push($(this).children(".product_option").children(".product_more_option option:select").val());
	 						
	 					$(".product_item_count").each(function(){
	 						product_quantity.push($(this).children(".product_count_insert").val());
	 					});

	 					// for(var k = 0; k < product_quantity.length; k++){
	 					// 	alert(product_quantity[k]);
	 					// alert(product_option);
	 					// alert(product_detail1);
	 					// alert(product_detail2);
	 					// alert(product_quantity);
					// }
	 					$.ajax({
	 							type:"POST",
	 							url:"./php/option_update.php",
	 							data:{product_option:product_option, product_detail1:product_detail1,
	 							product_detail2:product_detail2, product_quantity:product_quantity, response:response, pm_num:pm_num},
	 							success:function(data){
	 								// alert(data);
	 								if(data=="success"){
										alert("상품 정보 수정 성공!");
										// location.reload();	
										location.href="./seller.php";					
									}else{
										// alert(data);
										alert("상품 정보 수정 실패!");
										return false;
									}
	 							}
	 	// 						error:function(request, status, error){
			// 	alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			// } 							
	 						})
	 				},error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			} 				

	 		})
	 });
	 

	
	//동적 추가 (상품 옵션 카테고리)
	$(document).on("click",".product_opiton_add",function(){
		var option_thi = $(this);
		// alert("a");
		$.get("option_add.php", function( data ) {
			  $( ".option_box" ).append(data);

			});
		});
	});

		// alert("aa");

function addCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
 
//모든 콤마 제거
function removeCommas(x) {
    if(!x || x.length == 0) return "";
    else return x.split(",").join("");
}
