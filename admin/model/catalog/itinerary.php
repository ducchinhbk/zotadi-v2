<?php
class ModelCatalogItinerary extends Model {
	public function addProduct($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "product SET partner_id = '" . $this->db->escape($data['partner_id']) . "', productType = 1, date_available = '" . $this->db->escape($data['date_available']) . "', price = '" . (float)$data['price'] . "', dis_price = '" . (float)$data['dis_price'] . "', status = '" . (int)$data['status'] . "', go_together = '" . (int)$data['go_together'] . "', sort_order = '" . (int)$data['sort_order'] . "', date_added = NOW()");

		$product_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET image = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE product_id = '" . (int)$product_id . "'");
		}

		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET product_id = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', duration = '" . $this->db->escape($value['duration']) . "', description = '" . $this->db->escape($value['description']) . "', itinerary = '" . $this->db->escape($value['itinerary']) . "', term_condition = '" . $this->db->escape($value['term_condition']) . "', tag = '" . $this->db->escape($value['tag']) . "'");
		}

		if (isset($data['product_image'])) {
			foreach ($data['product_image'] as $product_image) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET product_id = '" . (int)$product_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
			}
		}

	   if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int)$product_id . "', category_id = '" . (int)$category_id . "'");
			}
		}

		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$product_id . "', related_id = '" . (int)$related_id . "'");
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$related_id . "' AND related_id = '" . (int)$product_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$related_id . "', related_id = '" . (int)$product_id . "'");
			}
		}

		

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'itinerary_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}


		$this->cache->delete('product');
	}

	public function editProduct($product_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET   date_available = '" . $this->db->escape($data['date_available']) . "', partner_id = '" . (int)$data['partner_id'] . "', price = '" . (float)$data['price'] . "', dis_price = '" . (float)$data['dis_price'] . "', status = '" . (int)$data['status'] . "', go_together = '" . (int)$data['go_together'] . "', sort_order = '" . (int)$data['sort_order'] . "', date_modified = NOW() WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET image = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE product_id = '" . (int)$product_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");

		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET product_id = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', duration = '" . $this->db->escape($value['duration']) . "', description = '" . $this->db->escape($value['description']) . "', itinerary = '" . $this->db->escape($value['itinerary']) . "', term_condition = '" . $this->db->escape($value['term_condition']) . "', tag = '" . $this->db->escape($value['tag']) . "'");
		}

	
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_image'])) {
			foreach ($data['product_image'] as $product_image) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET product_id = '" . (int)$product_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
			}
		}
        
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int)$product_id . "', category_id = '" . (int)$category_id . "'");
			}		
		}
        
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE related_id = '" . (int)$product_id . "'");

		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$product_id . "', related_id = '" . (int)$related_id . "'");
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$related_id . "' AND related_id = '" . (int)$product_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$related_id . "', related_id = '" . (int)$product_id . "'");
			}
		}



		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'itinerary_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		
	}

	public function copyProduct($product_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		if ($query->num_rows) {
			$data = array();

			$data = $query->row;
			$data['viewed'] = '0';
			$data['keyword'] = '';
			$data['status'] = '0';

			//$data = array_merge($data, array('product_attribute' => $this->getProductAttributes($product_id)));
			$data = array_merge($data, array('product_description' => $this->getProductDescriptions($product_id)));			
			//$data = array_merge($data, array('product_discount' => $this->getProductDiscounts($product_id)));
			//$data = array_merge($data, array('product_filter' => $this->getProductFilters($product_id)));
			$data = array_merge($data, array('product_image' => $this->getProductImages($product_id)));		
			//$data = array_merge($data, array('product_option' => $this->getProductOptions($product_id)));
			$data = array_merge($data, array('product_related' => $this->getProductRelated($product_id)));
			//$data = array_merge($data, array('product_reward' => $this->getProductRewards($product_id)));
			//$data = array_merge($data, array('product_special'  => $this->getProductSpecials($product_id)));
			$data = array_merge($data, array('product_category' => $this->getProductCategories($product_id)));
			//$data = array_merge($data, array('product_download' => $this->getProductDownloads($product_id)));
			//$data = array_merge($data, array('product_layout' => $this->getProductLayouts($product_id)));
			//$data = array_merge($data, array('product_store' => $this->getProductStores($product_id)));
			//$data = array_merge($data, array('product_profiles' => $this->getProfiles($product_id)));
			$this->addProduct($data);
		}
	}

	public function deleteProduct($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE related_id = '" . (int)$product_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");
		
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");
		
		//$this->db->query("DELETE FROM `" . DB_PREFIX . "product_profile` WHERE `product_id` = " . (int)$product_id);
		//$this->db->query("DELETE FROM " . DB_PREFIX . "review WHERE product_id = '" . (int)$product_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");

		$this->cache->delete('product');
	}

	public function getItinerary($itinerary_id) {
		$query = $this->db->query("SELECT DISTINCT *, CONCAT(i.first_name, ' ', i.last_name) AS customer,
                                        (SELECT keyword FROM url_alias WHERE query = 'itinerary_id=" . (int)$itinerary_id . "') AS keyword 
                                   FROM itinerary i LEFT JOIN itinerary_description pd ON (i.itinerary_id = pd.itinerary_id) 
                                   WHERE i.itinerary_id = '" . (int)$itinerary_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getItineraries($data = array()) {
		$sql = "SELECT i.itinerary_id, pd.name, i.image, CONCAT(i.first_name,' ', i.last_name) as customer,
                       (SELECT vi_name FROM partner WHERE partner_id = i.partner_id) AS partner,
                       i.price, i.dis_price, i.date_added, i.partner_id, i.status, i.tour_custom_order_id,
                       (SELECT `name` FROM itinerary_status WHERE status_id = i.status) AS `status_name`
                FROM itinerary i LEFT JOIN itinerary_description pd ON i.itinerary_id = pd.itinerary_id
                WHERE pd.language_id = 2";

		
		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.name LIKE '%" . $this->db->escape($data['filter_name']) . "'";
		}

		if (!empty($data['filter_partner'])) {
			$sql .= " AND i.partner_id IN (SELECT partner_id FROM partner WHERE vi_name LIKE '" . $this->db->escape($data['filter_partner']) . "%')";
		}

		if (!empty($data['filter_first_name'])) {
			$sql .= " AND i.first_name ='" . $this->db->escape($data['filter_first_name']) . "'";
		}
        
        if (!empty($data['filter_price'])) {
			$sql .= " AND i.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}
        
		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND i.date_added = '" . $this->db->escape($data['filter_date_added']) . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND i.status = '" . (int)$data['filter_status'] . "'";
		}

		//$sql .= " ORDER BY p.status";

		$sort_data = array(
			'pd.name',
			'partner',
            'i.first_name',
			'i.price',
			'i.date_added',
			'i.status',
			'i.sort_order'
		);	

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY pd.name";	
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
    
	public function getProductsByCategoryId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p2c.category_id = '" . (int)$category_id . "' ORDER BY pd.name ASC");

		return $query->rows;
	} 
    public function getProdutStatus()
    {
        $query = $this->db->query("SELECT * FROM product_status ");

		return $query->rows;
    }

	public function getItineraryDescriptions($itinerary_id) {
		$product_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "itinerary_description WHERE itinerary_id = '" . (int)$itinerary_id . "'");

		foreach ($query->rows as $result) {
			$itinerary_description_data[$result['language_id']] = array(
				'name'             => $result['name'],
				'description'      => $result['description'],
                                'itinerary'        => $result['itinerary'],
                                'term_condition'   => $result['term_condition'],
                                'duration'   => $result['duration'],
				'meta_keyword'     => $result['meta_keyword'],
				'meta_description' => $result['meta_description'],
				'tag'              => $result['tag']
			);
		}

		return $itinerary_description_data;
	}
    	
	public function getItineraryCategories($itinerary_id) {
		$itinerary_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "itinerary_to_category WHERE itinerary_id = '" . (int)$itinerary_id . "'");

		foreach ($query->rows as $result) {
			$itinerary_category_data[] = $result['category_id'];
		}

		return $itinerary_category_data;
	}
	public function getProductCategoryID($product_id) {
		$product_category_data = array();

		$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_category_data = $result['category_id'];
		}

		return $product_category_data;
	}


	public function getItineraryImages($itinerary_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "itinerary_image WHERE itinerary_id = '" . (int)$itinerary_id . "'");

		return $query->rows;
	}



	public function getItineraryRelated($itinerary_id) {
		$itinerary_related_data = array();

		$query = $this->db->query("SELECT * FROM itinerary_related WHERE itinerary_id = '" . (int)$itinerary_id . "'");

		foreach ($query->rows as $result) {
			$itinerary_related_data[] = $result['related_id'];
		}

		return $itinerary_related_data;
	}

	public function getProfiles($product_id) {
		return $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_profile` WHERE product_id = " . (int)$product_id)->rows;
	}

	public function getTotalItineraries($data = array()) {
		$sql = "SELECT COUNT(DISTINCT i.itinerary_id) AS total FROM itinerary i LEFT JOIN itinerary_description pd ON (i.itinerary_id = pd.itinerary_id)
                WHERE pd.language_id = 2";

		
		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.name LIKE '%" . $this->db->escape($data['filter_name']) . "'";
		}

		if (!empty($data['filter_partner'])) {
			$sql .= " AND i.partner_id IN (SELECT partner_id FROM partner WHERE vi_name LIKE '" . $this->db->escape($data['filter_partner']) . "%')";
		}

		if (!empty($data['filter_first_name'])) {
			$sql .= " AND i.first_name = '" . $this->db->escape($data['filter_first_name']) . "'";
		}
        
        if (!empty($data['filter_price'])) {
			$sql .= " AND i.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}
        
		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$sql .= " AND i.date_added = '" . $this->db->escape($data['filter_date_added']) . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND i.status = '" . (int)$data['filter_status'] . "'";
		}
        
		$query = $this->db->query($sql);

		return $query->row['total'];
	}	

}
?>
