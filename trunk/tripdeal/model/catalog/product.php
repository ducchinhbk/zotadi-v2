<?php
class ModelCatalogProduct extends Model{
   
    //get product by category ID
    public function get_products($language_id, $start = 0, $limit = 17)
    {
        $query = $this->db->query("
            SELECT p.product_id, p.viewed, p.image, p.price, p.dis_price, p.date_available, pdes.name, pdes.duration 
            FROM product p LEFT JOIN product_description pdes ON p.product_id = pdes.product_id
            WHERE language_id = ".$language_id."
            ORDER BY p.product_id DESC LIMIT " . (int)$start . "," . (int)$limit);
        
        return $query->rows;
    }
    //get all product for counting
    public function get_total_product()
    {
        $query = $this->db->query("SELECT product_id FROM product");
        $total = count($query->rows);
        return $total;
    }
    
    //get a product by product ID
    public function get_product_by_ID($language_id, $product_id)
    {
        $query = $this->db->query("
            SELECT pdes.name, p.product_id, p.partner_id, p.date_available, p.price, p.dis_price, pdes.duration, pdes.description, pdes.itinerary, pdes.term_condition 
            FROM product p LEFT JOIN product_description pdes ON p.product_id = pdes.product_id
            WHERE pdes.language_id = ".$language_id." AND p.product_id = ".$product_id." ");
        
        return $query->row;
    }
    //get get same destination product
    public function get_related_products($language_id, $product_id)
    {
        $query = $this->db->query("SELECT p.product_id, pdes.name, p.image, p.price, p.dis_price, p.date_available
                                   FROM product p LEFT JOIN product_description pdes ON p.product_id = pdes.product_id
                                   WHERE language_id = ".$language_id." 
                            	        AND p.product_id IN (SELECT related_id FROM product_related pr WHERE pr.product_id = ".$product_id.")
                                        ORDER BY p.product_id DESC LIMIT 0,5 ");
        
        return $query->rows;
    }
    //get get feature product
    public function get_product_images($product_id)
    {
        $query = $this->db->query(" SELECT image FROM product_image WHERE product_id = $product_id ");
        
        return $query->rows;
    }
    
    //get partner infor by itinerary ID
    public function get_partner($partner_id){
        $query = $this->db->query("
            SELECT partner_id, vi_name, en_name, logoImage, vi_intro, en_intro 
            FROM partner 
            WHERE partner_id = ".$partner_id."");
        
        return $query->row;
    }
    //insert order
    public function insert_order($data)
    {
        if(empty($data))
            return false;
        $query = $this->db->query(" SELECT customer_id 
                                    FROM customer WHERE email = '" . $this->db->escape($data['email']) . "' ");
        
        if(count($query->rows)!= 0){
            $customer_id = $query->row['customer_id'];
            
        }
        else
        {
            $this->db->query(" INSERT INTO customer SET
                                firstname = '" . $this->db->escape($data['fname']) . "',
                                lastname = '" . $this->db->escape($data['lname']) . "',
                                email = '" . $this->db->escape($data['email']) . "',
                                telephone = '" . $this->db->escape($data['phone']) . "',
                                address1 = '" . $this->db->escape($data['address']) . "',
                                date_added = NOW()
                                ");
            $customer_id = $this->db->getLastId();
            
        }
        
        
        $this->db->query(" INSERT INTO `order` SET 
                                customer_id = ".$customer_id.", 
                                firstname = '" . $this->db->escape($data['fname']) . "',
                                lastname = '" . $this->db->escape($data['lname']) . "',
                                email = '" . $this->db->escape($data['email']) . "',
                                telephone = '" . $this->db->escape($data['phone']) . "',
                                shipping_address_1 = '" . $this->db->escape($data['address']) . "',
                                status = 1,
                                product_id = '" . (int) $data['product_id'] . "',
                                total = '" . $data['total'] . "',
                                date_added = NOW()
                                ");
                                
        return true;
    }
}
?>