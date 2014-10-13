<?php

class ControllerTravelCheckout extends Controller
{
    
    public function index()
    {
            $this->document->setTitle($this->config->get('config_title'));
            $this->document->setDescription($this->config->get('config_meta_description'));
    
            $this->data['heading_title'] = $this->config->get('config_title');
            
            $this->template = 'default/template/travel/checkout.tpl';
            $this->children = array(
                'common/header',
                'common/footer'
            );
            
            $this->language->load('travel/checkout');
            $this->data['text_order_title'] = $this->language->get('text_order_title');
            $this->data['text_order_content'] = $this->language->get('text_order_content');
            $this->data['text_order_wish'] = $this->language->get('text_order_wish');
            $this->data['text_note'] = $this->language->get('text_note');
            
            
            $this->data['redirectUrl'] = $this->url->link('travel/checkout');
            $this->response->setOutput($this->render());
    }
    
    
}

?>