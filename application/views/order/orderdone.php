<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>OrderDone</title>
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/product.css">
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/cart.css">
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/productInfo.css">
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/order.css">
</head>
<body>
<div class="menual">
	<div class="menual_logo_order" onclick="window.location.replace('/funnyec/product')"></div>
</div>
<div class="order-body-right">
	<div class="orderText">注文が完了しました。</div>
	<div class="cart-body-right-header" onclick="listFolder()" draggable="true">注文内訳</div>
	<div class="cart-body-right-body">
		<div class="info-price">
			<div class="order_array_info" hidden value=""></div>
			<?php foreach($orderData as $key) { ?>
			<div id="" onclick="goInfo(id)" class="order-list-product-container">
				<div class="order-list-container-left">
					<img src="<?php echo $key['src']?>">
				</div>
				<div class="order-list-container-right">
					<div class="order-name"><?php echo $key['orderName']?></div>
					<div class="order-code" hidden></div>
					<div class="order-code-hidden" hidden></div>
					<div class="order-size"><?php echo "サイズ : " .$key['orderSize']?></div>
					<div class="order-size-hidden" hidden></div>
					<div class="order-qty"><?php echo "数量 : " . $key['orderQty']?></div>
					<div class="order-qty-hidden" hidden><?php $price1 = 0; $price1 += $key['orderPrice'] * $key['orderQty'];?></div>
					<div class="order-price"><?php echo $key['orderPrice']?></div>
					<div class="totalprice" hidden><?php $price2 += $price1; ?></div>
					<div class="orderKey" hidden><?php $orderKey = $key['orderKey']?></div>
				</div>
				<div class="order-list-container-footer"></div>
			</div>
			<?php } ?>
		</div>
		<div class="info-price">
                    <span class="item-price">
                        <span class="label">予想送料金額</span>
                        <span id="deliveryFee" class="price">
							<?php
							if($price2 >= 1000000){
								echo "送料無料";
							}else{
								echo "500円";
							}
							?>
                        </span>
                    </span>
		</div>

		<div class="total-price">
			<span class="label">総予想決済金額</span>
			<span class="price">
 				<?php
				if($price2 >= 1000000){
					echo '<span class="price">' . number_format($price2) . "円" .  '</span>';
				}else{
					echo '<span class="price">' . number_format($price2+500) . "円" .  '</span>';
				}
				?>
			</span>
			<span class="total-price-bottom"></span>
		</div>
		<!-- <div class="order-form">
			<button class="order-botton">注文する</button>
		</div> -->
	</div>
	<div class="cart-body-right-header" onclick="listFolder()" draggable="true">注文番号　<div style="float: right; padding-right: 20px"><?php echo $orderKey?></div></div>
</div>
</body>
</html>
