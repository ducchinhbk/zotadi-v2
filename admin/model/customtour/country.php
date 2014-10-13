<?php
class ModelCustomtourCountry extends Model {
	public function addCountry($data) {
		
        $this->db->query("INSERT INTO tour_custom_country SET 
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

		$this->cache->delete('tour_custom_country');
	}

	public function editCountry($country_id, $data) {
	   
       $this->db->query("UPDATE tour_custom_country SET 
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
                                WHERE country_id = '" . (int)$country_id . "'");

		$this->cache->delete('tour_custom_country');
	}

	public function deleteCountry($country_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tour_custom_country WHERE country_id = '" . (int)$country_id . "'");

		$this->cache->delete('tour_custom_country');
	} 



	public function getCountry($country_id) {
		$query = $this->db->query("SELECT *, 
                                        (SELECT vi_name FROM tour_custom_continent WHERE continent_id = c.parent_id ) AS continent
                                    FROM tour_custom_country c WHERE country_id = " . $country_id . "");

		return $query->row;
	} 

	public function getCountries($data) {
		$sql = "SELECT country_id, vi_name, sort_order, 
                        (SELECT vi_name FROM tour_custom_continent WHERE continent_id = c.parent_id ) AS continent
                FROM tour_custom_country c ";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE vi_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
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



	public function getTotalCountries() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tour_custom_country");

		return $query->row['total'];
	}	

		
}
?>