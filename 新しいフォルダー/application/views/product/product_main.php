<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- modal 관련 link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
    /* header CSS */
    @font-face {
        font-family: 'Trade_Gothic';
        src: url(../../../public/font/TradeGothicLTBoldCondensedNo.20.ttf) format('truetype');
    }
    .header {
        display: flex;
        border-top: 1px solid #cfcfcf;
        border-bottom: 1px solid #cfcfcf;
        /* background: chartreuse; */
        height: 40px;
    }
    
    .header_left {
        flex: 4;
        /* background: palegreen; */
        height: 40px;
    }

    .header_right {
        display: flex;
        flex: 1;
        height: 40px;
    }

    .header_right_register {
        display: flex;
        flex: 1;
        height: 40px;
        margin-top: 11px;
    }

    .header_right_register a {
        color: #7575757c;
        font-size: 11px;
        font-weight: bold;
        cursor: pointer;
    }

    .header_right_register a:hover {
        color: #414040a2;
        font-size: 11px;
        font-weight: bold;
    }

    .header_right_callcenter {
        display: flex;
        flex: 1;
        height: 40px;
        margin-top: 11px;
        margin-right: 10px;
    }

    .header_right_callcenter a {
        color: #7575757c;
        font-size: 11px;
        font-weight: bold;
    }

    .header_right_callcenter a:hover {
        color: #414040a2;
        font-size: 11px;
        font-weight: bold;
    }

    .header_right_cart {
        display: flex;
        flex: 1;
        margin-top: 11px;
        padding-left: 10px;
        height: 40px;
    }

    .header_right_cart i {
        color: #7575757c;
        cursor: pointer;
    }

    .header_right_cart i:hover {
        color: #414040a2;
    }

    .header_right_country {
        display: flex;
        flex: 1;
        margin-top: 11px;
        height: 40px;

    }

    .header_right_country i {
        color: #7575757c;
        cursor: pointer;
    }

    .header_right_country i:hover {
        color: #414040a2;
    }

    /* menual CSS */
    .menual {
        display: flex;
        border-bottom: 1px solid #cfcfcf;
        height: 80px;
    }

    .menual_logo {
        flex: 1;
        background-image: url(../../../public/picture/logo.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        height: 79px;
        cursor: pointer;
    }

    .menual_search {
        flex: 1;
        margin: auto;
    }

    .container-1{
        width: 300px;
        vertical-align: middle;
        white-space: nowrap;
        position: relative;
    }

    .container-1 input#search{
        width: 220px;
        height: 45px;
        border: 1px solid #bdbdbd;
        color: #464646;
        font-size: 10pt;
        float: left;
        margin-left: 125%;
        padding-left: 45px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 3px;
    }

    .container-1 input#search:focus {
        outline:none;
        border-width:1px;
        border-color:#000000;
    }


    .container-1 .icon{
        position: absolute;
        top: 50%;
        margin-left: 133%;
        margin-top: 12px;
        z-index: 1;
        color: #4f5b66;
    }

    .menual_menu {
        display: flex;
        flex: 1;
        text-align: center;
        font-family: Trade_Gothic;
        font-size: 24px;
        height: 80px;
    }

    .menual_menu_ul {
        /* aa */
        list-style:none;
        display: flex; 
        float: left;
        margin: auto;
        flex: 1;
    }

    .menual_menu_casual {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
        cursor: pointer;
    }

    .menual_menu_casual:hover {
        border-bottom: 2px solid #000000;
    }

    .menual_menu_sport {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
        cursor: pointer;
    }

    .menual_menu_sport:hover {
        border-bottom: 2px solid #000000;
    }

    .menual_menu_baby {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
        cursor: pointer;
    }
    
    .menual_menu_baby:hover {
        border-bottom: 2px solid #000000;
    }

    .menual_menu_business {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
        cursor: pointer;
    }

    .menual_menu_business:hover {
        border-bottom: 2px solid #000000;
    }

    /* main CSS */
    .main {
    }

    .artical {
        /* border-bottom: 1px solid #cfcfcf; */
    }

    .product_top {
        display: flex; 
        height: 130px;
        padding: 20px 20px 20px 20px;
        /* border-bottom: 1px solid #cfcfcf;    */
    }

    .product_top_title {
        flex: 4; 
    }

    .product_top_control {
        text-align: right;
        flex: 1;
    }

    .testbutton {
        cursor: pointer;
        margin: 0 40px 0 0;
    }

    .product_top_first {
        padding: 20px 10px 20px 10px;
        font-family: Trade_Gothic;
        font-size: 16px;
        height: 34%;
    }

    .product_top_first a {
        color: #2b2b2bc2;
    }

    .product_top_first a:hover {
        color: #acacace8;
    }

    .product_top_second {
        height: 36%;
        padding: 0 10px 20px 10px;
        font-family: Trade_Gothic;
        font-size: 24px;
    }

    .product_top_third {
        height: 30%;
        margin: 7px 15px 0 0;
    }
    
    .product_menu {
        float: left;
        width: 10%;
        padding: 15px 0 0 15px;
        
        /* border-right: 1px solid #cfcfcf; */
    }

    .product_view {
        float: left;
        padding: 15px 0 15px 60px;
        width: 90%;
    }

    .product_view_container {
        float: left;
        width: 30%;
        /* background: red; */
        margin: 0 8px 0 8px;
    }

    .product_view_container_piture {
        width: 100%;
        min-height: 327px;
    }

    .product_view_container_piture:hover {
        border: 1px solid #d8d8d89c;
    }

    .product_view_container_piture img {
        width: inherit; 
        height: width;
        cursor: pointer;
    }
    
    .product_view_container_display {
        display: flex;
        width: 100%;
        height: inherit;
        min-height: 90px;
        padding-top: 12px;
        /* background: yellow; */
        font-size: 17px;
        font-weight: 700;
    }

    .product_info {
        flex: 2;
        
        /* background: brown; */
    }

    .product_price {
        flex: 1;
        text-align: right;
        /* background: blue; */
    }


    .footer {
        border-top: 1px solid #cfcfcf;
        height: 80px;
        width: 100%;
        clear: both;
    }

    /* modal css */
    .modal-content {
        width: 480px;
        height: 435px;
        margin: 180px auto;
    }
    
    .modal-header {
        text-align: center;
        border-bottom: none;
    }

    .close {
        color: black;
        opacity: .9;
    }

    .login_logo {
        background-image: url(../../../public/picture/logo.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        margin: 25px auto;
        height: 79px;
    }
    
    .modal-title {
        font-weight: 600;
        font-size: 25px;
    }

    .modal-body {
        align: center;
        margin: auto 50px;
    }
    

    .form-control {
        width: 100%;
    }


    .form-control:focus {
        border-width:1px;
        border-color:#000000;
    }

    .findpassword {
        text-align: right;
        cursor: pointer;
    }

    .findpassword p{
        color: #7575757c;
        margin: 0;
    }

    .findpassword p:hover{
        color: #414040a2;
    }

    .modal-footer  {
        text-align: center;
        border-top: none;
        margin: auto 50px;
    }


    #loginbutton {
        background: black;
        width: 100%; 
        height: 35px;
        border: 0;
        outline: 0;
        color: white;
        cursor: pointer;
    }


