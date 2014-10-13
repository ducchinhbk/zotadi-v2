<?php


class ControllerCatalogItinerary extends Controller
{
    private $error = array();

    public function index()
    {
        $this->language->load('catalog/itinerary');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/itinerary');

        $this->getList();
    }

    public function insert()
    {
        $this->language->load('catalog/itinerary');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/itinerary');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_catalog_itinerary->addProduct($this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['filter_name'])) {
                $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_partner'])) {
                $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_price'])) {
                $url .= '&filter_price=' . $this->request->get['filter_price'];
            }
            if (isset($this->request->get['filter_first_name'])) {
                $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
            }
            
            if (isset($this->request->get['filter_date_added'])) {
                $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
            }

            if (isset($this->request->get['filter_status'])) {
                $url .= '&filter_status=' . $this->request->get['filter_status'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->redirect($this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getForm();
    }

    public function update()
    {
        $this->language->load('catalog/itinerary');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/itinerary');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_catalog_itinerary->editProduct($this->request->get['product_id'], $this->request->post);

            //$this->openbay->productUpdateListen($this->request->get['product_id'], $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['filter_name'])) {
                $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_partner'])) {
                $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_price'])) {
                $url .= '&filter_price=' . $this->request->get['filter_price'];
            }
            if (isset($this->request->get['filter_first_name'])) {
                $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
            }
            
            if (isset($this->request->get['filter_date_added'])) {
                $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
            }

            if (isset($this->request->get['filter_status'])) {
                $url .= '&filter_status=' . $this->request->get['filter_status'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->redirect($this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getForm();
    }

    public function delete()
    {
        $this->language->load('catalog/itinerary');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/itinerary');

        if (isset($this->request->post['selected']) && $this->validateDelete()) {
            foreach ($this->request->post['selected'] as $product_id) {
                $this->model_catalog_itinerary->deleteProduct($product_id);
                //$this->openbay->deleteProduct($product_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['filter_name'])) {
                $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_partner'])) {
                $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_first_name'])) {
                $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
            }
            if (isset($this->request->get['filter_price'])) {
                $url .= '&filter_price=' . $this->request->get['filter_price'];
            }
            
            if (isset($this->request->get['filter_date_added'])) {
                $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
            }

            if (isset($this->request->get['filter_status'])) {
                $url .= '&filter_status=' . $this->request->get['filter_status'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->redirect($this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getList();
    }

    public function copy()
    {
        $this->language->load('catalog/itinerary');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/itinerary');

        if (isset($this->request->post['selected']) && $this->validateCopy()) {
            foreach ($this->request->post['selected'] as $product_id) {
                $this->model_catalog_itinerary->copyProduct($product_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['filter_name'])) {
                $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_partner'])) {
                $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
            }

            if (isset($this->request->get['filter_first_name'])) {
                $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
            }
            if (isset($this->request->get['filter_price'])) {
                $url .= '&filter_price=' . $this->request->get['filter_price'];
            }
            if (isset($this->request->get['filter_date_added'])) {
                $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
            }

            if (isset($this->request->get['filter_status'])) {
                $url .= '&filter_status=' . $this->request->get['filter_status'];
            }

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->redirect($this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }

        $this->getList();
    }

    protected function getList()
    {
        if (isset($this->request->get['filter_name'])) {
            $filter_name = $this->request->get['filter_name'];
        } else {
            $filter_name = null;
        }

        if (isset($this->request->get['filter_partner'])) {
            $filter_partner = $this->request->get['filter_partner'];
        } else {
            $filter_partner = null;
        }

        if (isset($this->request->get['filter_first_name'])) {
            $filter_first_name = $this->request->get['filter_first_name'];
        } else {
            $filter_first_name = null;
        }
        if (isset($this->request->get['filter_price'])) {
            $filter_price = $this->request->get['filter_price'];
        } else {
            $filter_price = null;
        }
        
        if (isset($this->request->get['filter_date_added'])) {
            $filter_date_added = $this->request->get['filter_date_added'];
        } else {
            $filter_date_added = null;
        }

        if (isset($this->request->get['filter_status'])) {
            $filter_status = $this->request->get['filter_status'];
        } else {
            $filter_status = null;
        }

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'pd.name';
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

        if (isset($this->request->get['filter_name'])) {
            $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_partner'])) {
            $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_first_name'])) {
            $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
        }
        if (isset($this->request->get['filter_price'])) {
            $url .= '&filter_price=' . $this->request->get['filter_price'];
        }
        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
        }

        if (isset($this->request->get['filter_status'])) {
            $url .= '&filter_status=' . $this->request->get['filter_status'];
        }

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
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL'),
            'separator' => ' :: '
        );

        $this->data['insert'] = $this->url->link('catalog/itinerary/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
        $this->data['copy'] = $this->url->link('catalog/itinerary/copy', 'token=' . $this->session->data['token'] . $url, 'SSL');
        $this->data['delete'] = $this->url->link('catalog/itinerary/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

        $this->data['products'] = array();

        $data = array(
            'filter_name' => $filter_name,
            'filter_partner' => $filter_partner,
            'filter_first_name' => $filter_first_name,
            'filter_price' => $filter_price,
            'filter_date_added' => $filter_date_added,
            'filter_status' => $filter_status,
            'sort' => $sort,
            'order' => $order,
            'start' => ($page - 1) * $this->config->get('config_admin_limit'),
            'limit' => $this->config->get('config_admin_limit')
        );

        $this->load->model('tool/image');

        $product_total = $this->model_catalog_itinerary->getTotalItineraries($data);

        $results = $this->model_catalog_itinerary->getItineraries($data);

        foreach ($results as $result) {
            $action = array();

            $action[] = array(
                'text' => $this->language->get('text_edit'),
                'href' => $this->url->link('catalog/itinerary/update', 'token=' . $this->session->data['token'] . '&itinerary_id=' . $result['itinerary_id'] . $url, 'SSL')
            );

            if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 40, 40);
            } else {
                $image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
            }

            $special = false;

            $this->data['products'][] = array(
                'itinerary_id' => $result['itinerary_id'],
                'name' => $result['name'],
                'partner' => $result['partner'],
                'price' => $result['price'],
                'customer' => $result['customer'],
                'image' => $image,
                'date_added' => date('d-m-Y', strtotime($result['date_added'])),
                'status' => $result['status_name'],
                'selected' => isset($this->request->post['selected']) && in_array($result['itinerary_id'], $this->request->post['selected']),
                'action' => $action
            );
        }

        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_no_results'] = $this->language->get('text_no_results');
        $this->data['text_image_manager'] = $this->language->get('text_image_manager');

        
        $this->data['column_action'] = $this->language->get('column_action');

        $this->data['button_copy'] = $this->language->get('button_copy');
        $this->data['button_insert'] = $this->language->get('button_insert');
        $this->data['button_delete'] = $this->language->get('button_delete');
        $this->data['button_filter'] = $this->language->get('button_filter');

        $this->data['token'] = $this->session->data['token'];

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

        if (isset($this->request->get['filter_name'])) {
            $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_partner'])) {
            $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_first_name'])) {
            $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
        }
        if (isset($this->request->get['filter_price'])) {
            $url .= '&filter_price=' . $this->request->get['filter_price'];
        }
        if (isset($this->request->get['filter_quantity'])) {
            $url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
        }

        if (isset($this->request->get['filter_status'])) {
            $url .= '&filter_status=' . $this->request->get['filter_status'];
        }

        if ($order == 'ASC') {
            $url .= '&order=DESC';
        } else {
            $url .= '&order=ASC';
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $this->data['sort_name'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=pd.name' . $url, 'SSL');
        $this->data['sort_partner'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=partner' . $url, 'SSL');
        $this->data['sort_price'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=i.price' . $url, 'SSL');
        $this->data['sort_fist_name'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=i.first_name' . $url, 'SSL');
        $this->data['sort_date_added'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=i.date_added' . $url, 'SSL');
        $this->data['sort_status'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=i.status' . $url, 'SSL');
        $this->data['sort_order'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . '&sort=i.sort_order' . $url, 'SSL');

        $url = '';

        if (isset($this->request->get['filter_name'])) {
            $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_partner'])) {
            $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_first_name'])) {
            $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
        }
        
        if (isset($this->request->get['filter_price'])) {
            $url .= '&filter_price=' . $this->request->get['filter_price'];
        }
        
        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
        }

        if (isset($this->request->get['filter_status'])) {
            $url .= '&filter_status=' . $this->request->get['filter_status'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        $pagination = new Pagination();
        $pagination->total = $product_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_admin_limit');
        $pagination->text = $this->language->get('text_pagination');
        $pagination->url = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

        $this->data['pagination'] = $pagination->render();

        $this->data['filter_name'] = $filter_name;
        $this->data['filter_partner'] = $filter_partner;
        $this->data['filter_price'] = $filter_price;
        $this->data['filter_first_name'] = $filter_first_name;
        $this->data['filter_date_added'] = $filter_date_added;
        $this->data['filter_status'] = $filter_status;

        $this->data['sort'] = $sort;
        $this->data['order'] = $order;

        $this->template = 'catalog/itinerary_list.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    protected function getForm()
    {
        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_none'] = $this->language->get('text_none');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['text_no'] = $this->language->get('text_no');
        $this->data['text_plus'] = $this->language->get('text_plus');
        $this->data['text_minus'] = $this->language->get('text_minus');
        $this->data['text_default'] = $this->language->get('text_default');
        $this->data['text_image_manager'] = $this->language->get('text_image_manager');
        $this->data['text_browse'] = $this->language->get('text_browse');
        $this->data['text_clear'] = $this->language->get('text_clear');
        $this->data['text_option'] = $this->language->get('text_option');
        $this->data['text_option_value'] = $this->language->get('text_option_value');
        $this->data['text_select'] = $this->language->get('text_select');
        $this->data['text_none'] = $this->language->get('text_none');
        $this->data['text_percent'] = $this->language->get('text_percent');
        $this->data['text_amount'] = $this->language->get('text_amount');

        $this->data['entry_name'] = $this->language->get('entry_name');
        $this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
        $this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
        $this->data['entry_description'] = $this->language->get('entry_description');
        $this->data['entry_itinerary'] = $this->language->get('entry_itinerary');
        $this->data['entry_term_condition'] = $this->language->get('entry_term_condition');
        $this->data['entry_store'] = $this->language->get('entry_store');
        $this->data['entry_keyword'] = $this->language->get('entry_keyword');
        $this->data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
        $this->data['entry_date_available'] = $this->language->get('entry_date_available');
        $this->data['entry_quantity'] = $this->language->get('entry_quantity');
        $this->data['entry_duration'] = $this->language->get('entry_duration');
        $this->data['entry_price'] = $this->language->get('entry_price');
        $this->data['entry_discount_price'] = $this->language->get('entry_discount_price');
        $this->data['entry_image'] = $this->language->get('entry_image');
        $this->data['entry_category'] = $this->language->get('entry_category');
        $this->data['entry_related'] = $this->language->get('entry_related');
        $this->data['entry_text'] = $this->language->get('entry_text');
        $this->data['entry_required'] = $this->language->get('entry_required');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_date_start'] = $this->language->get('entry_date_start');
        $this->data['entry_date_end'] = $this->language->get('entry_date_end');
        $this->data['entry_priority'] = $this->language->get('entry_priority');
        $this->data['entry_tag'] = $this->language->get('entry_tag');
        $this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
       

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');
        $this->data['button_add_attribute'] = $this->language->get('button_add_attribute');
        $this->data['button_add_option'] = $this->language->get('button_add_option');
        $this->data['button_add_option_value'] = $this->language->get('button_add_option_value');
        $this->data['button_add_discount'] = $this->language->get('button_add_discount');
        $this->data['button_add_special'] = $this->language->get('button_add_special');
        $this->data['button_add_image'] = $this->language->get('button_add_image');
        $this->data['button_remove'] = $this->language->get('button_remove');
        $this->data['button_add_profile'] = $this->language->get('button_add_profile');

        $this->data['tab_general'] = $this->language->get('tab_general');
        $this->data['tab_data'] = $this->language->get('tab_data');
        $this->data['tab_image'] = $this->language->get('tab_image');
        $this->data['tab_links'] = $this->language->get('tab_links');
        

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        if (isset($this->error['name'])) {
            $this->data['error_name'] = $this->error['name'];
        } else {
            $this->data['error_name'] = array();
        }

        if (isset($this->error['meta_description'])) {
            $this->data['error_meta_description'] = $this->error['meta_description'];
        } else {
            $this->data['error_meta_description'] = array();
        }

        if (isset($this->error['description'])) {
            $this->data['error_description'] = $this->error['description'];
        } else {
            $this->data['error_description'] = array();
        }

        // Phuongnn add
        if (isset($this->error['itinerary'])) {
            $this->data['error_itinerary'] = $this->error['itinerary'];
        } else {
            $this->data['error_itinerary'] = array();
        }

        if (isset($this->error['term_condition'])) {
            $this->data['error_term_condition'] = $this->error['term_condition'];
        } else {
            $this->data['error_term_condition'] = array();
        }
        
        if (isset($this->error['duration'])) {
            $this->data['error_duration'] = $this->error['duration'];
        } else {
            $this->data['error_duration'] = array();
        }
        
        if (isset($this->error['model'])) {
            $this->data['error_model'] = $this->error['model'];
        } else {
            $this->data['error_model'] = '';
        }

        if (isset($this->error['date_available'])) {
            $this->data['error_date_available'] = $this->error['date_available'];
        } else {
            $this->data['error_date_available'] = '';
        }

        $url = '';

        if (isset($this->request->get['filter_name'])) {
            $url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_partner'])) {
            $url .= '&filter_partner=' . urlencode(html_entity_decode($this->request->get['filter_partner'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_first_name'])) {
            $url .= '&filter_first_name=' . $this->request->get['filter_first_name'];
        }
        
        if (isset($this->request->get['filter_price'])) {
            $url .= '&filter_price=' . $this->request->get['filter_price'];
        }
        
        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
        }

        if (isset($this->request->get['filter_status'])) {
            $url .= '&filter_status=' . $this->request->get['filter_status'];
        }

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
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL'),
            'separator' => ' :: '
        );

        if (!isset($this->request->get['itinerary_id'])) {
            $this->data['action'] = $this->url->link('catalog/itinerary/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
        } else {
            $this->data['action'] = $this->url->link('catalog/itinerary/update', 'token=' . $this->session->data['token'] . '&itinerary_id=' . $this->request->get['itinerary_id'] . $url, 'SSL');
        }

        $this->data['cancel'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'] . $url, 'SSL');

        if (isset($this->request->get['itinerary_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $itinerary_info = $this->model_catalog_itinerary->getItinerary($this->request->get['itinerary_id']);
        }

        $this->data['token'] = $this->session->data['token'];

        $this->load->model('localisation/language');

        $this->data['languages'] = $this->model_localisation_language->getLanguages();

        if (isset($this->request->post['product_description'])) {
            $this->data['product_description'] = $this->request->post['product_description'];
        } elseif (isset($this->request->get['itinerary_id'])) {
            $this->data['product_description'] = $this->model_catalog_itinerary->getItineraryDescriptions($this->request->get['itinerary_id']);
        } else {
            $this->data['product_description'] = array();
        }

       
        
        if (isset($this->request->post['keyword'])) {
            $this->data['keyword'] = $this->request->post['keyword'];
        } elseif (!empty($itinerary_info)) {
            $this->data['keyword'] = $itinerary_info['keyword'];
        } else {
            $this->data['keyword'] = '';
        }

        if (isset($this->request->post['image'])) {
            $this->data['image'] = $this->request->post['image'];
        } elseif (!empty($itinerary_info)) {
            $this->data['image'] = $itinerary_info['image'];
        } else {
            $this->data['image'] = '';
        }

        $this->load->model('tool/image');

        if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
            $this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
        } elseif (!empty($itinerary_info) && $itinerary_info['image'] && file_exists(DIR_IMAGE . $itinerary_info['image'])) {
            $this->data['thumb'] = $this->model_tool_image->resize($itinerary_info['image'], 100, 100);
        } else {
            $this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
        }

        
        if (!empty($itinerary_info)) {
            $this->data['customer'] = $itinerary_info['customer'];
        } else {
            $this->data['customer'] = '';
        }
        
        if (isset($this->request->post['price'])) {
            $this->data['price'] = $this->request->post['price'];
        } elseif (!empty($itinerary_info)) {
            $this->data['price'] = $itinerary_info['price'];
        } else {
            $this->data['price'] = '';
        }
        
        if (isset($this->request->post['dis_price'])) {
            $this->data['dis_price'] = $this->request->post['dis_price'];
        } elseif (!empty($itinerary_info)) {
            $this->data['dis_price'] = $itinerary_info['dis_price'];
        } else {
            $this->data['dis_price'] = '';
        }
        
        $this->load->model('catalog/profile');

        $this->data['profiles'] = $this->model_catalog_profile->getProfiles();


        if (isset($this->request->post['date_available'])) {
            $this->data['date_available'] = $this->request->post['date_available'];
        } elseif (!empty($itinerary_info)) {
            $this->data['date_available'] = date('Y-m-d', strtotime($itinerary_info['date_available']));
        } else {
            $this->data['date_available'] = date('Y-m-d', time() - 86400);
        }


        if (isset($this->request->post['sort_order'])) {
            $this->data['sort_order'] = $this->request->post['sort_order'];
        } elseif (!empty($itinerary_info)) {
            $this->data['sort_order'] = $itinerary_info['sort_order'];
        } else {
            $this->data['sort_order'] = 1;
        }

        if (isset($this->request->post['status'])) {
            $this->data['status'] = $this->request->post['status'];
        } elseif (!empty($itinerary_info)) {
            $this->data['status'] = $itinerary_info['status'];
        } else {
            $this->data['status'] = 1;
        }
        
        if (isset($this->request->post['go_together'])) {
            $this->data['go_together'] = $this->request->post['go_together'];
        } elseif (!empty($itinerary_info)) {
            $this->data['go_together'] = $itinerary_info['go_together'];
        } else {
            $this->data['go_together'] = 0;
        }
        
        // Categories
		$this->load->model('catalog/category');

		if (isset($this->request->post['itinerary_category'])) {
			$categories = $this->request->post['itineraryt_category'];
		} elseif (isset($this->request->get['itinerary_id'])) {		
			$categories = $this->model_catalog_itinerary->getItineraryCategories($this->request->get['itinerary_id']);
		} else {
			$categories = array();
		}

		$this->data['itinerary_categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$this->data['itinerary_categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
				);
			}
		}
        //Partner
        $this->load->model('catalog/partner');

        if (isset($this->request->post['partner_id'])) {
            $this->data['partner_id'] = $this->request->post['partner_id'];
        } elseif (!empty($itinerary_info)) {
            $this->data['partner_id'] = $itinerary_info['partner_id'];
        } else {
            $this->data['partner_id'] = 0;
        }

        if (isset($this->request->post['partner'])) {
            $this->data['partner'] = $this->request->post['partner'];
        } elseif (!empty($itinerary_info)) {
            $partner_info = $this->model_catalog_partner->getpartner($itinerary_info['partner_id']);

            if ($partner_info) {
                $this->data['partner'] = $partner_info['vi_name'];
            } else {
                $this->data['partner'] = '';
            }
        } else {
            $this->data['partner'] = '';
        }

        // Filters
       
        $this->load->model('sale/customer_group');

        $this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();

        // Images
        if (isset($this->request->post['product_image'])) {
            $itinerary_images = $this->request->post['product_image'];
        } elseif (isset($this->request->get['itinerary_id'])) {
            $itinerary_images = $this->model_catalog_itinerary->getItineraryImages($this->request->get['itinerary_id']);
        } else {
            $itinerary_images = array();
        }

        $this->data['product_images'] = array();

        foreach ($itinerary_images as $itinerary_image) {
            if ($itinerary_image['image'] && file_exists(DIR_IMAGE . $itinerary_image['image'])) {
                $image = $itinerary_image['image'];
            } else {
                $image = 'no_image.jpg';
            }

            $this->data['product_images'][] = array(
                'image' => $image,
                'thumb' => $this->model_tool_image->resize($image, 100, 100),
                'sort_order' => $itinerary_image['sort_order']
            );
        }

        $this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

        if (isset($this->request->post['itinerary_related'])) {
            $itineraries = $this->request->post['itinerary_related'];
        } elseif (isset($this->request->get['itinerary_id'])) {
            $itineraries = $this->model_catalog_itinerary->getItineraryRelated($this->request->get['itinerary_id']);
        } else {
            $itineraries = array();
        }

        $this->data['itineraries_related'] = array();

        foreach ($itineraries as $itinerary_id) {
            $related_info = $this->model_catalog_itinerary->getItinerary($itinerary_id);

            if ($related_info) {
                $this->data['itineraries_related'][] = array(
                    'product_id' => $related_info['itinerary_id'],
                    'name' => $related_info['name']
                );
            }
        }
      
        $this->load->model('design/layout');

        $this->data['layouts'] = $this->model_design_layout->getLayouts();

        $this->template = 'catalog/itinerary_form.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    protected function validateForm()
    {
        if (!$this->user->hasPermission('modify', 'catalog/deal')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        foreach ($this->request->post['product_description'] as $language_id => $value) {
            if ((utf8_strlen($value['name']) < 1) || (utf8_strlen($value['name']) > 255)) {
                $this->error['name'][$language_id] = $this->language->get('error_name');
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

    protected function validateDelete()
    {
        if (!$this->user->hasPermission('modify', 'catalog/deal')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

    protected function validateCopy()
    {
        if (!$this->user->hasPermission('modify', 'catalog/deal')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

    public function autocomplete()
    {
        $json = array();

        if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_partner']) || isset($this->request->get['filter_order_id'])) {
            $this->load->model('catalog/itinerary');
            $this->load->model('catalog/option');

            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

            if (isset($this->request->get['filter_order_id'])) {
                $filter_order_id = $this->request->get['filter_order_id'];
            } else {
                $filter_order_id = '';
            }

            if (isset($this->request->get['limit'])) {
                $limit = $this->request->get['limit'];
            } else {
                $limit = 20;
            }

            $data = array(
                'filter_name' => $filter_name,
                'filter_order_id' => $filter_order_id,
                'start' => 0,
                'limit' => $limit
            );

            $results = $this->model_catalog_itinerary->getItineraries($data);

            foreach ($results as $result) {
                $json[] = array(
                    'itinerary_id' => $result['itinerary_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                    'price' => $result['price']
                );
            }
        }

        $this->response->setOutput(json_encode($json));
    }

}

?>