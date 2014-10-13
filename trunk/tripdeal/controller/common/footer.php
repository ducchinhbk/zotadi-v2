<?php

class ControllerCommonFooter extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        $this->template = 'default/template/common/footer.tpl';
        
        $this->language->load('common/footer');
        $this->data['text_feedback'] = $this->language->get('text_feedback');
        $this->data['text_feed_info'] = $this->language->get('text_feed_info');
        $this->data['text_send_feed'] = $this->language->get('text_send_feed');
        $this->data['text_mobile_app'] = $this->language->get('text_mobile_app');
        $this->data['text_time'] = $this->language->get('text_time');
        $this->data['text_connect'] = $this->language->get('text_connect');
        $this->data['text_help'] = $this->language->get('text_help');
        $this->data['text_zotadi'] = $this->language->get('text_zotadi');
        $this->data['text_about_us'] = $this->language->get('text_about_us');
        $this->data['text_contact'] = $this->language->get('text_contact');
        $this->data['text_reruitment'] = $this->language->get('text_reruitment');
        $this->data['text_fback'] = $this->language->get('text_fback');
        $this->data['text_inconvenient'] = $this->language->get('text_inconvenient');
        
        $this->response->setOutput($this->render());
    }
}

?>