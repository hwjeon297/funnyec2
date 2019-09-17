var check1 = false;
var check2 = false;
var check3 = false;

function stepOne() {
    // validate check
    // email form check 
    var email      = $('#order-email').val().length;
    var phone      = $('#order-phone').val().length;
    var emailValue = $('#order-email').val();
    var phoneValue = $('#order-phone').val();

    if(email <= 0 || phone <= 0) return alert("Email OR Phone Check!");  

    // value -> new div
    var newbody   = '<div class="stepOne-form">';
    newbody      += '   <div class="stepOne-form-left">';
    newbody      += '       <div id="emailValue">' + emailValue + '</div>';
    newbody      += '       <div id="phoneValue">' + phoneValue + '</div>';
    newbody      += '   </div>';
    newbody      += '   <div class="stepOne-form-right">';
    newbody      += '       <button class="modify-button" onclick="stepOneModify()">change</button>';
    newbody      += '   </div>';
    newbody      += '</div>';

    // step one header
    $('.checkOne-email').html(emailValue);
    $('#oneCheckIcon').show();

    //  step one body And Footer
    $('.ep-container').html(newbody);
    $('.ep-container').hide();
    $('.order-body-left-footer-one').hide();

    //  Step One true
    check1 = true;

    // step two gogo -> 유효성 검사 2나 3이 들어가있으면 확인
    if(!check2) {
        $('.order-checkTwo-value').show();
        $('.recipient-email').show();
        $('.recipient-phone').show();
        $('.destination-form').show();
        $('.memo').show();
        $('.order-body-left-footer-two').show();
        return;
    }

    if(!check3) {
        $('#three').show();
        $('.order-body-left-footer-three').show();
    }
    
}

function stepOneFolder() {
    $('.ep-container').toggle('fast');
}

function stepOneModify() {

    var newbody   = '<div class="email">';
    newbody      += '    <div class="email-title">Email</div>';
    newbody      += '    <div class="email-form">';
    newbody      += '       <input type="email" class="form-control" id="order-email" placeholder="name@example.com">';
    newbody      += '    </div>';
    newbody      += '</div>';
    newbody      += '<div class="phone">';
    newbody      += '    <div class="phone-title">Phone</div>';
    newbody      += '    <div class="phone-form">';
    newbody      += '       <input type="tel" class="form-control" id="order-phone" data-parsley-pattern="^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$"  placeholder=" `-` excluding">';
    newbody      += '    </div>';
    newbody      += '</div>';

    

    // step one header
    $('.checkOne-email').html("");
    $('#oneCheckIcon').hide();
    
    $('.ep-container').html(newbody);
    $('.order-body-left-footer-one').show();

    // step two  
    if(!check2) {
        $('.order-checkTwo-value').hide();
        $('.recipient-email').hide();
        $('.recipient-phone').hide();
        $('.destination-form').hide();
        $('.memo').hide();
        $('.order-body-left-footer-two').hide();
    }
    

    if(!check3) {
        $('#three').hide();
        $('.order-body-left-footer-three').hide();
    }
}


function stepTwo() {

    var recipientName  = $('#recipient-name').val();
    var recipientPhone = $('#recipient-phone').val();

    var select = document.getElementById('selectAdd');
    var destination1 = select.options[select.selectedIndex].value;
    var destination2 = $('#destinationD').val();
    
    var memo = $('#memo').val();

    if(recipientName.length <= 0 || recipientPhone.length <= 0 || destination1.length <= 0 || destination2.length <= 0 || memo.length <= 0) return alert("チェックしてください");
    
    var newbody   = '<div class="steptwo-form">';
    newbody      += '   <div class="steptwo-form-left">';
    newbody      += '       <div id="recipientNameValue">' + recipientName + '</div>';
    newbody      += '       <div id="recipientPhoneValue">' + recipientPhone + '</div>';
    newbody      += '       <div id="destinationValue">' + destination1 + '&nbsp' +  destination2 + '</div>';
    newbody      += '       <div id="memoValue">' + memo + '</div>';
    newbody      += '   </div>';
    newbody      += '   <div class="steptwo-form-right">';
    newbody      += '       <button class="modify-button" onclick="stepTwoModify()">change</button>';
    newbody      += '   </div>';
    newbody      += '</div>';
    

    // step two header show
    $('.checkTwo-destination').html(destination1 + "&nbsp" + destination2);
    $('#twoCheckIcon').show();

    //  step two body And Footer hide
    $('.recipient-container').html(newbody);
    $('.recipient-container').hide();
    $('.recipient-email').hide();
    $('.recipient-phone').hide();
    $('.destination-form').hide();
    $('.memo').hide();
    $('.order-body-left-footer-two').hide();

    check2 = true;

    if(!check3) {
        $('#three').show();
        $('.order-body-left-footer-three').show();
    }

    
}

