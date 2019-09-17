<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/product.css">
	<link rel="stylesheet" type="text/css" href="../funnyec/public/css/productinfo.css">
    <link rel="stylesheet" href="../funnyec/public/css/insertproduct.css">
    <title>Mangement</title>
    <script>
        function selectFirstCategory(val){
			if(val == "2"){
			    var content = "";
			    content += "<select name='secondCategory1' id='selectCategory1' class='selectCategory'>";
			    content += "<option value='3'>ランニング</option>";
			    content += "<option value='4'>サッカー</option>"
				content += "</select>";
			    $('#secondCategory').html(content);
			}else if(val == "3"){
			    var content = "";
                content += "<select name='secondCategory1' id='selectCategory1' class='selectCategory'>";
                content += "<option value='5'>キッズスニーカー</option>";
                content += "<option value='6'>ベビーシューズ</option>"
                content += "</select>";
                $('#secondCategory').html(content);
			}else if(val == "4"){
                var content = "";
                content += "<select name='secondCategory1' id='selectCategory1' class='selectCategory'>";
                content += "<option value='7'>スウール</option>";
                content += "<option value='8'>モンクストラップ</option>"
                content += "</select>";
                $('#secondCategory').html(content);
			}else if(val == "1"){
                var content = "";
                content += "<select name='secondCategory1' id='selectCategory1' class='selectCategory'>";
                content += "<option value='1'>スニーカー</option>";
                content += "<option value='2'>サンダル</option>"
                content += "</select>";
                $('#secondCategory').html(content);
			}
		}
		function checkForm(){
            var sizeArr = new Array();
            var i = 200;
            for(i = 200; i<= 295; i+=5){
				var backgroundColor = $("#size"+i).css("backgroundColor");
                if(backgroundColor == "rgb(0, 0, 0)"){
                    var size = $("#size"+i).text();
                    sizeArr.push(size);
                }
            }
            $('#size').val(sizeArr);
		}
    </script>
</head>
<body>

<script type="text/javascript" src="../funnyec/public/script/productinfo.js"></script>
    <!-- header -->
    <?php include_once  APPPATH ."views/public/header.php"; ?>

    <!-- menual -->
    <div class="menual">
		<div class="menual_logo" onclick="window.location.replace('/funnyec/product')"></div>
	</div>
    
    <div class="article">
    <!-- menu for manager -->
    <!--<div class="product_menu" style="width:173.297px">
        <div class="menu-total" style="font-weight: 500">メニュー</div>
        <div class="menu-sub" style="font-weight: 500">商品登録</div>
        <div class="menu-sub" style="font-weight: 500">カテゴリ登録</div>
    </div>-->
    
    <!-- content -->
    <div class="product_view1" style="width:1696.58px">
        <form action="insertProduct" method="POST" class="productForm" id="productForm" name="productForm" enctype="multipart/form-data" onsubmit="return checkForm()">
            <div class="title">商品基本情報</div>
            <table>
                <tbody>
                    <tr>
                        <th>商品名</th>
                        <td>
                            <input type="text" name="productName">
                        </td>
                    </tr>
                    <tr>
                        <th>販売価格</th>
                        <td>
                            <input type="text" style="width:100px" name="productPrice">　円
                        </td>
                    </tr>
                    <tr>
                        <th>商品カテゴリ</th>
                        <td>
                            <select name="firstCategory" id="selectCategory" class="selectCategory" onchange="selectFirstCategory(this.value)">
								<option value="">カテゴリ選択</option>
								<option value="1">Casul</option>
                                <option value="2">Sport</option>
                                <option value="3">Baby</option>
                                <option value="4">Business</option>
                            </select>

							<div id="secondCategory"></div>

                        </td>
                    </tr>
                    <tr>
                        <th>商品サイズ</th>
                        <td>
                            <div class="product_size_insert">
								<div class="size_button">
									<input type="hidden" name="size" id="size">
									<?php for($i=200; $i<=295; $i+=5) {?>
										<button type="button" id="size<?=$i?>" name="size<?=$i?>" class="btn btn-light" onclick="sizeCheck(id)"><?=$i?></button>
									<? } ?>
								</div>
							</div>
                        </td>
                    </tr>
                    <tr>
                        <th>商品画像</th>
                        <td>
                            <div class="pictureButton">
                             <input type="file" name="insertPicture"/>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="insertButton">
				<input type="submit" value="商品登録" class="insertProductButton">
                <!--button type="button" class="openPicture">商品登録</button>-->
            </div>
        </form>
    </div>
    </div>
    
    <!-- footer -->
    <?php include_once  APPPATH ."views/public/footer.php"; ?>
</body>
</html>
