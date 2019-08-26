function signup() {
    var id = $('#customerId').val();
    var pw = $('#customerPassword').val();
    var repw = $('#customerRePassword').val();
    var name = $('#customerName').val();
    var phone = $('#customerPhone').val();

    var check = /^(?=.*[a-zA-z])(?=.*[^a-zA-Z0-9])(?=.*[0-9]).{8,16}$/;
    
    if(!check.test(pw)) {
        alert("英語+数字+特殊文字8～16でお願いします");
        return;
    }

    if(pw != repw){
        alert("パスワードが一致していない。/n 確認ください");
        return;
    }

    if(name.length + phone.length < 2) {
        alert("項目を確認してください");
        return;
    }
}


function  aa() {

    var id = $('#customerId').val();
    var pw = $('#customerPassword').val();
    var name = $('#customerName').val();
    var phone = $('#customerPhone').val();

    

    $.ajax({
        url : '/regist'

        , type : 'post'
        , data : {
            customerId         : id,
            customerPassword   : pw,
            customerName       : name,
            customerPhone      : phone
        }
        
        , datetype : 'JSON'
        , success : function(res){
           
            if(!res) return alert("存在しているIDです。変えてください");

            alert("会員登録ができました！");

            location.href = "/product";

        }   
        , error : function(){
            alert('Error');
        }
    });
}