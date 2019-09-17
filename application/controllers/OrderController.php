<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "CountController.php";
class OrderController extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        // $this->load->library('email');
        $this->extendsTest = new CountController();
    }

    // cart page
    public function orderPage() 
    {
        // $count = $this->extendsTest->countPVUU();

		// print_r($count);       
        // post
        $code  = $_GET['code'];
        $qty   = $_GET['qty'];
        $price = $_GET['price'];
        $name  = $_GET['name'];
        // option 'options' => array('Size' => 'L', 'Color' => 'Red')
        $img   = $_GET['img'];
        $size  = $_GET['size'];

        $arr = array();
        
        $orderArr = array(
            'code'        => $code,
            'qty'       => $qty,
            'price'     => $price,
            'name'      => $name,
            'size'      => $size,
            'img'       => $img
        );

        array_push($arr, $orderArr);

        $data = array('info' => array( 
            'test' => $arr
        ));
    
        $this->load->view('order/order', $data);

    }

    public function cartOrderPage()
    {

        $arr = array();
        // $count = $this->extendsTest->countPVUU();

		// print_r($count);    
        foreach ($this->cart->contents() as $items) {
            $orderArr = array (
                'code'  => $items['id'],
                'qty'   => $items['qty'],
                'price' => $items['price'],
                'name'  => $items['name'],
                'size'  => $this->cart->product_options($items['rowid'])['size'],
                'img'   => $this->cart->product_options($items['rowid'])['img']
            );
            array_push($arr, $orderArr);
        }

        $data = array('info' => array( 
            'test' => $arr
        ));

        $this->load->view('order/order', $data);
    }

    public function order()
    {

        $this->load->model('OrderModel');

        $member      = $_POST['member'];        // 회원 유무 확인 -> 회원 아이디 / 비회원 1
        $email       = $_POST['email'];         // 주문자 이메일
        $phone       = $_POST['phone'];         // 주문자 전화번호
        $reName      = $_POST['reName'];        // 받는 사람 폰
        $rePhone     = $_POST['rePhone'];       // 받는 사람 전화
        $destination = $_POST['destination'];   // 목적지
        $memo        = $_POST['memo'];          // 메모
        $payment     = $_POST['payment'];       // 지불 방법
        $money       = $_POST['money'];         // 전체 지불 돈
        $key         = $this->generateRandomString(); // \random

        // 주문 상품 정보 
        $code        = $_POST['code'];          // 코드
        $size        = $_POST['size'];          // 사이즈
        $qty         = $_POST['qty'];          // 수량

        $orderId = $this->OrderModel->orderStart($key, $member, $email, $phone, $reName, $rePhone, $destination, $memo, $payment, $money, $code, $size, $qty);
        $this->OrderModel->orderDelail($orderId, $code, $size, $qty);
       
    
        // cart delete
        $this->cart->destroy();

        echo $orderId;
    }

    function orderDone(){
		$this->load->model('OrderModel');

    	$orderId = $_GET['orderId'];

    	$orderDoneData = $this->OrderModel->orderDone($orderId);

    	$orderArr = array();
    	for($i=0; $i<sizeof($orderDoneData); $i++){
			$orderDoneArr = array(
				"orderKey" => $orderDoneData[$i]->order_key,
				"orderName"=>$orderDoneData[$i]->name,
				"src"=>$orderDoneData[$i]->src,
				"orderSize"=>$orderDoneData[$i]->order_size,
				"orderQty"=>$orderDoneData[$i]->order_qty,
				"orderPrice"=>$orderDoneData[$i]->price,
				"orderTotal"=>$orderDoneData[$i]->total_price
			);
			array_push($orderArr, $orderDoneArr);
		}

    	$data = array("orderData" => $orderArr);

    	$this->load->view('order/orderdone', $data);
	}

    // random string
    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function orderCheck(){
		$this->load->model('OrderModel');

    	$orderCheckNumber = $_GET['orderCheckNumber'];

		$orderDoneData = $this->OrderModel->orderCheck($orderCheckNumber);

		$orderArr = array();
		for($i=0; $i<sizeof($orderDoneData); $i++){
			$orderDoneArr = array(
				"orderName"=>$orderDoneData[$i]->name,
				"src"=>$orderDoneData[$i]->src,
				"orderSize"=>$orderDoneData[$i]->order_size,
				"orderQty"=>$orderDoneData[$i]->order_qty,
				"orderPrice"=>$orderDoneData[$i]->price,
				"orderTotal"=>$orderDoneData[$i]->total_price
			);
			array_push($orderArr, $orderDoneArr);
		}

		$data = array("orderData" => $orderArr);

		$this->load->view('order/orderCheck', $data);
	}

	function orderNumberCheck(){
		$this->load->model('OrderModel');

		$checkOrderNumber = $_POST['checkOrderNumber'];

		$checkRes = $this->OrderModel->checkOrderNumber($checkOrderNumber);

		if(!$checkRes){
			echo 0;
		}else{
			$data = array("orderData" => $checkRes);
			echo json_encode($data);//checkOrderNumber
		}
	}

}

