<?php

class ControllerCommonPage extends Controller
{
    public function index()
    {
        $this->load->model('common/page');

        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        
        if (isset($this->request->get['page'])) {
			$page_id = $this->request->get['page'];
		} else {
			$page_id = '';
		}
        $page_info = $this->model_common_page->getPage($page_id);
        
        
        if (!empty($page_info)) {
            if($this->session->data['language'] == 'en')
			     $this->data['name'] = $page_info['en_name'];
            else
			     $this->data['name'] = $page_info['vi_name'];
		}
        else{
            $this->data['name'] = '';
        }
        
        if (!empty($page_info)) {
            if($this->session->data['language'] == 'en')
			     $this->data['description'] = $page_info['en_description'];
            else
			     $this->data['description'] = $page_info['vi_description'];
		}
        else
        {
            $this->data['description'] = '';
        }
        
        
        $this->template = 'default/template/common/page.tpl';
        
        $this->children = array(
            'common/header',
            'common/footer'
        );
        
        $this->data['redirectUrl'] = $this->url->link('common/page');

        $this->response->setOutput($this->render());
    }
}

?>