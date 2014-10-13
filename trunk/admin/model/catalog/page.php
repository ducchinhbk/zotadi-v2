<?php
class ModelCatalogPage extends Model {
	public function addPage($data) {
		$this->db->query("INSERT INTO page SET 
                                vi_name = '" . $data['vi_name'] . "', 
                                en_name = '" . $data['en_name'] . "', 
                                vi_description = '" . $data['vi_description'] . "',
                                en_description = '" . $data['en_description'] . "', 
                                image = '" . $data['image'] . "',  
                                sort_order = '" . (int)$data['sort_order'] . "',
                                keyword = '" . $data['keyword'] . "', 
                                status = '" . (int)$data['status'] . "', 
                                date_added = NOW() ");

		$this->cache->delete('page');
	}

	public function editPage($page_id, $data) {
	  
		$this->db->query("UPDATE page SET 
                                vi_name = '" . $data['vi_name'] . "', 
                                en_name = '" . $data['en_name'] . "', 
                                vi_description = '" . $data['vi_description'] . "',
                                en_description = '" . $data['en_description'] . "', 
                                image = '" . $data['image'] . "',   
                                sort_order = '" . (int)$data['sort_order'] . "',
                                keyword = '" . $data['keyword'] . "', 
                                status = '" . (int)$data['status'] . "', 
                                date_modified = NOW() 
                                WHERE page_id = '" . (int)$page_id . "'");

		$this->cache->delete('page');
	}

	public function deletePage($page_id) {
		$this->db->query("DELETE FROM page WHERE page_id = '" . (int)$page_id . "'");

		$this->cache->delete('$page_id');
	} 


	public function getPage($page_id) {
		$query = $this->db->query("SELECT * FROM page WHERE page_id = " . $page_id . " ");

		return $query->row;
	} 

	public function getPages($data) {
		$sql = "SELECT page_id, vi_name, sort_order, date_added
                FROM page";
        
        if (!empty($data['filter_name'])) {
			$sql .= " AND vi_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}				

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}


	public function getTotalPages() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "page");

		return $query->row['total'];
	}	

		
}
?>