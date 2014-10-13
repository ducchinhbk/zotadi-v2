<?php

class ControllerTravelCheckorder extends Controller
{
    public function index()
    {
        

        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        
        
        $this->language->load('travel/checkorder');
        $this->data['text_title'] = $this->language->get('text_title');
        $this->data['text_order_status'] = $this->language->get('text_order_status');
        $this->data['text_order_position'] = $this->language->get('text_order_position');
        $this->data['text_shipping'] = $this->language->get('text_shipping');
        $this->data['text_order_code'] = $this->language->get('text_order_code');
        $this->data['text_order_email'] = $this->language->get('text_order_email');
        $this->data['text_check_now'] = $this->language->get('text_check_now');
        
        $this->template = 'default/template/travel/checkorder.tpl';
        
        $this->children = array(
            'common/header',
            'common/footer'
        );
        
        
        
        $this->data['redirectUrl'] = $this->url->link('travel/checkorder');

        $this->response->setOutput($this->render());
    }
    
}

?>