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
              
                $result = $this->loginValidateCheck($id, $pw);
                //return $result;
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
    function loginValidateCheck($id, $pw) {

        try {

            // id, pw select query 
            $sql = "SELECT * FROM user WHERE id = '" . $id   . "' AND " . "password = '" . $pw . "'";
            // query result 
            $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return 1;
        
    }

    // ID regisert
    function register($id, $pw, $name, $ph) {
        try {
            // id validate test
            $validate = $this->registerValidateCheck($id);
            // validate check  -> 2 있는 아이디
            if(!$validate) return 0;

            $sql = "insert into user (id, password, classification) values ('" . $id . "','" . $pw . "', 'c')";

            $result = $this->db->query($sql);

            try {

                $sql = "insert into customer (id, name, phone) values ('$id', '$name', '$ph')";

                $result = $this->db->query($sql);

            } catch (\Throwable $th) {
                
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

        return 1;

    }

    function registerValidateCheck($id) {

        try{
            
            $sql = "SELECT * FROM user WHERE id = '$id'";

            $result = $this->db->query($sql)->result();


            if($result) return 0;
            
        } catch (\Throwable $th) {
            
        }

        return 1;
    }
}

?>