</style>
<script>
    $(document).ready(function(){
        // session`がない場合
        // if (localStorage.length == 0)　{
            
           
        //     $('.header_right_register').append("<a id='signin' data-toggle='modal' href='#myModal'>SING IN</a>");
                
            
        // }else {
        //     $('.header_right_register').append("<a id='signout' onclick='logout()'>SING OUT</a>");
        // }
    });


    $(document).ready(function(){ 
        
        // toggle flag 
        var toggleFlag = true;
        $('.testbutton').click(function() {
            // toggle flase width change 
            if ( toggleFlag == false) {  
                $('.product_view').width('86%'); 
            }
            $('.product_menu').toggle(300, function () {
                // toggle true width change 
                if ( toggleFlag == true) {
                    toggleFlag = false;
                    $('.product_view').width('100%'); 
                } else {
                    toggleFlag = true;
                }
                
            });
        });

        $('#loginbutton').click(function() {
            var customerId = $('#loginId').val();
            var customerPassword = $('#loginPassword').val();

            // ajax --start
            $.ajax({
                url : '/login'

                , type : 'post'
                , data : {
                    customerId : customerId,
                    customerPassword : customerPassword
                }
                , datetype : 'JSON'
                , success : function(res){
                   
                    console.log(a);
                      
                    if(res == "0") {
                        alert("nono");
                    }else { 
                        $('#myModal').modal('hide');
                        // $('.header_right_register').append("<a id='signout' onclick='logout()'>SING OUT</a>");           
                        $('.header_right_register').append("<a id='signout' onclick='logout()'>SING OUT</a>");   
                        

                        
                        $('#signin').remove();

                        $('.product_menu').text(localStorage['id']); 


                    }
                }   
                , error : function(){
                    alert('Error');
                }
            });
        });
        

        // $('#singout').click(function() {
        //     alert(22);
        //     // window.location.reload("/product");
        // })
    });

    function logout() {
        <?php
           
            session_destroy();
         ?> 
        // $this->session->sess_destroy();
        // localStorage.clear();

        $.ajax({
                url : '/logout'

                , type : 'post'
                , datetype : 'JSON'
                , success : function(res){
                    
                    location.reload();                      
                }   
                , error : function(){
                    alert('Error');
                }
            });
    }
    

    function a(id) {
        
        var productName = $('#' + id).attr('value');

        $('#product_a_name').text("/ " + productName);
        $('#product_top_second_kind').text(productName + "'s シューズ");
        
    }

    
