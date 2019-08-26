<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "CountController.php";
class ProductController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->extendsTest = new CountController();
    }

    // product view
    public function view() 
    {
        
        $this->load->model('ProductModel');

        $productType     = $_POST['productType'];
        $productOby      = $this->ProductModel->productMainCate($productType);
        $productView     = $this->ProductModel->productView($productType);
        $productMenu     = $this->ProductModel->productMenu($productType);

        $result = array('view' => $productView, 'menu' => $productMenu, 'orderby' => $productOby);

        echo json_encode($result);
    
    }

    public function categoryView()
    {
        $this->load->model('ProductModel');
        

        $categoryType = $_POST['categoryType']; 
        
        switch ($categoryType) {
            // case 'Casul':
            // $productView = $this->ProductModel->productView($categoryType);
            // echo json_encode($productView);
            // break;
            // case 'Sport':
            // $productView = $this->ProductModel->productView($categoryType);
            // echo json_encode($productView);
            // break;
            // case 'Baby':
            // $productView = $this->ProductModel->productView($categoryType);
            // echo json_encode($productView);
            // break;
            // case 'Business':
            // $productView = $this->ProductModel->productView($categoryType);
            // echo json_encode($productView);
            // break;
            default:
            $productView = $this->ProductModel->productCategoryView($categoryType);
            $productOby  = $this->ProductModel->productSubCate($categoryType);

            $result = array('view' => $productView, 'orderby' => $productOby);
            echo json_encode($result);
            break;
        }

        // echo json_encode($productView);
    }

    public function productInfo() 
    {
        // $count = $this->extendsTest->countPVUU();

        // print_r($count);
        
        $productCode = $_GET['productCode'];
        @$check = $_GET['pageCheck'];

        $this->load->model('ProductModel');

        $productInfo = $this->ProductModel->productInfoView($productCode);
        $productSize = $this->ProductModel->productSizeView($productCode);

         
        $result = array('info' => $productInfo, 'size' => $productSize);

        if(@isset($check)) { echo json_encode($result); return; }
        
        $this->load->view('product/productInfo', $result);
        
    }

    public function orderbyView()
    {   
        $this->load->model('ProductModel');

        // new high low
        $orderby   = $_POST['orderby'];
        // main sub
        $colum1    = $_POST['colum1'];
        // num
        $colum2    = $_POST['colum2'];

        $productInfo = $this->ProductModel->orderbyView($orderby, $colum1, $colum2);

        if($colum1 == "main") {
            $aa = array("main" => $colum2);
            $result = array('view' => $productInfo, 'order' => $aa);
        }else {
            $aa = array("sub" => $colum2);
            $result = array('view' => $productInfo, 'order' => $aa);
        }

        // $result = array('view' => $productInfo);

        echo json_encode($result);
    }


    // cart
    public function insertCart()
    {
        // 'id'      => 'sku_123ABC',
        // 'qty'     => 1,
        // 'price'   => 39.95,
        // 'name'    => 'T-Shirt',
        // base
        $code  = $_POST['code'];
        $qty   = $_POST['qty'];
        $price = $_POST['price'];
        $name  = $_POST['name'];
        // option 'options' => array('Size' => 'L', 'Color' => 'Red')
        $img   = $_POST['img'];
        $size  = $_POST['size'];

        $data = array(
            'id'        => $code,
            'qty'       => $qty,
            'price'     => $price,
            'name'      => $name,
            'options'   => array('size' => $size, 'img' => $img)
        );


        try {
            
            $result = $this->cart->insert($data);

        } catch (\Throwable $th) {
            
        }

        echo json_encode($result);
    }


    public function deleteCart()
    {
     
        $itemrowid = $_POST['rowid'];

        $data = array(
            'rowid' => $itemrowid,
            'qty' => 0
        );

        $this->cart->update($data);
        
    }

    public function totalDeleteCart()
    {

        // $data = array();

        // foreach ($this->cart->contents() as $items) {
        //     $deleteArray = array (
        //         'rowid' => $items['rowid'],
        //         'qty' => 0
        //     );
        //     array_push($data, $deleteArray);
        // }

        // $this->cart->update($data);
        $this->cart->destroy();
    }

    public function optionChange()
    {
        $rowId = $_POST['rowid'];
        $qty   = $_POST['qty'];
        $img   = $_POST['src'];
        $size  = $_POST['size'];

        $data = array(
            'rowid' => $rowId,
            'qty' => $qty,
            'options'   => array('size' => $size, 'img' => $img)
        );

        $this->cart->update($data);

    }

    public function searching()
    {
        $this->load->model('ProductModel');
        $product = $_GET['product'];

        $productView = $this->ProductModel->searchView($product);

        $result = array('info' => $productView);

        $this->load->view('product/productSearch', $result);
    }
}

