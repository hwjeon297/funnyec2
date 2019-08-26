<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function gogo() {
		$this->load->view('product/product_main');
	}
	
	public function login()
	{
		$this->load->model('RegistrationModel');
		
	
        $id = $_POST['customerId'];
        $pw = $_POST['customerPassword'];
		

		//$test = array('id' => $_SESSION['id'], 'pw' => $_SESSION['password']);


		$result_data = $this->RegistrationModel->login($id, $pw);


		if(!$result_data) { echo 0; }
		else { 
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['password'] = $pw;
			$sessionData = array( 
				'id' => $id,
				'password' => $pw
			);
			
			// $this->session->set_userdata($sessionData);

			echo $sessionData;
			
		 } 
	
	}

	function logout() {
		$this->load->view('product/product_main');
	}

	function test() {
		$this->load->view('test');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */