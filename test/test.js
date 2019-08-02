$(document).ready(function () {
    // alert("a");
    $(".pdtList").css("display", "none");
    $(".section .pdtList").css("display", "block");
    $(".head-service").remove();
    $(".footer-wrap").remove();
    $(".overHidden").remove();
    $(".pdtFilterWrap").remove();
    $(".util-layer").remove();
    $(".gnb-wrap").remove();
    $("li:nth-child(1)").remove();
    $("li:nth-child(2)").remove();
    $("li:nth-child(3)").remove();
    $("li:nth-child(4)").remove();
    $("#text").remove();
    $(".pageWrapV15").remove();
    $(".section:nth-child(1)").remove();
    $(".section:nth-child(2)").remove();
    $(".crawl").click(function () {


        var i = 0;
        $(".pdtList > li").each(function () {
            // var img = $(this).children(".product_conts").children(".pub_photo").children("a").children("span").children("img").attr("src");
            // console.log("");
            i++;
        });
        // console.log(i);
        // alert(i);


        var imgarray = new Array(i);
        var a_array = new Array(i);
        var p_array = new Array(i);
        var d_array = new Array(i);
        var brandarray = new Array(i);
        var sale = new Array(i);
        var j = 0;
        $(".pdtList > li").each(function () {
            if (j == 43) {
                return false;
            }
            var img = $(this).children(".pdtBox").children(".pdtPhoto").children("a").children("img").attr("src");
            var brand = $(this).children(".pdtBox").children(".pdtInfo").children(".pdtBrand").children("a").text();
            var a = $(this).children(".pdtBox").children(".pdtInfo").children(".pdtName").children("a").text();
            var price = $(this).children(".pdtBox").children(".pdtInfo").children(".pdtPrice").children(".txtML").text();
            var drice = $(this).children(".pdtBox").children(".pdtInfo").children(".pdtPrice").children(".finalP").text();
            var sale_1 = $(this).children(".pdtBox").children(".pdtInfo").children(".pdtPrice").children(".cRd0V15").text();
            // console.log(img);
            imgarray[j] = img;
            brandarray[j] = $.trim(brand);
            a_array[j] = $.trim(a);
            p_array[j] = $.trim(price);
            d_array[j] = $.trim(drice);
            sale[j] = $.trim(sale_1);
            j++;
            // console.log(img);
        });
        $.ajax({
            type: "POST",
            data: {
                a: a_array,
                price: p_array,
                drice: d_array,
                sale: sale,
                imgarray: imgarray,
                brandarray: brandarray
            },
            url: "./db_insert.php",
            success: function (response) {
                alert(response);
            }

        });
        // alert(sale[0]);
    });
    $("a").removeAttr("onclick");
    //    $("a").on("click", function(e){
    //        e.preventDefault();
    //        e.stopPropagation();
    //    });
    //    
    $(document).on("click", "a", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var detail_address = $(this).attr("href");
//        alert(detail_address);
//        $.ajax
        location.href="test_detail.php?detail_address=http://www.10x10.co.kr/"+detail_address;
            
    });

        $(".details").on("click", function(){
                var product_price=new Array();
                var product_name=new Array();
                var sale_percent=new Array();
                var product_drice=new Array();
                var delivery=new Array();
                var detail_imgs=new Array();
                var k=0;
                // var aa="";           

                    // $(".pdtName").each(function(){
                        var name=$(".pdtName").text();
                        var price=$(".cBk0V15").text();

                        var sale;
                        sale=$.trim($(".cGr0V15").text()).split(" ");
                        // alert(sale[0]);  
                        // alert(sale[1]);     
                        var sale_cash=sale[0];
                        var sale_per=sale[1];    
                        var drice=$(".cGr0V15").text();
                        var deliveryinfo=$(".tPad10>table>tbody>tr:nth-child(1)>td").text();
                        var aa="";
                        $(".tPad10>table>tbody>tr>td>img").each(function(){
                            aa+= $(this).attr("src")+",";
                            });
                        var details=aa;
                        // alert(deliveryinfo);
                    // product_price[k]=price;
                    // product_name[k]=name;
                    // sale_percent[k]=sale_per;
                    // product_drice[k]=sale_cash;
                    // delivery[k]=deliveryinfo;
                    // detail_imgs[k]=details;
                    // k++;
                    // });
                     $.ajax({
                         type: "POST",
                          data: {
                            name: name,
                            price: price,
                            sale_per: sale_per,
                            drice: drice,
                            details:details,
                            sale_cash: sale_cash,
                            deliveryinfo: deliveryinfo
                            // details: details
                    },
                    url: "./db_insert_detail.php",
                    success: function (response) {
                        alert(response);
                    }

        });

        });

        $(".detail_imgs").on("click", function(){

            // var details=$(".pdtName").text();
            // alert(details);
            $(".pdtName").each(function(){
                var product_name=$(this).text();
                // alert(product_name);
                var details=$(".text").text();
                // alert(details);
            });
                 $.ajax({
                         type: "POST",
                          data: {
                            product_name:product_name,
                            details:details
                    },
                    url: "./db_update_detailimg.php",
                    success: function (response) {
                        alert(response);
                    }

        }); 



        });
        $(".tPad05").css("display", "none");
        $(".pdtBrand").css("display","none");
    //

});
