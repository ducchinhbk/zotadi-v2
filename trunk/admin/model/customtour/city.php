<?php
class ModelCustomtourCity extends Model {
	public function addCity($data) {
		$this->db->query("INSERT INTO tour_custom_city SET 
                                vi_name = '" . $data['vi_name'] . "', 
                                en_name = '" . $data['en_name'] . "', 
                                vi_description = '" . $data['vi_description'] . "',
                                en_description = '" . $data['en_description'] . "', 
                                image = '" . $data['image'] . "', 
                                parent_id = '" . (int)$data['parent_id'] . "',  
                                sort_order = '" . (int)$data['sort_order'] . "',
                                keyword = '" . $data['keyword'] . "', 
                                status = '" . (int)$data['status'] . "', 
                                date_added = NOW() ");

		$this->cache->delete('tour_custom_city');
	}

	public function editCity($city_id, $data) {
	  
		$this->db->query("UPDATE tour_custom_city SET 
                                vi_name = '" . $data['vi_name'] . "', 
                                en_name = '" . $data['en_name'] . "', 
                                vi_description = '" . $data['vi_description'] . "',
                                en_description = '" . $data['en_description'] . "', 
                                image = '" . $data['image'] . "', 
                                parent_id = '" . (int)$data['parent_id'] . "',  
                                sort_order = '" . (int)$data['sort_order'] . "',
                                keyword = '" . $data['keyword'] . "', 
                                status = '" . (int)$data['status'] . "', 
                                date_modified = NOW() 
                                WHERE city_id = '" . (int)$city_id . "'");

		$this->cache->delete('tour_custom_city');
	}

	public function deleteCity($city_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tour_custom_city WHERE city_id = '" . (int)$city_id . "'");

		$this->cache->delete('tour_custom_city');
	} 


	public function getCity($city_id) {
		$query = $this->db->query("SELECT *, 
                                        (SELECT vi_name FROM tour_custom_country WHERE country_id = c.parent_id ) AS country
                                        FROM tour_custom_city c WHERE city_id = " . $city_id . " ");

		return $query->row;
	} 

	public function getCities($data) {
		$sql = "SELECT city_id, vi_name, sort_order, 
                        (SELECT vi_name FROM tour_custom_country WHERE country_id = c.parent_id ) AS country
                FROM tour_custom_city c";
        
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


	public function getTotalCities() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tour_custom_city");

		return $query->row['total'];
	}	

		
}
?>