<!-- header -->
<header class="header">
    <div class="header_left"></div>
    <div class="header_right">
        <div class="header_right_register">
            <?php 
                $id = $this->session->userdata('id');
                if(!isset($id)) {
                    echo "<a id='signin' data-toggle='modal' href='#myModal'>SING 0N</a>";
                }else {
                    echo "<a id='signout' onclick='logout()'>SIGN OUT</a>";
                }
            ?>
           <!-- <a id='signin' data-toggle="modal" href="#myModal">SING IN</a> -->
        </div>
		<div class="header_right_callcenter">
			<a href="#">QUESTION</a>
		</div>

		<?php
			$id = $this->session->userdata('id');
			if($id == "1"){
		?>
			<div class="header_right_country" onclick=managePageGo()>
				<i class="fa fa-globe fa-lg"></i>
			</div>
		<? } else { ?>
			<div class="header_right_cart" onclick=cartPageGo()>
				<i class="fa fa-shopping-cart fa-lg"></i>
			</div>
			<div class="header_right_callcenter">
				<a id='orderCheck' data-toggle='modal' href='#checkOrder'>注文確認</a>
			</div>
		<? } ?>
    </div>
</header>
