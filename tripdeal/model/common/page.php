<?php
class ModelCommonPage extends Model{
   
   
    //get product by category ID
    public function getPage($page_id)
    {
        $query = $this->db->query("SELECT vi_name, en_name, vi_description, en_description 
                                    FROM page WHERE page_id = ".(int)$page_id." ");
        
        return $query->row;
    }
   
}
?>