<?php
class ModelCatalogPartner extends Model{
   
   
    //get product by category ID
    public function get_partner($partner_id)
    {
        $query = $this->db->query("SELECT vi_name, en_name, vi_intro, en_intro, logoImage 
                                    FROM partner WHERE partner_id = ".(int)$partner_id." ");
        
        return $query->row;
    }
    
    //get deals of partner
    public function get_feature_deals($partner_id, $language_id, $start = 0, $limit = 20)
    {
        $query = $this->db->query("SELECT p.product_id, p.viewed, p.image, p.price, p.dis_price, p.date_available, pdes.name, pdes.duration 
                                    FROM product p LEFT JOIN product_description pdes ON p.product_id = pdes.product_id
                                    WHERE language_id = ".$language_id." AND partner_id = ".$partner_id."
                                    ORDER BY p.product_id DESC LIMIT " . (int)$start . "," . (int)$limit." ");
        
        return $query->rows;
    }
    public function get_total_feature_deals($partner_id, $language_id)
    {
        $query = $this->db->query("SELECT COUNT(*) AS total 
                                    FROM product p LEFT JOIN product_description pd ON p.product_id = pd.product_id  
                                    WHERE partner_id = ".(int)$partner_id." AND language_id = ".(int)$language_id." ");
        
        return $query->row['total'];
    }
   
}
?>