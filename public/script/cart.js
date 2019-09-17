$(document).ready(function(){
    var shippingCondition = $('#freeShipping').text();
    var totalPrice = $('#totalprice').text();
    var totalPriceOri = totalPrice.slice(0,-1);
    totalPriceOri *= 1; //string to Number
    
    if(shippingCondition　!== "送料無料"){
        totalPriceOri = totalPriceOri+500+"円";
        $('#totalWithShipping').html(totalPriceOri);
    }
});
function totalDeleteCart() {
    $.ajax({
        url : 'totalDeleteCart'

        , type : 'post'
        , datetype : 'JSON'
        , success : function(res){
            window.location.reload();
        }   
        , error : function(){
            alert('Error');
        }
    });
}

function selectDeleteCart(id) {
   
    var rowid = id;

    $.ajax({
        url : 'deleteCart'

        , type : 'post'
        , data : {
            rowid   : rowid,
        }
        , datetype : 'JSON'
        , success : function(res){
            window.location.reload();
        }   
        , error : function(){
            alert('Error');
        }
    });

} 

function optionChangeModal(id, name) {

    var rowid = name;
    var code  = id;

    var cart  = 1;

    $('#cartModal').modal('show');

    $.ajax({
        url : 'productInfo'

        , type : 'get'
        , data : {
            productCode   : code,
            pageCheck     : cart,
        }
        // , datetype : 'JSON'
        , success : function(res){

            var jsonData    = JSON.parse(res);
            var sizeElement = "";
            
            $('.left-picture img').attr('src', jsonData['info'][0].src);
            $('.product_cate').html(jsonData['info'][0].mname.toUpperCase() + '&nbsp&nbsp' + jsonData['info'][0].sname);
            $('.product_cate').append('<div id="rowId" hidden>' + rowid + '</div>');
            $('.product_price').html(jsonData['info'][0].price + '&nbsp￥');
            $('.product_title').html(jsonData['info'][0].name);
            $('.product_code').html(jsonData['info'][0].code);
            
            var i = 1;
            jsonData.size.forEach(function (item) {
                // productMenu   += '<div class="menu-sub" id=' +item.name + ' onclick=selectCategory(id)>' + item.name + '</div>';]
                
                sizeElement += '<button type="button" id="size' + i + '" onclick="sizeCheck(id)" class="btn btn-light">' + item['size'] + '</button>';
                i++;
                
            });

            $('.size_button').html(sizeElement);

            
        }   
        , error : function(){
            alert('Error');
        }
    });  
}

function optionChange() {

    var rowId = $('#rowId').text();
    var src   = $('.left-picture img').attr('src');
    var qty   = $('.product_count_text').val();
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
        url : 'optionChange'

        , type : 'post'
        , data : {
            rowid   : rowId,
            qty     : qty,
            src     : src,
            size    : size
        }
        , datetype : 'JSON'
        , success : function(res){
            //  modal close;
            $('#cartModal').modal('hide');

            window.location.reload();
            
        }   
        , error : function(){
            alert('Error');
        }
    });
}

function gotoshopping() {
    window.location.href = "/funnyec/product";
}

function cartOrderPage() {
    window.location.href = '/funnyec/cartOrderPage';
    
}



