<?php    
class ControllerCatalogPartner extends Controller { 
	private $error = array();

	public function index() {
		$this->language->load('catalog/partner');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/partner');

		$this->getList();
	}

	public function insert() {
		$this->language->load('catalog/partner');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/partner');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_partner->addPartner($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success_insert');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function update() {
		$this->language->load('catalog/partner');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/partner');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_partner->editPartner($this->request->get['partner_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success_update');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->language->load('catalog/partner');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/partner');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $partner_id) {
				$this->model_catalog_partner->deletePartner($partner_id);
			}

			$this->session->data['success'] = $this->language->get('text_success_delete');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

                        $this->redirect($this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {
                if (isset($this->request->get['filter_name_vi'])) {
                    $this->data['filter_name_vi'] = $this->request->get['filter_name_vi'];
                } else {
                    $this->data['filter_name_vi'] = null;
                }
                if (isset($this->request->get['filter_name_en'])) {
                    $this->data['filter_name_en'] = $this->request->get['filter_name_en'];
                } else {
                    $this->data['filter_name_en'] = null;
                }
                
                if (isset($this->request->get['filter_intro_vi'])) {
                    $this->data['filter_intro_vi'] = $this->request->get['filter_intro_vi'];
                } else {
                    $this->data['filter_intro_vi'] = null;
                }
                if (isset($this->request->get['filter_intro_en'])) {
                    $this->data['filter_intro_en'] = $this->request->get['filter_intro_en'];
                } else {
                    $this->data['filter_intro_en'] = null;
                }
                
                if (isset($this->request->get['filter_phone'])) {
                    $this->data['filter_phone'] = $this->request->get['filter_phone'];
                } else {
                    $this->data['filter_phone'] = null;
                }
                if (isset($this->request->get['filter_email'])) {
                    $this->data['filter_email'] = $this->request->get['filter_email'];
                } else {
                    $this->data['filter_email'] = null;
                }
        
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'vi_name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

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
			'href'      => $this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		$this->data['insert'] = $this->url->link('catalog/partner/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('catalog/partner/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');	

		$this->data['partners'] = array();

		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);

                $this->load->model('tool/image');
                
		$partner_total = $this->model_catalog_partner->getTotalPartners();

		$results = $this->model_catalog_partner->getPartners($data);

		foreach ($results as $result) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('catalog/partner/update', 'token=' . $this->session->data['token'] . '&partner_id=' . $result['partner_id'] . $url, 'SSL')
			);
                        
                        if ($result['logoImage'] && file_exists(DIR_IMAGE . $result['logoImage'])) {
                            $image = $this->model_tool_image->resize($result['logoImage'], 40, 40);
                        } else {
                            $image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
                        }

			$this->data['partners'][] = array(
				'partner_id'        => $result['partner_id'],
                                'logoImage'         => $image,
				'vi_name'           => $result['vi_name'],
                                'en_name'           => $result['en_name'],
				'sort_order'        => $result['partner_id'],
                                'vi_intro'          => $result['vi_intro'],
                                'en_intro'          => $result['en_intro'],
				'phone'             => $result['phone'],
                                'email'             => $result['email'],
				'selected'          => isset($this->request->post['selected']) && in_array($result['partner_id'], $this->request->post['selected']),
				'action'            => $action
			);
		}	

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_no_results'] = $this->language->get('text_no_results');

		$this->data['column_company_name_vi'] = $this->language->get('company_name_vi');
                $this->data['column_company_name_en'] = $this->language->get('company_name_en');
                $this->data['column_intro_vi'] = $this->language->get('intro_title_vi');
                $this->data['column_intro_en'] = $this->language->get('intro_title_en');
                $this->data['column_phone'] = $this->language->get('phone');
                $this->data['column_email'] = $this->language->get('email');
		$this->data['column_sort_order'] = $this->language->get('column_sort_order');
		$this->data['column_action'] = $this->language->get('column_action');		

		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
                $this->data['button_filter'] = 'Filter';

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

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['sort_name'] = $this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$this->data['sort_sort_order'] = $this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $partner_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'catalog/partner_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');			
		$this->data['text_percent'] = $this->language->get('text_percent');
		$this->data['text_amount'] = $this->language->get('text_amount');

		$this->data['company_name_vi'] = $this->language->get('company_name_vi');
                $this->data['company_name_en'] = $this->language->get('company_name_en');
                $this->data['intro_title_vi'] = $this->language->get('intro_title_vi');
                $this->data['intro_title_en'] = $this->language->get('intro_title_en');
                $this->data['username_title'] = $this->language->get('username');
                $this->data['email_title'] = $this->language->get('email');
                $this->data['password_title'] = $this->language->get('password');
                $this->data['phone_title'] = $this->language->get('phone');
                $this->data['status_title'] = $this->language->get('status');
                
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

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
                
                if (isset($this->error['vi_intro'])) {
			$this->data['error_vi_intro'] = $this->error['vi_intro'];
		} else {
			$this->data['error_vi_intro'] = '';
		}
                
                if (isset($this->error['username'])) {
			$this->data['error_username'] = $this->error['username'];
		} else {
			$this->data['error_username'] = '';
		}
                
                if (isset($this->error['username_exists'])) {
			$this->data['error_username_exists'] = $this->error['username_exists'];
		} else {
			$this->data['error_username_exists'] = '';
		}

                if (isset($this->error['password'])) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}
                
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

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
			'href'      => $this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['partner_id'])) {
			$this->data['action'] = $this->url->link('catalog/partner/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/partner/update', 'token=' . $this->session->data['token'] . '&partner_id=' . $this->request->get['partner_id'] . $url, 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/partner', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['partner_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$partner_info = $this->model_catalog_partner->getPartner($this->request->get['partner_id']);
		}

		$this->data['token'] = $this->session->data['token'];

                /*Load company name in VN*/
		if (isset($this->request->post['vi_name'])) {
			$this->data['vi_name'] = $this->request->post['vi_name'];
		} elseif (!empty($partner_info)) {
			$this->data['vi_name'] = $partner_info['vi_name'];
		} else {	
			$this->data['vi_name'] = '';
		}
                
                /*Load company name in EN*/
		if (isset($this->request->post['en_name'])) {
			$this->data['en_name'] = $this->request->post['en_name'];
		} elseif (!empty($partner_info)) {
			$this->data['en_name'] = $partner_info['en_name'];
		} else {	
			$this->data['en_name'] = '';
		}

                /*Load introduce in VN*/
		if (isset($this->request->post['vi_intro'])) {
			$this->data['vi_intro'] = $this->request->post['vi_intro'];
		} elseif (!empty($partner_info)) {
			$this->data['vi_intro'] = $partner_info['vi_intro'];
		} else {	
			$this->data['vi_intro'] = '';
		}
                
                /*Load introduce in EN*/
		if (isset($this->request->post['en_intro'])) {
			$this->data['en_intro'] = $this->request->post['en_intro'];
		} elseif (!empty($partner_info)) {
			$this->data['en_intro'] = $partner_info['en_intro'];
		} else {	
			$this->data['en_intro'] = '';
		}
                
                /*Load Username*/
		if (isset($this->request->post['username'])) {
			$this->data['username'] = $this->request->post['username'];
		} elseif (!empty($partner_info)) {
			$this->data['username'] = $partner_info['username'];
		} else {	
			$this->data['username'] = '';
		}
                
                /*Load Email*/
		if (isset($this->request->post['email'])) {
			$this->data['email'] = $this->request->post['email'];
		} elseif (!empty($partner_info)) {
			$this->data['email'] = $partner_info['email'];
		} else {	
			$this->data['email'] = '';
		}
                
                /*Process for password*/
		if (isset($this->request->post['password'])) {
			$this->data['password'] = $this->request->post['password'];
		} elseif (!empty($partner_info)) {
			$this->data['password'] = $partner_info['password'];
		} else {	
			$this->data['password'] = '';
		}

                /*Load Phone*/
		if (isset($this->request->post['phone'])) {
			$this->data['phone'] = $this->request->post['phone'];
		} elseif (!empty($partner_info)) {
			$this->data['phone'] = $partner_info['phone'];
		} else {	
			$this->data['phone'] = '';
		}
                
                /*Load Status*/
		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($partner_info)) {
			$this->data['status'] = $partner_info['status'];
		} else {	
			$this->data['status'] = '';
		}
                
                /*Load seo_keyword*/
		if (isset($this->request->post['seo_keyword'])) {
			$this->data['seo_keyword'] = $this->request->post['seo_keyword'];
		} elseif (!empty($partner_info)) {
			$this->data['seo_keyword'] = $partner_info['seo_keyword'];
		} else {	
			$this->data['seo_keyword'] = '';
		}
                
		/*$this->load->model('setting/store');

		$this->data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['manufacturer_store'])) {
			$this->data['manufacturer_store'] = $this->request->post['manufacturer_store'];
		} elseif (isset($this->request->get['manufacturer_id'])) {
			$this->data['manufacturer_store'] = $this->model_catalog_manufacturer->getManufacturerStores($this->request->get['manufacturer_id']);
		} else {
			$this->data['manufacturer_store'] = array(0);
		}	

		if (isset($this->request->post['keyword'])) {
			$this->data['keyword'] = $this->request->post['keyword'];
		} elseif (!empty($manufacturer_info)) {
			$this->data['keyword'] = $manufacturer_info['keyword'];
		} else {
			$this->data['keyword'] = '';
		}
        */
		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($partner_info)) {
			$this->data['image'] = $partner_info['logoImage'];
		} else {
			$this->data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($partner_info) && $partner_info['logoImage'] && file_exists(DIR_IMAGE . $partner_info['logoImage'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($partner_info['logoImage'], 100, 100);
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($partner_info)) {
			$this->data['sort_order'] = $partner_info['partner_id'];
		} else {
			$this->data['sort_order'] = '';
		}

		$this->template = 'catalog/partner_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}  
        
	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/partner')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['vi_name']) < 3) || (utf8_strlen($this->request->post['vi_name']) > 256)) {
			$this->error['vi_name'] = $this->language->get('error_vi_name');
		}
                
                if (utf8_strlen($this->request->post['vi_intro']) < 3) {
			$this->error['vi_intro'] = $this->language->get('error_vi_intro');
		}
                
                if (utf8_strlen($this->request->post['username']) < 3) {
			$this->error['username'] = $this->language->get('error_username');
		}
                
                $user_info = $this->model_catalog_partner->getPartnerByUsername($this->request->post['username']);
		if (isset($this->request->post['username']) && $user_info) {
                    if (isset($this->request->get['partner_id'])){
			if ( $this->request->get['partner_id'] != $user_info['partner_id']) {
				$this->error['username_exists'] = $this->language->get('username_exists');
			}
                    } else {
                        $this->error['username_exists'] = $this->language->get('username_exists');
                    }
		}
                
                if (isset($this->request->post['password']) && utf8_strlen($this->request->post['password']) < 5) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/partner')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}  
	}

	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/partner');

			$data = array(
				'filter_name' => $this->request->get['filter_name'],
				'start'       => 0,
				'limit'       => 20
			);

			$results = $this->model_catalog_partner->getPartnerAutoComplete($data);

			foreach ($results as $result) {
				$json[] = array(
					'partner_id' => $result['partner_id'], 
					'name'      => strip_tags(html_entity_decode($result['vi_name'], ENT_QUOTES, 'UTF-8'))
				);
			}		
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->setOutput(json_encode($json));
	}	
}
?>