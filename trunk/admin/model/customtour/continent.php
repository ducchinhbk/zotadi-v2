<?php
class ModelCustomtourContinent extends Model {
	public function addContinent($data) {
		$this->db->query("INSERT INTO tour_custom_continent SET 
                                vi_name = '" . $data['vi_name'] . "', 
                                en_name = '" . $data['en_name'] . "', 
                                vi_description = '" . $data['vi_description'] . "',
                                en_description = '" . $data['en_description'] . "', 
                                image = '" . $data['image'] . "',   
                                sort_order = '" . (int)$data['sort_order'] . "',
                                keyword = '" . $data['keyword'] . "', 
                                status = '" . (int)$data['status'] . "', 
                                date_added = NOW() ");

		$this->cache->delete('tour_custom_continent');
	}

	public function editContinent($continent_id, $data) {
		
        $this->db->query("UPDATE tour_custom_continent SET 
                                vi_name = '" . $data['vi_name'] . "', 
                                en_name = '" . $data['en_name'] . "', 
                                vi_description = '" . $data['vi_description'] . "',
                                en_description = '" . $data['en_description'] . "', 
                                image = '" . $data['image'] . "',   
                                sort_order = '" . (int)$data['sort_order'] . "',
                                keyword = '" . $data['keyword'] . "', 
                                status = '" . (int)$data['status'] . "', 
                                date_modified = NOW() 
                                WHERE continent_id = '" . (int)$continent_id . "'");

		$this->cache->delete('tour_custom_continent');
	}

	public function deleteContinent($continent_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "tour_custom_continent WHERE continent_id = '" . (int)$continent_id . "'");

		$this->cache->delete('tour_custom_continent');
	} 

	public function getContinent($continent_id) {
		$query = $this->db->query("SELECT * FROM tour_custom_continent c WHERE continent_id = " . $continent_id . "");

		return $query->row;
	} 

	public function getContinents($data) {
		$sql = "SELECT continent_id, vi_name, sort_order
                FROM tour_custom_continent";

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



	public function getTotalContinents() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tour_custom_continent");

		return $query->row['total'];
	}	

		
}
?>