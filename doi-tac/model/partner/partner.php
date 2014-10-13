<?php
class ModelPartnerPartner extends Model {
	
	public function editPassword($partner_id, $password) {
	  
		$this->db->query("UPDATE `" . DB_PREFIX . "partner` SET 
                            salt = '" . $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', 
                            password = '" . (sha1($salt . sha1($salt . sha1($this->db->escape($password))))) . "'  
                            WHERE partner_id = '" . (int)$partner_id . "'");
	   $this->cache->delete('partner');
    }

	
	public function getPartner($partner_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "partner` WHERE partner_id = '" . (int)$partner_id . "'");

		return $query->row;
	}
	
}
?>