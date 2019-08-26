<div class="cart-container">
    <div class="cart-header">
        <div class="cart-header-title">C A R T</div>
        <div class="cart-header-count">
            <?php 
                $i   = 1; 
                $qty = 0;
            ?>
            <?php foreach ($this->cart->contents() as $items): ?> 
            <?php $qty += $items['qty']; ?>
            <?php $i++; ?>
            <?php endforeach; ?> 
            <?php echo $qty . "個の商品"; ?>
        </div>
    </div>
    <div class="cart-body">
        <div class="cart-body-left">
            <div class="cart-body-left-header" onclick="totalDeleteCart()">TotalDelete</div>
            <div class="cart-body-left-body">
                <?php 
                    $i     = 1;
                    $price = 0;
                ?>
                <?php foreach ($this->cart->contents() as $items): ?> 
                <?php $price += ($items['price'] * $items['qty']); ?>
                <div class="cart-list-container">
                    <div class="cart-item-info">
                        <div class="cart-item-info-img">
                        <?php echo "<div hidden>" . $i.'[rowid]', $items['rowid'] . "</div>"; ?>
                        <?php echo '<img src="' . $this->cart->product_options($items['rowid'])['img'] . '" alt="">';?>
                        </div>
                        <div class="cart-item-info-wrap">
                            <div class="item-title"><?php echo '<a href="productInfo?productCode=' . $items['id'] . '">' . $items['name'] . '</a>'; ?></div>
                            <div class="item-size"> <?php echo "SIZE &nbsp" . $this->cart->product_options($items['rowid'])['size']; ?></div>
                            <div class="item-count"><?php echo "Quantity &nbsp" . $items['qty']; ?></div>
                        </div>
                    </div>
                    <div class="cart-item-change">
                        <a class="price" id='<?php echo $items['id']; ?>' name='<?php echo $items['rowid'] ?>' data-toggle='modal' onclick="optionChangeModal(id, name)">Option Change</a>
                    </div>
                    <div class="cart-item-price">
                        <span class="price"><?php echo $items['price'] . "￥"; ?></span>
                    </div>
                    <button type="button" class="close" id="<?php echo $items['rowid']; ?>" data-dismiss="modal" onclick="selectDeleteCart(id)">&times;</button> 
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>        
            </div>
        </div> 
        <div class="cart-body-right">
            <div class="cart-body-right-header">注文予定金額</div>
            <div class="cart-body-right-body">
                <div class="info-price">
                    <span class="item-price">
                        <span class="label">商品金額</span>
                        <?php 
                            echo '<span class="price">' . $price .  "￥" .  '</span>'; 
                        ?>
                    </span>
                    <span class="item-price" style="margin-top: 20px;">
                        <span class="label">予想送料金額</span>
                        <span class="price">ssssssssssss</span>
                    </span>
                </div>
                <div class="total-price">
                    <span class="label">総予想決済金額</span>
                    <span class="price">
                        <?php 
                            echo '<span class="price">' . $price .  "￥" .  '</span>'; 
                        ?>
                    </span>
                </div>
                <div class="order-form">
                    <button class="order-botton" onclick="cartOrderPage()">注文する</button>
                </div>
            </div>
        </div>
    </div>
</div>