</script>
<body>
    <!-- header -->
    <header class="header">
        <div class="header_left"></div>
        <div class="header_right">
            <div class="header_right_register">
                <?php 
                    
                    if(!isset($_SESSION['id'])) {
                        echo "<a id='signin' data-toggle='modal' href='#myModal'>SING IN</a>";
                    }else {
                        echo "<a id='signout' onclick='logout()'>SING OUT</a>";
                    }
                ?>
               <!-- <a id='signin' data-toggle="modal" href="#myModal">SING IN</a> -->
            </div>
            <div class="header_right_callcenter">
                <a href="#">QUESTION</a>
            </div>
            <div class="header_right_cart">
                <i class="fa fa-shopping-cart fa-lg"></i>
            </div>
            <div class="header_right_country">
                <i class="fa fa-globe fa-lg"></i>
            </div>
        </div>
    </header>

    <!-- login modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="login_logo"></div>
                    <span class="modal-title">SONSATIONAL LOGIN</span>
                </div>
                <div class="modal-body">
                    <div class="modal_body_login">
                        <p>
                            <input type="text" class="form-control" id="loginId" aria-describedby="emailHelp" placeholder="Enter Id">
                        </p>
                    </div>
                    <div class="modal_body_password">
                         <p>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                        </p>
                    </div>
                    <div class="findpassword">
                        <p>パスワードを忘れた場合...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="loginbutton">LOGIN</button>
                </div>
            </div>
        </div>
    </div>

    <!-- menual -->
    <div class="menual">
        <div class="menual_logo" onclick="window.location.reload()"></div>
        <div class="menual_menu">
            <ul class="menual_menu_ul">
                <li class="menual_menu_casual" id="casul" onclick=a(id) value="Casul">CASUL</li>
                <li class="menual_menu_sport" id="sport" onclick=a(id) value="Sport">SPORT</li>
                <li class="menual_menu_baby" id="baby" onclick=a(id) value="Baby">BABY</li>
                <li class="menual_menu_business" id="business" onclick=a(id) value="Buniess">BUSINESS</li>
            </ul>
        </div>
        <div class="menual_search">
            <div class="container-1">
                <span class="icon"><i class="fa fa-search"></i></span>
                <input type="search" id="search" placeholder="Search..." />
            </div>
        </div>
    </div>

    <!-- main -->
    <main class="main">
        <div class="product_top">
            <div class="product_top_title">
                <div class="product_top_first">
                    <a href="#">SONSATIONAL</a>
                    <a href="#" id="product_a_name"></a>
                </div>
                <div class="product_top_second">
                    <span id="product_top_second_kind"></span>
                </div>
                <div class="product_top_third"></div>
            </div>
            <div class="product_top_control">
                <div class="product_top_first">
                    
                </div>
                <div class="product_top_second"></div>
                <div class="product_top_third">
                    <span class="testbutton"><i class="fa fa-search"></i></span>
                    </span><i class="fa fa-shopping-cart fa-lg"></i></span>
                </div>
            </div>
        </div>
        <div class="artical">
                <div class="product_menu">
                    <?php 
                    ?>
                    <div>
                        
                    </div>
                    <div></div>
                </div>
                <div class="product_view">
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AR4561-200/c50f3dcf-2809-4fc8-9485-5f721a0b9097_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AQ1289-401/001c416c-2073-47d5-901e-09174fc4f32b_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AQ1289-401/001c416c-2073-47d5-901e-09174fc4f32b_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AJ3547-009/ad2a10a9-7f33-4fbe-aeb8-217ee026384b_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AQ1289-401/001c416c-2073-47d5-901e-09174fc4f32b_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/287109409/AT9977-101_AT9977-101_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AQ1289-300/7aa19f94-af23-4519-bee6-137cc7474bae_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/743546-107/12f77486-c633-4a4c-8647-1cc22892be5d_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>
                    <div class="product_view_container">
                        <div class="product_view_container_piture">
                            <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/BQ8928-007/d518f126-1f6b-4b31-a823-8f7b446168aa_primary.jpg?gallery" alt="aa">
                        </div>
                        <div class="product_view_container_display">
                            <div class="product_info">
                                <span>나이키 오디세이</span>
                            </div>
                            <div class="product_price">130,000원</div>
                        </div>
                    </div>

                </div>
        </div>
    </main>

    <!-- footer -->
    <footer class="footer">footer</footer>
</body>
</html>

