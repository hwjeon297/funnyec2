$(document).ready(function(){
    $('.product_count_text').prop('disabled', true);
       $(document).on('click','#plus',function(){
        $('.product_count_text').val(parseInt($('.product_count_text').val()) + 1 );
    });
    $(document).on('click','#minus',function(){
        $('.product_count_text').val(parseInt($('.product_count_text').val()) - 1 );
            if ($('.product_count_text').val() == 0) {
                $('.product_count_text').val(1);
            }
    });
 });

 function sizeCheck(id) {

    var buttonId = id;
    var count = $( '.size_button' ).children().length;

    var backgroundColor = $("#" + buttonId).css("background-color");
    
    $("#" + buttonId).css("color", "white");
    $("#" + buttonId).css("background-color", "black");
    
    // 똑같은거 눌렀을 시 다시 빼기
    if( backgroundColor == "rgb(0, 0, 0)" ) {
        $("#" + buttonId).css("background-color", "white");
        $("#" + buttonId).css("color", "black");
        return;
    }

    // 새로운 사이즈 넣기
    for (let index = 1; index <= count; index++) {

        var backgroundColor = $("#size" + index).css("background-color");

        if( "size" + index != id ) {
            $("#size" + index).css("background-color", "white");
            $("#size" + index).css("color", "black");
        }
    }
 }

 // cart 
 function insertCart() {

    // code, qty, price, name, option(size)
    var code  = $('.product_code').text();
    var qty   = $('.product_count_text').val();
    var price = $('.product_price_hidden').text();
    var name  = $('.product_title').text();
    var img   = $('.productinfo_view_container_picture_img img').attr("src");
    var count = $('.size_button').children().length;


    for (let index = 1; index <= count; index++) {

        var backgroundColor = $("#size" + index).css("background-color");

        if( backgroundColor == "rgb(0, 0, 0)" ) {
            var size = $("#size" + index).text();
        }
    }

    // sizeがない場合
    if(!size) return alert("サイズを選択してください");


    $.ajax({
        url : 'insertCart'

        , type : 'post'
        , data : {
            code    : code,
            qty     : qty,
            price   : price,
            name    : name,
            img     : img,
            size    : size,
        }
        , datetype : 'JSON'
        , success : function(res){

            if(res) return alert("カートに入れました");

        }   
        , error : function(){
            alert('Error');
        }
    });

 }

// 상품 주문이 하나일 경우
 function orderGo() {
    
    // code, qty, price, name, option(size)
    var code  = $('.product_code').text();
    var qty   = $('.product_count_text').val();
    var price = $('.product_price_hidden').text();
    var name  = $('.product_title').text();
    var img   = $('.productinfo_view_container_picture_img img').attr("src");
    var count = $('.size_button').children().length;


    for (let index = 1; index <= count; index++) {

        var backgroundColor = $("#size" + index).css("background-color");

        if( backgroundColor == "rgb(0, 0, 0)" ) {
            var size = $("#size" + index).text();
        }
    }

    // sizeがない場合
    if(!size) return alert("サイズを選択してください");
    
    var ll = {
        code    : code,
        qty     : qty,
        price   : price,
        name    : name,
        img     : img,
        size    : size,
    }
    
    window.location.href = '/funnyec/orderPage?code=' + code + '&qty=' + qty + '&price=' + price + '&name=' + name + '&img=' + img + '&size=' + size;
   
 }