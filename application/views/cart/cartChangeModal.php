<link rel="stylesheet" type="text/css" href"../funnyec/public/css/cart.css">



<!-- login modal -->
<div class="modal fade" id="cartModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="cart-modal-content">
                <div class="modal-container">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="left">
                        <div class="left-picture">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-container">
                            <div class="right-container-title">
                                <div class="product_cate"></div>
                                <div class="product_price"></div> 
                            </div>
                            <div class="right-container-title">
                                <div class="product_title"></div>
                                <div class="product_code" hidden=""></div>
                            </div>
                            <div class="right-container-size">
                                <div class="size_title">サイズ選択</div>
                                <div class="size_button"></div>
                            </div>
                            <div class="right-container-count">
                                <span>COUNT</span>
                                <span>
                                <input type="text" class=product_count_text value=1>
                                </span>
                                <button id="minus" class="btn minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                <button id="plus" class="btn plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>
                            <div class="right-container-warp">
                                <a class="order-buy" onclick="optionChange()">
                                <span>Option Change</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
