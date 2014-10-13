<?php
class ModelCatalogPartner extends Model {
	public function addPartner($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "partner SET vi_name = '" . $this->db->escape($data['vi_name']) . 
                        "', en_name = '" . $this->db->escape($data['en_name']).
                        "', vi_intro = '" . $this->db->escape($data['vi_intro']).
                        "', en_intro = '" . $this->db->escape($data['en_intro']).
                        "', username = '" . $this->db->escape($data['username']).
                        "', salt = '" . $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) .
                        "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))).
                        "', email = '" . $this->db->escape($data['email']).
                        "', phone = '" . $this->db->escape($data['phone']).
                        "', status = '" . $this->db->escape($data['status']).
                        "', ip = '" . $this->db->escape($data['ip']).
                        "', seo_keyword = '" . $this->db->escape($data['seo_keyword']) . "'");

		$partner_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "partner SET logoImage = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE partner_id = '" . (int)$partner_id . "'");
		}

		
		$this->cache->delete('partner');
	}

	public function editPartner($partner_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "partner SET vi_name = '" . $this->db->escape($data['vi_name']) . 
                        "', en_name = '" . $this->db->escape($data['en_name']).
                        "', vi_intro = '" . $this->db->escape($data['vi_intro']).
                        "', en_intro = '" . $this->db->escape($data['en_intro']).
                        "', username = '" . $this->db->escape($data['username']).
                        "', email = '" . $this->db->escape($data['email']).
                        "', phone = '" . $this->db->escape($data['phone']).
                        "', status = '" . $this->db->escape($data['status']).
                        "', ip = '" . $this->db->escape($data['ip']).
                        "', seo_keyword = '" . $this->db->escape($data['seo_keyword']).
                        "' WHERE partner_id = '" . (int)$partner_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "partner SET logoImage = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE partner_id = '" . (int)$partner_id . "'");
		}


		$this->cache->delete('partner');
	}

	public function deletePartner($partner_id) {
		$this->db->query("DELETE FROM partner WHERE partner_id = '" . (int)$partner_id . "'");
	
		$this->cache->delete('partner');
	}	

	public function getPartner($partner_id) {
		$query = $this->db->query("SELECT * FROM partner WHERE partner_id = '" . (int)$partner_id . "'");

		return $query->row;
	}

        public function getPartnerByUsername($username) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "partner` WHERE username = '" . $this->db->escape($username) . "'");

		return $query->row;
	}
        
	public function getPartners($data = array()) {
		$sql = "SELECT * FROM partner";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE vi_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sort_data = array(
			'vi_name',
			'sort_order'
		);	

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY vi_name";	
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
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



	public function getTotalManufacturersByImageId($image_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "manufacturer WHERE image_id = '" . (int)$image_id . "'");

		return $query->row['total'];
	}

	public function getTotalPartners() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM partner");

		return $query->row['total'];
	}
    public function getPartnerAutoComplete()
    {
        $sql = "SELECT * FROM partner";

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
    
    public function changePartnerPassword($partner_id, $newPass) {
        $this->db->query("UPDATE " . DB_PREFIX .
                "partner SET password = '" . $this->db->escape($newPass).
                "' WHERE partner_id = '" . (int)$partner_id . "'");
        
        $this->cache->delete('partner');
    }
}
?>