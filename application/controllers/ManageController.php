<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ManageController extends CI_Controller{

	public function __construct() {
		parent::__construct();
	}

	public function insertProduct(){
		$this->load->model('ProductModel');

		$productName = $_POST['productName'];
		$productPrice = $_POST['productPrice'];
		$firstCategory = $_POST['firstCategory'];

		if(isset($_POST['secondCategory1'])){
			$secondCategory = $_POST['secondCategory1'];
		}else if(isset($_POST['secondCategory2'])){
			$secondCategory = $_POST['secondCategory2'];
		}else if(isset($_POST['secondCategory3'])){
			$secondCategory = $_POST['secondCategory3'];
		}else if(isset($_POST['secondCategory4'])){
			$secondCategory = $_POST['secondCategory3'];
		}

		$size = $_POST['size'];
		$sizeArr = explode(",", $size);

		$name = $_FILES['insertPicture']['name'];

		$code = $this->ProductModel->insertProduct($productName, $name, $productPrice, $firstCategory, $secondCategory);
		$res = $this->ProductModel->insertSize($code, $sizeArr);

		//fileupload
		$uploadDir = 'C:\Bitnami\wampstack-7.1.29-0\apache2\htdocs\funnyec\public\picture';

		$error = $_FILES['insertPicture']['error'];


		if($error != UPLOAD_ERR_OK){
			switch($error){
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					echo "file is too big ($error)";
					break;
				case UPLOAD_ERR_NO_FILE:
					echo "file is not uploaded ($error)";
					break;
				default:
					echo "file is not correctly uploaded ($error)";
			}
			exit;
		}

		move_uploaded_file($_FILES['insertPicture']['tmp_name'], "$uploadDir/$name");

		$this->load->view('product/product_main');
	}

	public function insertPicture(){

	}
}
