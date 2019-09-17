<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_model {

	

    /**
    * login function
    * @param  string  $id 
    * @param  string  $pw 
    * @return integer 1, 0 
    */
    public function productMainCate($productMaincate)
    {
        $sql = "SELECT num FROM main_category WHERE name = '$productMaincate'";

        $categoryNum = $this->db->query($sql)->result();

        return $categoryNum;
    }

    // 카테고리 이름!
    public function productSubCate($productMaincate)
    {
        $sql = "SELECT num FROM sub_category WHERE name = '$productMaincate'";

        $subCategoryNum = $this->db->query($sql)->result();

        return $subCategoryNum;
    }

    public function productView($productType) {
        try {
            
            $sql = "SELECT num FROM main_category WHERE name = '$productType'";

            $categoryNum = $this->db->query($sql)->result();
            // id, pw select query 
            $sql = "SELECT * FROM product WHERE main_category = " . $categoryNum[0]->num . " ORDER BY code DESC";
            // query result 
            $result = $this->db->query($sql)->result();
            

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }

    public function orderbyView($orderby, $cate1, $cate2)
    {
        try {
            switch ($cate1) {
                case 'main':
                    switch ($orderby) {
                        case 'new':
                            $sql = "SELECT * FROM product WHERE main_category = " . $cate2 . " ORDER BY code DESC";
                        break;
                        case 'high':
                            $sql = "SELECT * FROM product WHERE main_category = " . $cate2 . " ORDER BY price DESC";
                        break;
                        case 'low':
                            $sql = "SELECT * FROM product WHERE main_category = " . $cate2 . " ORDER BY price ASC";
                        break;
                    }
                    $result = $this->db->query($sql)->result();
                break;
                
                default:
                    switch ($orderby) {
                        case 'new':
                            $sql = "SELECT * FROM product WHERE sub_category = " . $cate2 . " ORDER BY code DESC";
                        break;
                        case 'high':
                            $sql = "SELECT * FROM product WHERE sub_category = " . $cate2 . " ORDER BY price DESC";
                        break;
                        case 'low':
                            $sql = "SELECT * FROM product WHERE sub_category = " . $cate2 . " ORDER BY price ASC";
                        break;
                    }
                    $result = $this->db->query($sql)->result();
                break;
            }
            
            
        } catch (\Throwable $th) {
            
        }

        return $result;
    }

    

    public function productMenu($productType) {

        try {
            //code...

            $sql = "SELECT num FROM main_category WHERE name = '$productType'";

            $categoryNum = $this->db->query($sql)->result();

            $sql = "SELECT name FROM sub_category WHERE main_num = " . $categoryNum[0]->num;
                // query result 
            $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $result;
    }

    public function productCategoryView($categoryType) 
    {

        try {
            $sql = "SELECT num FROM sub_category WHERE name = '$categoryType'";

            $subCategoryNum = $this->db->query($sql)->result();

            $sql = "SELECT * FROM product WHERE sub_category = " . $subCategoryNum[0]->num . " ORDER BY code DESC";

            $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }


    // info page
    # info, size, category
    public function productInfoView($productCode)
    {
        
        try {
            $sql  = "SELECT p.*, mc.name AS mname, sc.name AS sname ";
            $sql .= "FROM ec.product AS p ";
            $sql .= "JOIN ec.main_category AS mc "; 
            $sql .= "ON p.main_category = mc.num ";
            $sql .= "JOIN ec.sub_category AS sc ";
            $sql .= "ON p.sub_category = sc.num ";
            $sql .= "WHERE p.code = $productCode";

            $result = $this->db->query($sql)->result();


            // $sql = "SELECT * FROM sub_category WHERE sub_category = " . $subCategoryNum[0]->num;

            // $result = $this->db->query($sql)->result();

            if(!$result) return 0;

        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }

    public function productSizeView($productCode)
    {
        try {

           $sql = "SELECT size FROM ec.product_size WHERE product_code = $productCode order by size asc";

           $result = $this->db->query($sql)->result();

           if(!$result) return 0; 

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $result;

    }

    public function searchView($product)
    {

        try {
            
            $sql = "SELECT code, src, name, price FROM product WHERE name like '%$product%'";

            $result = $this->db->query($sql)->result();

            if(!$result) return 0;
            
        } catch (\Throwable $th) {
            
        }

        return $result;

    }

	public function insertProduct($productName, $name, $productPrice, $firstCategory, $secondCategory){
    	$name = "../funnyec/public/picture/$name";

		$sql = "insert into product (name, src, price, main_category, sub_category) values ('$productName', '$name', '$productPrice', '$firstCategory', '$secondCategory')";

		$result = $this->db->query($sql);

		$sql = "SELECT code FROM product where name = '$productName'";

		$key = $this->db->query($sql)->result();

		return $key[0]->code;
	}

	public function insertSize($code, $size){
    	for($i=0; $i <sizeof($size); $i++){
			$sql = "insert into product_size (product_code, size) values ('$code', '$size[$i]')";

			$result = $this->db->query($sql);
		}
	}
}

?>
