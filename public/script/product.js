
$(document).ready(function(){
    
    $("#search").click(function() { 
        var width  = $( ".main" ).css( 'width');
        var mheight = $( ".product_top" ).css( 'height');
        mheight = mheight.split('px');
        var pheight = $( ".product_view" ).css( 'height');  
        pheight = pheight.split('px');
        var totalheight = parseInt(pheight[0]) + parseInt(mheight[0]);

        // 자료형 변형 해줘야함
        $('.layered').css('width', width);
        $('.layered').css('height', totalheight);
        $('.layered').css( 'background-color', 'black' );
        $('.layered').animate({opacity:"0.6"}, -100);
        
    });

    $(document).click(function(e){ 
        if(e.target.id != "search"){
            $('.layered').css('width', 0);
            $('.layered').css('height', 0);
            $('.layered').css( 'background-color', '' );
        } 
    });

    // popover close
    $(document).click(function(e){ 
        if(e.target.className != "fa fa-list-ul fa-2x"){
            $('.popover').popover('hide');
        } 
    });



    //  search 
    $("#search").keyup(function(event) { 
        var url    = window.location.href;
        var urlArr = url.split('/');
        var text   = $("#search").val();
        
        if (event.keyCode == 13) {
            if(urlArr.length == 4) {
                window.location.href = 'product/search?product=' + text;
            }else {
                window.location.href = 'search?product=' + text;
            }
            return;
        }
    });

 

    $('#loginbutton').click(function() {
        var customerId = $('#loginId').val();
        var customerPassword = $('#loginPassword').val();

        // ajax --start
        $.ajax({
            url : 'login'

            , type : 'post'
            , data : {
                customerId : customerId,
                customerPassword : customerPassword
            }
            , datetype : 'JSON'
            , success : function(res){
                
                var ss = JSON.parse(res);
                    
                if(res == "0") {
                    alert("nono");
                }else { 
                    $('#myModal').modal('hide');

                    location.reload();

                }
            }   
            , error : function(){
                alert('Error');
            }
        });
    });

	$('#orderCheckButton').click(function() {
		var checkOrderNumber = $('#checkOrderNumber').val();

		// ajax --start
		$.ajax({
			url : 'orderNumberCheck'

			, type : 'post'
			, data : {
				checkOrderNumber : checkOrderNumber
			}
			, success : function(res){

				if(res == "0") {
					var content = "該当の注文番号はありません。";
					$('.alertMessage').html(content);
					return false;
				}else {
					$('#checkOrder').modal('hide');
					$('#checkOrderModal').modal('show');
					$('#checkOrderNumber').val("");
					$('.alertMessage').html("");

					var res = JSON.parse(res);

					for(var i = 0; i<res.orderData.length; i++){
						var content = "";
						content += '<div class="cart-body-right-body">';
						content += '<div class="info-price">';
						content += '<div id="" class="order-list-product-container">';
						content += '<div id="" class="order-list-container-left">';
						content += '<img src=' + res.orderData[i].src + '></div>';
						content += '<div class="order-list-container-right">';
						content += '<div class="order-name">'+res.orderData[i].name+'</div>';
						content += '<div class="order-size">'+res.orderData[i].order_size+'</div>';
						content += '<div class="order-qty">'+res.orderData[i].order_qty+'</div>';
						content += '<div class="order-price">'+res.orderData[i].price+'</div>';
						content += '</div></div></div></div>';
						$('.orderCheckContent').append(content);
					}
				}
			}
			, error : function(){
				alert('Error');
			}
		});
	});

	$('.closeCheckOrder').click(function(){
		$('.orderCheckContent *').remove();
		$('#checkOrderModal').modal('hide');
	});
});



// toggle flag 
    // var toggleFlag = true;
    // $('.testbutton').click(function() {
    //     alert(1)
    //     // toggle flase width change 
    //     if ( toggleFlag == false) {  
    //         $('.product_view').width('86%'); 
    //     }
    //     $('.product_menu').toggle(300, function () {
    //         // toggle true width change 
    //         if ( toggleFlag == true) {
    //             toggleFlag = false;
    //             $('.product_view').width('100%');
    //             // $('.testbutton').html('<i class="fas fa-toggle-off fa-2x">');                 
    //         } else {
    //             toggleFlag = true;
    //         }
    //     });
    // });

