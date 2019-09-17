<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "CountController.php";

class PageController extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->extendsTest = new CountController();
    }

    // cart page
    public function cart() 
    {
        // $count = $this->extendsTest->countPVUU();

		// print_r($count);
        $this->load->view('cart/cart');
    
    }

    // sign up page
    public function signup()
    {
        $this->load->view('signup/signup');
    }
    
    public function manage(){
        $this->load->view('manage/manage');
    }

}