function stepTwoFolder() {
    $('.recipient-container').toggle('fast');
}

function stepTwoModify() {

    var newbody   = '<div class="recipient-container">';
    newbody      += '<div class="recipient-email">';
    newbody      += '    <div class="email-title">Recipient Name</div>';
    newbody      += '    <div class="email-form">';
    newbody      += '       <input type="text" class="form-control" id="recipient-name" placeholder="Recipient Name">';
    newbody      += '    </div>';
    newbody      += '</div>';
    newbody      += '<div class="recipient-phone">';
    newbody      += '    <div class="phone-title">Recipient Phone</div>';
    newbody      += '    <div class="phone-form">';
    newbody      += '       <input type="tel" class="form-control" id="recipient-phone" data-parsley-pattern="^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$" placeholder=" `-` excluding">';
    newbody      += '    </div>';
    newbody      += '</div>';
    newbody      += '</div>';

    var newbody2   = '<div class="destination-form">';
    newbody2      += '    <select name="add" id="selectAdd" class="form-control">';
    newbody2      +=            '<option value="" selected>-- 都道府県 --</option>';
    newbody2      +=            '<option value="北海道">北海道</option>';
    newbody2      +=            '<option value="青森県">青森県</option>';
    newbody2      +=            '<option value="岩手県">岩手県</option>';
    newbody2      +=            '<option value="宮城県">宮城県</option>';
    newbody2      +=            '<option value="秋田県">秋田県</option>';
    newbody2      +=            '<option value="山形県">山形県</option>';
    newbody2      +=            '<option value="福島県">福島県</option>';
    newbody2      +=            '<option value="茨城県">茨城県</option>';
    newbody2      +=            '<option value="栃木県">栃木県</option>';
    newbody2      +=            '<option value="群馬県">群馬県</option>';
    newbody2      +=            '<option value="埼玉県">埼玉県</option>';
    newbody2      +=            '<option value="千葉県">千葉県</option>';
    newbody2      +=            '<option value="東京都">東京都</option>';
    newbody2      +=            '<option value="神奈川県">神奈川県</option>';
    newbody2      +=            '<option value="新潟県">新潟県</option>';
    newbody2      +=            '<option value="富山県">富山県</option>';
    newbody2      +=            '<option value="石川県">石川県</option>';
    newbody2      +=            '<option value="福井県">福井県</option>';
    newbody2      +=            '<option value="山梨県">山梨県</option>';
    newbody2      +=            '<option value="長野県">長野県</option>';
    newbody2      +=            '<option value="岐阜県">岐阜県</option>';
    newbody2      +=            '<option value="静岡県">静岡県</option>';
    newbody2      +=            '<option value="愛知県">愛知県</option>';
    newbody2      +=            '<option value="三重県">三重県</option>';
    newbody2      +=            '<option value="滋賀県">滋賀県</option>';
    newbody2      +=            '<option value="京都府">京都府</option>';
    newbody2      +=            '<option value="大阪府">大阪府</option>';
    newbody2      +=            '<option value="兵庫県">兵庫県</option>';
    newbody2      +=            '<option value="奈良県">奈良県</option>';
    newbody2      +=            '<option value="和歌山県">和歌山県</option>';
    newbody2      +=            '<option value="鳥取県">鳥取県</option>';
    newbody2      +=            '<option value="島根県">島根県</option>';
    newbody2      +=            '<option value="岡山県">岡山県</option>';
    newbody2      +=            '<option value="広島県">広島県</option>';
    newbody2      +=            '<option value="山口県">山口県</option>';
    newbody2      +=            '<option value="徳島県">徳島県</option>';
    newbody2      +=            '<option value="香川県">香川県</option>';
    newbody2      +=            '<option value="愛媛県">愛媛県</option>';
    newbody2      +=            '<option value="高知県">高知県</option>';
    newbody2      +=            '<option value="福岡県">福岡県</option>';
    newbody2      +=            '<option value="佐賀県">佐賀県</option>';
    newbody2      +=            '<option value="長崎県">長崎県</option>';
    newbody2      +=            '<option value="熊本県">熊本県</option>';
    newbody2      +=            '<option value="大分県">大分県</option>';
    newbody2      +=            '<option value="宮崎県">宮崎県</option>';
    newbody2      +=            '<option value="鹿児島県">鹿児島県</option>';
    newbody2      +=            '<option value="沖縄県">沖縄県</option>';
    newbody2      += '       </select>';
    newbody2      += '    <div class="destination-input">';
    newbody2      += '       <input type="text" class="form-control" id="destinationD" placeholder="Put in the rest of the address.">';
    newbody2      += '    </div>';
    newbody2      += '</div>';


    var newbody3   = '<div class="memo">';
    newbody3      += '    <div class="email-title">MEMO</div>';
    newbody3      += '    <input type="text" class="form-control" id="memo" placeholder="Please enter a delivery note.">';
    newbody3      += '</div>';

    var newbody4   = '<div class="order-body-left-footer-two" hidden>';
    newbody4      += '    <button class="order-botton-destination" onclick="stepTwo()">Agree and proceed to the next sound step</button>';
    newbody4      += '</div>';

    

    // step one header
    $('.checkTwo-destination').html("");
    $('#twoCheckIcon').hide();
    
    $('#two').html(newbody)
    $('#two').append(newbody2)
    $('#two').append(newbody3)

    $('.order-body-left-footer-two').show();

    // step hide
    // step three  hide
    $('#three').hide();
    $('.order-body-left-footer-three').hide();
}

function selectPayment(obj) {
    $('.payment-method-form').removeClass('select-payment');
    $('.payment-method-form i').hide();

    $('#' + obj.id + "i").show();
    $("#" + obj.id).addClass('select-payment');
}

function stepThree() {
    
    var selectButton    = $('.payment-container').children('.select-payment').length;
    var selectButtonId  = $('.payment-container').children('.select-payment').attr("id");
    var orderCheckBox   = $('#orderCheckBox').is(':checked'); 
    
    if(selectButton <= 0 || orderCheckBox != true) return alert("決済1方法とチェックボックスを確認してください。");

    // 모든 정보들 들고 가야함 
    // id값도 히든에 넣어줘야함 없을 시 1로 지정 
    var member      = $('.userId-hidden').text();
    var email       = $('#emailValue').text();
    var phone       = $('#phoneValue').text();
    var reName      = $('#recipientNameValue').text();
    var rePhone     = $('#recipientPhoneValue').text();
    var destination = $('#destinationValue').text();
    var memo        = $('#memoValue').text();
    var payment     = $('.select-payment button').text();
    var money       = $('#checkThreeButtonId').attr("name");
    
    var code = $('.order-code-hidden').text();
    var size = $('.order-size-hidden').text();
    var qty = $('.order-qty-hidden').text();
    console.log(code + size + qty);
    console.log(code);
    code = code.split('-');
    size = size.split('-');
    qty = qty.split('-');
    
    payment = payment.trim()
    code = code.filter(Number);
    size = size.filter(Number);
    qty = qty.filter(Number); 
    console.log(code + size + qty);
    console.log(code);
   
    $.ajax({
        url : 'order'

        , type     : 'post'
        , data     : {
            member      : member,
            email       : email,
            phone       : phone,
            reName      : reName,
            rePhone     : rePhone,
            destination : destination,
            memo        : memo,
            payment     : payment,
            money       : money,
            code        : code,
            size        : size,
            qty         : qty
        }
        , success : function(res){
            //location.replace('/funnyec/orderDone');
            location.href= "/funnyec/orderDone?orderId="+ res;
            console.log(res)
        }   
        , error : function(){
            alert('Error');
        }
    });    
    
}

function listFolder() {
    $('.cart-body-right-body').toggle();
}

function goInfo(id) {
    window.location.href = "/funnyec/productInfo?productCode=" + id;
}

function goOrderCheck(){
	$orderCheckNumber = $('#orderCheckNumber').val();
	location.href = "/funnyec/orderCheck?orderCheckNumber=" + $orderCheckNumber;
}
