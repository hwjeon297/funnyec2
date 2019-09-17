<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_model {

	// 주문하기
    public function orderStart($key, $member, $email, $phone, $reName, $rePhone, $destination, $memo, $payment, $money, $code, $size, $qty)
    {
        // if($member == 'non-member') $email = "sadasd";

        
        $date = date('Y-m-d H:i:s');
        try {
            $sql = "
            INSERT INTO ec.order (order_key, total_price, order_email, order_phone, re_name, re_phone, destination, memo, payment, order_time)
            VALUES ('$key', $money, '$email', '$phone', '$reName', '$rePhone', '$destination', '$memo', '$payment', '$date')
            ";

            $result = $this->db->query($sql);

            try {
                $sql = "SELECT order_id FROM ec.order WHERE order_key = '$key'";

                $key = $this->db->query($sql)->result();
        
                return $key[0]->order_id;
            } catch (\Throwable $th) {

            }
        } catch (\Throwable $th) {
            
        }
        

        

        // return $categoryNum;
    }
    
    public function orderDelail($key, $code, $size, $qty)
    {
        $index = sizeof($code);

        for ($i=0; $i < $index; $i++) { 
            $sql = "
                INSERT INTO ec.order_detail (id, order_code, order_size, order_qty)
                VALUES ($key, " . $code[$i] . ", " . $size[$i] . ", " . $qty[$i] . ")
            ";

            $result = $this->db->query($sql);
        }
    }

    public function orderDone($orderId){
    	$sql = "SELECT * ";
    	$sql .= "FROM product as p ";
    	$sql .= "JOIN order_detail as od ";
    	$sql .= "ON p.code = od.order_code ";
    	$sql .= "JOIN ec.order ";
    	$sql .= "ON ec.order.order_id = od.id ";
    	$sql .= "WHERE od.id = $orderId";

    	$result = $this->db->query($sql)->result();

    	return $result;
	}

	public function orderCheck($orderKey){
		$sql = "SELECT * ";
		$sql .= "FROM product as p ";
		$sql .= "JOIN order_detail as od ";
		$sql .= "ON p.code = od.order_code ";
		$sql .= "JOIN ec.order ";
		$sql .= "ON ec.order.order_id = od.id ";
		$sql .= "WHERE ec.order.order_key = '$orderKey'";

		$result = $this->db->query($sql)->result();

		return $result;
	}

	public function checkOrderNumber($checkOrderNumber){
    	try{
    		$sql = "select * from ec.order where order_key = '$checkOrderNumber'";

    		$result = $this->db->query($sql)->result();

    		if(!$result){ return 0; }
		} catch(\Throwable $th){

		}

		$res = $this->orderCheck($checkOrderNumber);

    	return $res;
	}

}

?>
