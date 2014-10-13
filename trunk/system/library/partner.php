<?php
class Partner {
	private $partner_id;
	private $username;
	private $permission = array();

	public function __construct($registry) {
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
        
		if (isset($this->session->data['partner_id'])) {
			$user_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partner WHERE partner_id = '" . (int)$this->session->data['partner_id'] . "' AND status = '1'");

			if ($user_query->num_rows) {
				$this->partner_id = $user_query->row['partner_id'];
				$this->username = $user_query->row['username'];

				$this->db->query("UPDATE " . DB_PREFIX . "partner SET ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE partner_id = '" . (int)$this->session->data['partner_id'] . "'");

				
			} else {
				$this->logout();
			}
		}
       
	}

	public function login($username, $password) {
       
		$user_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partner WHERE username = '" . $this->db->escape($username) . "' AND password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $this->db->escape($password) . "'))))) AND status = '1'");

		if ($user_query->num_rows) {
			$this->session->data['partner_id'] = $user_query->row['partner_id'];

			$this->partner_id = $user_query->row['partner_id'];
			$this->username = $user_query->row['username'];			


			return true;
		} else {
			return false;
		}
	}
    
	public function logout() {
		unset($this->session->data['partner_id']);

		$this->partner_id = '';
		$this->username = '';

		session_destroy();
	}
    
    
	public function hasPermission($key, $value) {
		if (isset($this->permission[$key])) {
			return in_array($value, $this->permission[$key]);
		} else {
			return false;
		}
	}

	public function isLogged() {
		return $this->partner_id;
	}

	public function getId() {
		return $this->partner_id;
	}

	public function getUserName() {
		return $this->username;
	}
}
?>