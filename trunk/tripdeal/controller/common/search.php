<?php
class ControllerCommonSearch extends Controller {
    public function index() {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        if($_SERVER['REQUEST_METHOD']=="POST" && $this->validateForm())
        {
            $this->redirect($this->url->link('common/search/searchresult'));
        }
        else
        {
            $this->template = 'default/template/common/form_search.tpl';
        }
        
        $this->response->setOutput($this->render());
    }
    public function searchResult()
    {
        
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        
        $this->template = 'default/template/travel/search_result.tpl';
        $this->children = array(
            'common/header',
            'common/search',
            'common/footer',
        );
        $this->response->setOutput($this->render());
    }
	public function validateForm()
	{
		return true;
	}
}
?>