<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationModel extends CI_model {

	

    /**
    * login function
    * @param  string  $id 
    * @param  string  $pw 
    * @return integer 1, 0 
    */
    function login($id, $pw) {

            try {
              
                $result = $this->loginValicateCheck($id, $pw);
                return $result;
                if(!$result) return 0;
              
            } catch (\Throwable $th) {
                //throw $th;
            }
        
            return 1;
    
    }

    /**
    * login validate check
    * @param  string  $id 
    * @param  string  $pw 
    * @return integer 1, 0 
    */
    function loginValicateCheck($id, $pw) {

        try {

            // id, pw select query 
            $sql = "SELECT * FROM user WHERE id = " . $id   . " AND " . "password = " . $pw;
            // query result 
            $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return 1;
        
    }

    // ID regisert
    function register() {
        try {
            //code...
            //$sql = "insert into user (id, password, classification) values ('" . $id . "','" . $pw . "', '&')";

            //$result = $this->db->query($sql);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

?>