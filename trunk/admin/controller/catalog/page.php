<?php 
class ControllerCatalogPage extends Controller { 
	private $error = array();

	public function index() {
		$this->language->load('catalog/page');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/page');

		$this->getList();
	}

	public function insert() {
		$this->language->load('catalog/page');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/page');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_page->addPage($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/page', 'token=' . $this->session->data['token'] . $url, 'SSL')); 
		}

		$this->getForm();
	}

	public function update() {
		$this->language->load('catalog/page');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/page');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
		  
			$this->model_catalog_page->editPage($this->request->get['page_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/page', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->language->load('catalog/page');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/page');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $page_id) {
				$this->model_catalog_page->deletePage($page_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/page', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}



	protected function getList() {
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/page', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		$this->data['insert'] = $this->url->link('catalog/page/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('catalog/page/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		

		$this->data['pages'] = array();

		$data = array(
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);

		$page_total = $this->model_catalog_page->getTotalPages();

		$results = $this->model_catalog_page->getPages($data);

		foreach ($results as $result) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('catalog/page/update', 'token=' . $this->session->data['token'] . '&page_id=' . $result['page_id'] . $url, 'SSL')
			);

			$this->data['pages'][] = array(
				'page_id'     => $result['page_id'],
				'name'        => $result['vi_name'],
                'date_added'  => date('d-m-Y',strtotime($result['date_added'])),
				'sort_order'  => $result['sort_order'],
				'selected'    => isset($this->request->post['selected']) && in_array($result['page_id'], $this->request->post['selected']),
				'action'      => $action
			);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_no_results'] = $this->language->get('text_no_results');

	
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		$pagination = new Pagination();
		$pagination->total = $page_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('catalog/page', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->template = 'catalog/page_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_percent'] = $this->language->get('text_percent');
		$this->data['text_amount'] = $this->language->get('text_amount');

	
		$this->data['entry_parent'] = $this->language->get('entry_parent');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
		$this->data['entry_image'] = $this->language->get('entry_image');	
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_layout'] = $this->language->get('entry_layout');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_data'] = $this->language->get('tab_data');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['vi_name'])) {
			$this->data['error_vi_name'] = $this->error['vi_name'];
		} else {
			$this->data['error_vi_name'] = '';
		}
        if (isset($this->error['en_name'])) {
			$this->data['error_en_name'] = $this->error['en_name'];
		} else {
			$this->data['error_en_name'] = '';
		}
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/page', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['page_id'])) {
			$this->data['action'] = $this->url->link('catalog/page/insert', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/page/update', 'token=' . $this->session->data['token'] . '&page_id=' . $this->request->get['page_id'], 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/page', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->get['page_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$page_info = $this->model_catalog_page->getPage($this->request->get['page_id']);
		}

		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['vi_name'])) {
			$this->data['vi_name'] = $this->request->post['vi_name'];
		} elseif (!empty($page_info)) {
			$this->data['vi_name'] = $page_info['vi_name'];
		} else {
			$this->data['vi_name'] = '';
		}
        
        if (isset($this->request->post['en_name'])) {
			$this->data['en_name'] = $this->request->post['en_name'];
		} elseif (!empty($page_info)) {
			$this->data['en_name'] = $page_info['en_name'];
		} else {
			$this->data['en_name'] = '';
		}
        
        if (isset($this->request->post['vi_description'])) {
			$this->data['vi_description'] = $this->request->post['vi_description'];
		} elseif (!empty($page_info)) {
			$this->data['vi_description'] = $page_info['vi_description'];
		} else {
			$this->data['vi_description'] = '';
		}
        
        if (isset($this->request->post['en_description'])) {
			$this->data['en_description'] = $this->request->post['en_description'];
		} elseif (!empty($page_info)) {
			$this->data['en_description'] = $page_info['en_description'];
		} else {
			$this->data['en_description'] = '';
		}
        
	
		if (isset($this->request->post['keyword'])) {
			$this->data['keyword'] = $this->request->post['keyword'];
		} elseif (!empty($page_info)) {
			$this->data['keyword'] = $page_info['keyword'];
		} else {
			$this->data['keyword'] = '';
		}

		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($page_info)) {
			$this->data['image'] = $page_info['image'];
		} else {
			$this->data['image'] = '';
		}
		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($page_info['image'])  && file_exists(DIR_IMAGE . $page_info['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($page_info['image'], 100, 100);
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);



		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($page_info)) {
			$this->data['sort_order'] = $page_info['sort_order'];
		} else {
			$this->data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($page_info)) {
			$this->data['status'] = $page_info['status'];
		} else {
			$this->data['status'] = 1;
		}

		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'catalog/page_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/page')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
        if(isset($this->request->get['vi_name'])){
            if ((utf8_strlen($this->request->get['vi_name']) < 2) || (utf8_strlen($this->request->get['vi_name']) > 255)) {
                $this->error['vi_name'] = $this->language->get('error_name');
            }
        }
        
        if(isset($this->request->get['en_name'])){
            if ((utf8_strlen($this->request->get['en_name']) < 2) || (utf8_strlen($this->request->get['en_name']) > 255)) {
                $this->error['en_name'] = $this->language->get('error_name');
            }
        }
		

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/page')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true; 
		} else {
			return false;
		}
	}



	/*public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/category');

			$data = array(
				'filter_name' => $this->request->get['filter_name'],
				'start'       => 0,
				'limit'       => 20
			);

			$results = $this->model_catalog_category->getCategories($data);

			foreach ($results as $result) {
				$json[] = array(
					'category_id' => $result['category_id'], 
					'name'        => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}		
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->setOutput(json_encode($json));
	}	*/	
}
?>