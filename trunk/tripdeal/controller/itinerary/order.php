<?php
class ControllerItineraryOrder extends Controller{
    public function index(){
            $this->document->setTitle($this->config->get('config_title'));
            $this->document->setDescription($this->config->get('config_meta_description'));

            $this->data['heading_title'] = $this->config->get('config_title');
            $LIMIT = 17; 
            //get language_id
            $lang = $this->session->data['language'];
            if($lang == 'en')
                $language_id = 1;
            else 
                $language_id = 2;
                
            $offset = 0;
            //load model
            $this->load->model('catalog/itinerary');
            
            if (isset($this->request->get['page'])) {
    			$page = $this->request->get['page'];
    		} else {
    			$page = 1;
    		}
            $url = '';
            $offset = 0;
            //init pagination class
            $pagination = new Pagination();
            //setup url and pagination offset
            if (isset($this->request->get['page'])) {
    			$url .= '&page=' . $this->request->get['page'];
                $offset = ((int)$page-1)*$LIMIT;
                
    		}
            $total = $this->model_catalog_itinerary->get_total_product();
    		$pagination->total = $total;
    		$pagination->page = $page;
    		$pagination->limit = $LIMIT;
    		$pagination->text = $this->language->get('text_pagination');
    		$pagination->url = $this->url->link('itinerary/order', '&page={page}', '');
            $cateProducts = $this->model_catalog_itinerary->get_product($language_id, $offset, $LIMIT);
            
            $this->data['dataModel'] = $cateProducts;
            $this->data['pagination'] = $pagination->render();
            $this->data['total'] = $total;
            //load template
            $this->template = 'default/template/itinerary/order.tpl';
        
            $this->language->load('travel/itinerary');
           
            $this->data['text_your_itinerary'] = $this->language->get('text_your_itinerary');
        
        
        
        $this->data['redirectUrl'] = $this->url->link('itineray/order');
        $this->response->setOutput($this->render());
    }
}
?>