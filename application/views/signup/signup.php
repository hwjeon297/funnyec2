<?php @session_start(); ?>
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

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- modal 관련 link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/product.css">
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/signup.css">
</head>
<body>
    <!-- javacscipt include -->
    <script type="text/javascript" src="../funnyec/public/script/product.js"></script>
    <script type="text/javascript" src="../funnyec/public/script/signup.js"></script>

    <!-- header -->
    <?php include_once  APPPATH ."views/public/header.php"; ?>
    <!-- login modal -->
    <?php include_once  APPPATH ."views/public/loginModal.php"; ?>
    <!-- menual -->
    <?php include_once  APPPATH ."views/public/menual.php"; ?>

    <!-- main -->
    <main class="main">
        <!-- product_top -->
        <?php include_once  APPPATH ."views/public/product_top.php"; ?>

        <div class="artical">
            <?php include_once  APPPATH ."views/public/product_menu.php"; ?>

            <div class="product_view">
                <div class="signup-container">
                    <div class="signup-title">会員登録</div>
                    <div class="signup-form">
                        
                        <!-- id pw name phone email address -->
                        <!-- id = email -->
                        <p class="signup-form-box">
                            <input type="email" class="form-control" id="customerId" aria-describedby="emailHelp" placeholder="利用するIDを入力ください...(受信可能E-mail)" required>
                        </p>  
                        <!-- pw -->
                        <p>
                            <input type="password" class="form-control" id="customerPassword" placeholder="英語+数字+特殊文字8～16まで" minlength="8" maxlength="16" >
                        </p> 
                        <!-- pw re -->
                        <p>
                            <input type="password" class="form-control" id="customerRePassword" placeholder="パスワードをまた入力ください。" minlength="8" maxlength="16"  >
                        </p> 
                        <!-- name -->
                        <p>
                            <input type="text" class="form-control" id="customerName" placeholder="お名前を入力ください。" required>
                        </p> 
                        <!-- phone -->
                        <p>
                            <input type="tel" class="form-control" id="customerPhone" placeholder="電話番号を入力ください。" required>
                        </p> 
                    </div>
                    <div class="signup-button">
                        <!-- <button id="registbutton" onclick=signup()>SIGN UP</button> -->
                        <button id="registbutton" onclick=aa()  onmouseover=signup()>SIGN UP</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include_once  APPPATH ."views/public/footer.php"; ?>
</body>
</html>

<!-- product_menu -->

            
            

