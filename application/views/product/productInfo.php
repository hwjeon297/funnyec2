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
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/productinfo.css">
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/productinfo_media.css">

</head>

<body>
<!-- javacscipt include -->
<script type="text/javascript" src="../funnyec/public/script/product.js"></script>
<script type="text/javascript" src="../funnyec/public/script/productinfo.js"></script>

<!-- header -->
<?php include_once APPPATH . "views/public/header.php"; ?>
<!-- login modal -->
<?php include_once APPPATH . "views/public/loginModal.php"; ?>
<!-- menual -->
<?php include_once APPPATH . "views/public/menual.php"; ?>


<main class="main">
	<!-- layered -->
	<?php include_once APPPATH . "views/public/layered.php"; ?>

	<!-- product_top -->
	<?php include_once APPPATH . "views/public/product_top.php"; ?>

	<div class="artical">
		<!-- product_menu -->
		<?php include_once APPPATH . "views/public/product_menu1.php"; ?>

		<div class="productinfo_view">
			<div class="productinfo_view_container">

				<div class="productinfo_view_container_picture">
					<div class="productinfo_view_container_picture1">
						<div class="productinfo_view_container_picture_img">

							<?php echo '<img src="' . $info[0]->src . '" alt="">'; ?>

						</div>
						<div class="productinfo_view_container_picture_subimg">
							서브 사진
						</div>
					</div>
				</div>
				<!-- 소개 -->
				<div class="product_viewinfo_container_info">
					<div class="product_cate"><?php echo strtoupper($info[0]->mname) . ' ' . $info[0]->sname ?></div>
					<div class="product_price"><?php echo $info[0]->price . '￥' ?></div>
					<div class="product_price_hidden" hidden><?php echo $info[0]->price ?></div>
				</div>
				<div class="product_viewinfo_container_info">
					<div class="product_title"><?php echo strtoupper($info[0]->name) ?></div>
					<div class="product_code" hidden><?php echo $info[0]->code ?></div>
				</div>

				<!-- size  -->
				<div class="product_size">
					<div class="size_title">사이즈 선택</div>
					<div class="size_button">
						<?php
						$i = 1;
						foreach ($size as $key) {
							foreach ($key as $value) {
								echo '<button type="button" id="size' . $i . '" onclick=sizeCheck(id) class="btn btn-light">' . $value . '</button>';
								$i++;
							}
						}

						?>
					</div>
				</div>

				<!-- 個数 -->
				<div class="count-container">
					<div class="product_count">
						<span>COUNT</span>
						<span>
                                <input type="text" class=product_count_text value=1>
                            </span>
						<button id="minus" class="btn minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
						<button id="plus" class="btn plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
					</div>
				</div>

				<!-- 購入  / 気になる -->
				<div class="order-warp">
					<a class="order-buy" onclick='orderGo()'>
						<span>購入</span>
					</a>
					<a class="order-cart" onclick=insertCart()>
						<span>気になる</span>
					</a>
				</div>

			</div>
		</div>
	</div>
</main>

<!-- footer -->
<?php include_once APPPATH . "views/public/footer.php"; ?>
</body>
</html>
