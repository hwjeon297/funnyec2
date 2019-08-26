<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "CountController.php";

class LoginController extends CI_Controller {

	public $extendsTest;

	public function __construct() {
		parent::__construct();
		$this->extendsTest = new CountController();
    }

	// test main page
	public function gogo() {
		
		// $count = $this->extendsTest->countPVUU();

		// print_r($count);
		// $count->pv .  " : " . $count->uu;
		$this->load->view('product/product_main');
	}

	// regist
	public function regist() {
		$this->load->model('RegistrationModel');

		$id   = $_POST['customerId'];
		$pw   = $_POST['customerPassword'];
		$name = $_POST['customerName'];
		$ph   = $_POST['customerPhone'];

		$result = $this->RegistrationModel->register($id, $pw, $name, $ph);
		
		if(!$result) echo 0;


		echo 1;
	}
	
	// login
	public function login()
	{
		$this->load->model('RegistrationModel');
		
	
        $id = $_POST['customerId'];
        $pw = $_POST['customerPassword'];
		
		$result_data = $this->RegistrationModel->login($id, $pw);

		if(!$result_data) { echo 0; }
		else { 
			// session set
			$_SESSION['id'] = $id;
			$_SESSION['password'] = $pw;
			$sessionData = array( 
				'id' => $id,
				'password' => $pw
			);

			echo json_encode($sessionData);
		}
	
	}

	// logout
	function logout() {
		session_start();
		session_destroy();
		echo 1;
	}

	// test function
	function test() {
		$this->load->view('test');
	}
}

?>
