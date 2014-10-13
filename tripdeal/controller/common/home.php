<?php

class ControllerCommonHome extends Controller
{
    public function index()
    {
        
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        $this->template = 'default/template/common/home.tpl';
        
        $this->children = array(
            'common/header',
            'common/search',
            'common/footer',
            'common/hotdeal',
            'common/newdeal'
        );

        $this->data['redirectUrl'] = $this->url->link('common/home');
        $this->response->setOutput($this->render());
    }

}

?>