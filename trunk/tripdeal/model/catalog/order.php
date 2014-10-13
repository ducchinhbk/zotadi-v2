<?php
class ModelCatalogOrder extends Model{
   
    //get itineraries have accepted
    public function get_order($order_id){
         $query = $this->db->query("    SELECT *
                                        FROM tour_custom_orders
                                        WHERE custom_tour_order_id = " . (int)$order_id . " ");
        
        return $query->row;
    }
    //get product
    public function get_itineraries($language_id, $order_id)
    {
        $query = $this->db->query(" SELECT i.itinerary_id, i.image, i.price, id.name, 
                                    	(SELECT NAME FROM itinerary_status WHERE status_id = i.status) AS status_name,
                                    	(SELECT en_name FROM partner WHERE partner_id = i.partner_id) AS partner
                                    FROM itinerary i LEFT JOIN itinerary_description id ON i.itinerary_id = id.itinerary_id 
                                    WHERE tour_custom_order_id = ".$language_id." AND id.language_id = ".$order_id." ");
        
        return $query->rows;
    }
   
}
?>