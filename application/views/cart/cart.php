<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/cart.css">
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/productinfo.css">
</head>
<body>
    <!-- javacscipt include -->
    <script type="text/javascript" src="../funnyec/public/script/product.js"></script>
    <script type="text/javascript" src="../funnyec/public/script/productinfo.js"></script>
    <script type="text/javascript" src="../funnyec/public/script/cart.js"></script>

    <!-- header -->
    <?php include_once  APPPATH ."views/public/header.php"; ?>
    <!-- login modal -->
    <?php include_once  APPPATH ."views/public/loginModal.php"; ?>
    <!-- menual -->
    <?php include_once  APPPATH ."views/public/menual.php"; ?>

    <!-- main -->
    <main class="main">
        <!-- layered -->
        <?php include_once  APPPATH ."views/public/layered.php"; ?>
        
        <!-- product_top -->
        <?php include_once  APPPATH ."views/public/product_top.php"; ?>

        <div class="artical">
            <?php include_once  APPPATH ."views/public/product_menu.php"; ?>
            <?php include_once  APPPATH ."views/cart/cartChangeModal.php"; ?>
            <div class="product_view">
                <?php 
                    if(!empty($this->cart->contents())) include_once  APPPATH ."views/cart/cart-yes.php"; 
                    else include_once  APPPATH ."views/cart/cart-no.php";
                ?>
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include_once  APPPATH ."views/public/footer.php"; ?>
</body>
</html>

<!-- product_menu -->

            
            
