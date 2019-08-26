<div class="cart-container">
    <div class="order-header">
        <div class="cart-header-title" draggable="true">O R D E R</div>
    </div>
    <div class="cart-body">
        <div class="cart-body-left" draggable="true">
            
            <!-- email phone -->
            <div id="ep" class="order-list-container">
                <div id="one" class="order-body-left-header">
                    <p>Order Customer</p>
                    <div class="order-login-button">
                        <?php
                            if(!isset($_SESSION['id'])) echo '<div>Login</div>';

                            if(!isset($_SESSION['id'])) {
                                echo '<div class="userId-hidden" hidden>non-member</div>';
                            }else {
                                echo '<div class="userId-hidden" hidden>' . $_SESSION['id'] . '</div>';
                            }
                        ?>
                    </div>
                    <div class="order-checkOne-value">
                        <div class="checkOne-email"></div>
                        <i class="fa fa-plus" id="oneCheckIcon" onclick="stepOneFolder()" hidden></i>
                    </div>
                </div>
                <div class="order-body-left-body">
                    <div class="ep-container">
                        <div class="email">
                            <div class="email-title">Email</div>
                            <div class="email-form">
                                <input type="email" class="form-control" id="order-email" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="phone" >
                            <div class="phone-title">Phone</div>
                            <div class="phone-form">
                                <input type="tel" class="form-control" id="order-phone" data-parsley-pattern="^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$" placeholder=" '-' excluding">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-body-left-footer-one">
                    <button class="order-botton-info" onclick='stepOne()'>Agree and proceed to the next sound step</button>
                </div>
            </div>

            <!-- destination -->
            <div id='destination' class="order-list-container">
                <div class="order-body-left-header">
                    <p>Destination information</p>
                    <div class="order-checkTwo-value">
                        <div class="checkTwo-destination"></div>
                        <i class="fa fa-plus" id="twoCheckIcon" onclick="stepTwoFolder()" hidden></i>
                    </div>
                </div>
                <div id="two" class="order-body-left-body" >
                    <div class="recipient-container">
                        <div class="recipient-email" hidden>
                            <div class="email-title">Recipient Name</div>
                            <div class="email-form">
                                <input type="text" class="form-control" id="recipient-name" placeholder="Recipient Name">
                            </div>
                        </div>
                        <div class="recipient-phone" hidden>
                            <div class="phone-title">Recipient Phone</div>
                            <div class="phone-form">
                                <input type="tel" class="form-control" id="recipient-phone" data-parsley-pattern="^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$" placeholder=" '-' excluding">
                            </div>
                        </div>
                    </div>
                    
                    <div class="destination-form" hidden>
                        <select name="add" id="selectAdd" class="form-control">
                            <option value="" selected>-- 都道府県 --</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        
                        <div class="destination-input">
                            <input type="text" class="form-control" id="destinationD" placeholder="Put in the rest of the address.">
                        </div>
                    </div>

                    <div class="memo" hidden>
                        <div class="email-title">MEMO</div>
                        <input type="text" class="form-control" id="memo" placeholder="Please enter a delivery note.">
                    </div>
                </div>

                <div class="order-body-left-footer-two" hidden>
                    <button class="order-botton-destination" onclick="stepTwo()">Agree and proceed to the next sound step</button>
                </div>
            </div>

            <!-- 결제 수단 -->
            <div id='destination' class="order-list-container">
                <div class="order-body-left-header">
                    <p>Payment Method</p>
                </div>
                <div id="three" class="order-body-left-body" hidden>
                    <div class="payment-container">
                        <div id="bank" class="payment-method-form" onclick="selectPayment(this)">
                            <button>
                                銀　行　振　込
                                <i id="banki" class="fa fa-check" hidden></i>
                            </button>
                            
                        </div>
                        <div id="money" class="payment-method-form" onclick="selectPayment(this)">
                            <button>
                                代　金　引　換
                                <i id="moneyi" class="fa fa-check" hidden></i>
                            </button>
                        </div>
                        <div id="postbox" class="payment-method-form" onclick="selectPayment(this)">
                            <button>
                                郵　便　振　替
                                <i id="postboxi" class="fa fa-check" hidden></i>
                            </button>
                        </div>
                    </div>

                    <div class="agree-form">
                        <div>
                            <span>商品準備にエラーがあったり、発送遅延が不可避の場合は、顧客様に案内連絡をいたします。</span>    
                        </div>
                        <div>
                            <input id="orderCheckBox" type="checkbox"><b> 以下の注文の商品・価格・配送情報に同意します。</b>
                        </div>

                    </div>
                </div>
                <div class="order-body-left-footer-three" hidden>
                    <?php
                        $price = 0;
                        $i = 0;
                        foreach ($info as $key) {
                            
                            // echo $key[$i++]['price'];
                            foreach ($key as $s) {
                                $price += (int) $s['price'];
                            }
                           
                        }
                    ?>
                    <button class="order-botton-destination" name='<?php echo $price; ?>' id="checkThreeButtonId" onclick="stepThree()">
                    <?php echo number_format($price) . '￥' . ' 決済する'; ?>
                    </button>
                </div>
            </div>
        </div> 
        
     
        
        <div class="cart-body-right">
            <div class="cart-body-right-header" onclick="listFolder()" draggable="true">注文内訳</div>
            <div class="cart-body-right-body">
                <div class="info-price">
                <div class="order_array_info" hidden value="<?php $info ?>"><?php $info ?></div>
                    <?php foreach ($info as $key) { ?>
                        <?php foreach ($key as $value) {  ?>
                        <div id="<?php echo $value['code'] ?>" onclick="goInfo(id)" class="order-list-product-container">
                            <div class="order-list-container-left">
                                <img src="<?php echo $value['img']; ?>">
                            </div>
                            <div class="order-list-container-right">
                                <div class="order-name"><?php echo $value['name']; ?></div>
                                <div class="order-code" hidden><?php echo $value['code']; ?></div>
                                <div class="order-code-hidden" hidden><?php echo $value['code'] . '-'; ?></div>
                                <div class="order-size"><?php echo  "SIZE : " . $value['size']; ?></div>
                                <div class="order-size-hidden" hidden><?php echo $value['size'] . '-'; ?></div>
                                <div class="order-qty"><?php echo "quantity : " . $value['qty']; ?></div>
                                <div class="order-qty-hidden" hidden><?php $price1 = 0; $price1 += $value['price'] * $value['qty'];  echo $value['qty'] . '-'; ?></div>
                                <div class="order-price"><?php echo number_format($value['price']) . '￥'; ?></div>
                            </div>
                            <div class="order-list-container-footer"></div>
                        </div>
                    <?php   }  ?>
                    <?php }  ?>
                </div>


                <div class="total-price">
                    <span class="label">総予想決済金額</span>
                    <span class="price">
                        <?php 
                            echo '<span class="price">' . number_format($price1) . "￥" .  '</span>'; 
                        ?>
                    </span>
                    <span class="total-price-bottom"></span>
                </div>
                <!-- <div class="order-form">
                    <button class="order-botton">注文する</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
