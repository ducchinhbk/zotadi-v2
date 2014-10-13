<?php
class ModelCatalogItinerary extends Model{
   
    //get itineraries have accepted
    public function get_accepted_itineraries($language_id, $start = 0, $limit = 20){
         $query = $this->db->query("
            SELECT i.itinerary_id, CONCAT(i.first_name,' ', i.last_name) AS customer, i.image, i.price, i.dis_price, i.date_available, ides.name, ides.duration,
            	(SELECT en_name FROM partner WHERE partner_id = i.partner_id) AS partner_name
            FROM itinerary i LEFT JOIN itinerary_description ides ON i.itinerary_id = ides.itinerary_id
            WHERE language_id = " . (int)$language_id . " AND i.`status` = 3
            ORDER BY i.itinerary_id DESC LIMIT " . (int)$start . "," . (int)$limit);
        
        return $query->rows;
    }
    //get product
    public function get_itineraries($language_id, $start = 0, $limit = 17)
    {
        $query = $this->db->query("
            SELECT p.itinerary_id, p.viewed, p.image, p.price, p.dis_price, p.date_available, pdes.name, pdes.duration 
            FROM itinerary p LEFT JOIN itinerary_description pdes ON p.itinerary_id = pdes.itinerary_id
            WHERE language_id = ".$language_id." 
            ORDER BY p.itinerary_id DESC LIMIT " . (int)$start . "," . (int)$limit);
        
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
    
    //get all product for counting
    public function get_total_accepted_itineraries()
    {
        $query = $this->db->query("SELECT count(*) as total FROM itinerary WHERE status = 3");
        
        return $query->row['total'];
    }
    
    //get a product by product ID
    public function get_itinerary_by_ID($language_id, $product_id)
    {
        $query = $this->db->query("
            SELECT ides.name, i.itinerary_id, i.date_available, i.price, i.partner_id, i.dis_price, ides.duration, ides.description, ides.itinerary, ides.term_condition 
            FROM itinerary i LEFT JOIN itinerary_description ides ON i.itinerary_id = ides.itinerary_id
            WHERE ides.language_id =".$language_id." AND i.itinerary_id = ".$product_id." ");
        
        return $query->row;
    }
    //get get feature product
    public function get_related_itinerary($language_id, $place_to_go_id)
    {
        $query = $this->db->query("
            SELECT p.product_id, pdes.name, p.image, p.price, p.dis_price, p.date_available
            FROM product p LEFT JOIN product_description pdes ON p.product_id = pdes.product_id
            WHERE language_id = $language_id and manufacturer_id = $place_to_go_id
            ORDER BY p.product_id DESC LIMIT 0,5 ");
        
        return $query->rows;
    }
    //get get feature product
    public function get_itinerary_images($itinerary_id)
    {
        $query = $this->db->query(" SELECT image FROM itinerary_image WHERE itinerary_id = $itinerary_id ");
        
        return $query->rows;
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
        
        
        $this->db->query(" INSERT INTO `cungdi_order` SET 
                                customer_id = ".$customer_id.", 
                                firstname = '" . $this->db->escape($data['fname']) . "',
                                lastname = '" . $this->db->escape($data['lname']) . "',
                                email = '" . $this->db->escape($data['email']) . "',
                                telephone = '" . $this->db->escape($data['phone']) . "',
                                shipping_address_1 = '" . $this->db->escape($data['address']) . "',
                                status = 1,
                                itinerary_id = '" . (int) $data['itinerary_id'] . "',
                                total = '" . $data['total'] . "',
                                date_added = NOW()
                                ");
                                
        return true;
    }
}
?>