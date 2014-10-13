<?php  
class ControllerSettingCommon extends Controller {
	private $error = array();

	public function index() {
	   
		$this->language->load('setting/common');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('partner/partner');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_user_user->editUser($this->request->get['user_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

		}
         $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('setting/common', 'token=' . $this->session->data['token'] , 'SSL'),
            'separator' => ' :: '
        );
        
        $this->data['action'] = $this->url->link('setting/common', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['cancel'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');   
		
        
        
        $this->template = 'setting/info.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}


	public function changepass() {
		$this->language->load('setting/common');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('partner/partner');
        
        
        
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
		  
			$this->model_partner_partner->editPassword($this->session->data['partner_id'], $this->request->post['password']);
            
            $this->redirect($this->url->link('common/logout', '', 'SSL'));
		}
        
        if (isset($this->error['error_name'])) {
			$this->data['error'] = $this->error['error_name'];
		} else {
			$this->data['error'] = '';
		}
        
        $this->data['action'] = $this->url->link('setting/common/changepass', 'token=' . $this->session->data['token'] . '&partner_id=' .$this->session->data['partner_id']);
        
		$this->template = 'setting/changepass.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
    protected function validateForm() {
       
		if (isset($this->request->post['password'] )) {
		   
			if ((utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 40)) {
				$this->error['error_name'] = $this->language->get('error_password');
                
			}

			if ($this->request->post['password'] != $this->request->post['confirm']) {
				$this->error['error_name'] = $this->language->get('error_confirm');
			}
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	

}
?>