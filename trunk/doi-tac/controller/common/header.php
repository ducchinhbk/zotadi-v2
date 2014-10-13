<?php

class ControllerCommonHeader extends Controller
{
    protected function index()
    {
        $this->data['title'] = $this->document->getTitle();

        if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
            $this->data['base'] = HTTPS_SERVER;
        } else {
            $this->data['base'] = HTTP_SERVER;
        }

        $this->data['description'] = $this->document->getDescription();
        $this->data['keywords'] = $this->document->getKeywords();
        $this->data['links'] = $this->document->getLinks();
        $this->data['styles'] = $this->document->getStyles();
        $this->data['scripts'] = $this->document->getScripts();
        $this->data['lang'] = $this->language->get('code');
        $this->data['direction'] = $this->language->get('direction');

        $this->language->load('common/header');

        $this->data['heading_title'] = $this->language->get('heading_title');
        
        
        $this->data['text_catalog'] = $this->language->get('text_catalog');
        $this->data['text_category'] = $this->language->get('text_category');
        $this->data['text_confirm'] = $this->language->get('text_confirm');
        $this->data['text_sale'] = $this->language->get('text_sale');
        $this->data['text_documentation'] = $this->language->get('text_documentation');
        $this->data['text_front'] = $this->language->get('text_front');
        $this->data['text_dashboard'] = $this->language->get('text_dashboard');
        $this->data['text_help'] = $this->language->get('text_help');
        $this->data['text_language'] = $this->language->get('text_language');
        $this->data['text_logout'] = $this->language->get('text_logout');
        $this->data['text_contact'] = $this->language->get('text_contact');
        $this->data['text_manager'] = $this->language->get('text_manager');
        $this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
        $this->data['text_order'] = $this->language->get('text_order');
        $this->data['text_order_status'] = $this->language->get('text_order_status');
        $this->data['text_opencart'] = $this->language->get('text_opencart');
        $this->data['text_payment'] = $this->language->get('text_payment');
        $this->data['text_product'] = $this->language->get('text_product');
        
        if (!$this->partner->isLogged() || !isset($this->request->get['token']) || !isset($this->session->data['token']) || ($this->request->get['token'] != $this->session->data['token'])) {
            $this->data['logged'] = '';

            $this->data['home'] = $this->url->link('common/login', '', 'SSL');
        } else {
            $this->data['logged'] = sprintf($this->language->get('text_logged'), $this->partner->getUserName());
            $this->data['pp_express_status'] = $this->config->get('pp_express_status');

            $this->data['home'] = $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['category'] = $this->url->link('catalog/category', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['error_log'] = $this->url->link('tool/error_log', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['logout'] = $this->url->link('common/logout', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['contact'] = $this->url->link('sale/contact', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['manager'] = $this->url->link('extension/manager', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['manufacturer'] = $this->url->link('catalog/manufacturer', 'token=' . $this->session->data['token'], 'SSL');
            
            
            $this->data['order'] = $this->url->link('sale/order', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['dealorder'] = $this->url->link('sale/dealorder', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['order_status'] = $this->url->link('localisation/order_status', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['product'] = $this->url->link('catalog/itinerary', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['deal'] = $this->url->link('catalog/deal', 'token=' . $this->session->data['token'], 'SSL');
            
            $this->data['aboutus'] = $this->url->link('setting/common', 'token=' . $this->session->data['token'], 'SSL');
            $this->data['changepass'] = $this->url->link('setting/common/changepass', 'token=' . $this->session->data['token'], 'SSL');
            

            $this->data['stores'] = array();

            $this->load->model('setting/store');

            $results = $this->model_setting_store->getStores();

            foreach ($results as $result) {
                $this->data['stores'][] = array(
                    'name' => $result['name'],
                    'href' => $result['url']
                );
            }
        }

        $this->template = 'common/header.tpl';

        $this->render();
    }
}

?>