function logout() {

    $.ajax({
        url : 'logout'

        , type : 'post'
        , datetype : 'JSON'
        , success : function(res){
            location.replace('/funnyec/product');
        }   
        , error : function(){
            alert('Error');
        }
    });
}


// Select Menual Event 
function selectMenual(id) {
    var productName = $('#' + id).attr('value');

    $(".product_top").load("../funnyec/application/views/public/product_top_test.php");
    $(".product_top").height('130px');
    
    // ajax --start
    $.ajax({
        url : 'productload'

        , type : 'post'
        // , type : 'get'
        , data : {
            productType: productName,
        }
        , datetype : 'JSON'
        , success : function(res){
            
            // alert(res)
            $('#product_a_name').text("/ " + productName);
            $('#product_top_second_kind').text(productName + "'s シューズ");
            $('.product_menu').width('10%');
            $('.product_view').width('86%');
          
            var parsingData = JSON.parse(res);
            
            var productElement = "";
            // var productMenu    = '<div class="menu-total" id=' + productName + ' onclick=selectCategory(id) disabled>' + productName + '</div>';
            var productMenu    = '<div class="menu-total" id=' + productName + ' >' + productName + '</div>';

            parsingData.menu.forEach(function (item) {
                productMenu   += '<div class="menu-sub" id=' +item.name + ' onclick=selectCategory(id)>' + item.name + '</div>';
            });
            
            
            parsingData.view.forEach(function (item) {
                productElement += '<div class="product_view_container">';
                productElement += '    <div class="product_view_container_piture" onclick=productInfoPageGo(' + item.code + ')>';
                productElement += '        <img src="' + item.src + '" alt="default"></img>';
                productElement += '    </div>';
                productElement += '    <div class="product_view_container_display">';
                productElement += '        <div class="product_info">';
                productElement += '            <span>' + item.name + '</span>';
                productElement += '        </div>';
                productElement += '    <div class="product_price"> ' + item.price + '</div>';
                productElement += '    </div>';
                productElement += '</div>';
            });

            

            // main page
            $('.product_menu').html(productMenu);
            $('.product_view').html(productElement);

            // sub page
            $('.product_info_menu').html(productMenu);
            $('.productinfo_view').html(productElement);

            // main-cate order by
            $('.product_view').append('<div class="product_code_hidden"  id="main_' + parsingData.orderby[0].num + '" hidden></div>');
            $('.productinfo_view').append('<div class="product_code_hidden"  id="main_' + parsingData.orderby[0].num + '" hidden></div>');
        }   
        , error : function(){
            alert('Error');
        }
    });
}


function selectCategory(id) {
    
    var selectId = id;
    
    $.ajax({
        url : 'selectCategory'

        , type : 'post'
        // , type : 'get'
        , data : {
            categoryType : selectId,
        }
        , datetype : 'JSON'
        , success : function(res){
            $( ".product_menu > div" ).css( "font-weight", 500 );
            $( ".product_info_menu > div" ).css( "font-weight", 500 );
            $('#' + id).css('font-weight', 'bold');
          
            var parsingData = JSON.parse(res);
            
            var productElement = "";
            
            parsingData.view.forEach(function (item) {
                productElement += '<div class="product_view_container">';
                productElement += '    <div class="product_view_container_piture" onclick=productInfoPageGo(' + item.code + ')>';
                productElement += '        <img src="' + item.src + '" alt="default"></img>';
                productElement += '    </div>';
                productElement += '    <div class="product_view_container_display">';
                productElement += '        <div class="product_info">';
                productElement += '            <span>' + item.name + '</span>';
                productElement += '        </div>';
                productElement += '    <div class="product_price"> ' + item.price + '</div>';
                productElement += '    </div>';
                productElement += '</div>';
            });
            // main page
            $('.product_view').html(productElement);


            // sub page
            $('.productinfo_view').html(productElement);

            // main-cate order by
            $('.product_view').append('<div class="product_code_hidden"  id="sub_' + parsingData.orderby[0].num + '" hidden></div>');
            $('.productinfo_view').append('<div class="product_code_hidden"  id="sub_' + parsingData.orderby[0].num + '" hidden></div>');

        }   
        , error : function(){
            alert('Error');
        }
    });
}


// 상품 상세 페이지 이동
function productInfoPageGo(num) {
    var infoPage = num;
    location.href = "/funnyec/productInfo?productCode=" + infoPage;
}

// 카트 페이지 이동
function cartPageGo() {
    location.href = "/funnyec/cartPageGo";
}


// 토글 
var toggleFlag = true;
function toggle() {
    //toggle flag 
    if ( toggleFlag == false) {  
        $('.product_view').width('86%');
        $('.productinfo_view').width('86%'); 
        $('.testbutton').html('<i class="fa fa-toggle-on fa-2x"></i>'); 
        
    }

    // 상품 페이지 에서 토글
    $('.product_menu').toggle(300, function () {
        // toggle true width change 
        if ( toggleFlag == true) {
            toggleFlag = false;
            $('.product_view').width('100%');
            $('.testbutton').html('<i class="fa fa-toggle-off fa-2x">');           
            // $('.productinfo_view').width('100%'); 
        } else {
            toggleFlag = true;
        }
    });
    
    // 상품 상세 페이지 -> 상품 페이지 토글
    $('.product_info_menu').toggle(300, function () {
        // toggle true width change 
        if ( toggleFlag == true) {
            toggleFlag = false;
            // $('.product_view').width('100%');
            $('.productinfo_view').width('100%'); 
            $('.testbutton').html('<i class="fa fa-toggle-off fa-2x">');           
        } else {
            toggleFlag = true;
        }
    });
}



$('.fa-angle-down').click(function () {
    alert(2);
})

function sortpopover() {
    $('[data-toggle="popover"]').popover();  
}

function orderby(id) {
    var orderby = id;
    var cate    = $('.product_code_hidden').attr('id');
    var colum   = cate.split('_');

    $.ajax({
        url : 'orderbyView'

        , type : 'post'
        // , type : 'get'
        , data : {
            orderby  : orderby,
            colum1   : colum[0],
            colum2   : colum[1],
        }
        , datetype : 'JSON'
        , success : function(res){
           

            // $( ".product_menu > div" ).css( "font-weight", 500 );
            // $( ".product_info_menu > div" ).css( "font-weight", 500 );
            // $('#' + id).css('font-weight', 'bold');
          
            var parsingData = JSON.parse(res);
            console.log(res)
            var productElement = "";
            
            parsingData.view.forEach(function (item) {
                productElement += '<div class="product_view_container">';
                productElement += '    <div class="product_view_container_piture" onclick=productInfoPageGo(' + item.code + ')>';
                productElement += '        <img src="' + item.src + '" alt="default"></img>';
                productElement += '    </div>';
                productElement += '    <div class="product_view_container_display">';
                productElement += '        <div class="product_info">';
                productElement += '            <span>' + item.name + '</span>';
                productElement += '        </div>';
                productElement += '    <div class="product_price"> ' + item.price + '</div>';
                productElement += '    </div>';
                productElement += '</div>';
            });
            // main page
            $('.product_view').html(productElement);


            // sub page
            $('.productinfo_view').html(productElement);

            if( typeof(parsingData.order.main) != 'undefined') {
                $('.product_view').append('<div class="product_code_hidden"  id="main_' + parsingData.order.main + '" hidden></div>');
                $('.productinfo_view').append('<div class="product_code_hidden"  id="main_' + parsingData.order.main + '" hidden></div>');
            }else {
                // main-cate order by
                $('.product_view').append('<div class="product_code_hidden"  id="sub_' + parsingData.order.sub + '" hidden></div>');
                $('.productinfo_view').append('<div class="product_code_hidden"  id="sub_' + parsingData.order.sub + '" hidden></div>');
            }

        }   
        , error : function(){
            alert('Error');
        }
    });
} 

function managePageGo(){
    location.href = "/funnyec/managePageGo";
}



