<?php
class ControllerTravelTogether extends Controller{
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
            $total = $this->model_catalog_itinerary->get_total_accepted_itineraries();
    		$pagination->total = $total;
    		$pagination->page = $page;
    		$pagination->limit = $LIMIT;
    		$pagination->text = $this->language->get('text_pagination');
    		$pagination->url = $this->url->link('travel/together', '&page={page}', '');
            
            //get accepted itineraries
            $this->load->helper('customize'); 
            $this->load->model('tool/image');
            
            $this->data['itineraries'] = array();
            $itineraries = $this->model_catalog_itinerary->get_accepted_itineraries($language_id, $offset, $LIMIT);
            
            foreach ($itineraries as $result) {
                
                if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
                    $image = $this->model_tool_image->resize($result['image'], 430, 207);
                } else {
                    $image = $this->model_tool_image->resize('front_no_image.jpg', 430, 207);
                }
    
                $special = false;
    
                $this->data['itineraries'][] = array(
                    'itinerary_id'  => $result['itinerary_id'],
                    'name'          => $result['name'],
                    'customer'      => $result['customer'],
                    'partner_name'  => $result['partner_name'],
                    'price'         => $result['price'],
                    'dis_price'     => $result['dis_price'],
                    'duration'      => $result['duration'],
                    'image'         => $image,
                    'url'           => '/'.DIR_ROOT_NAME.'/?route=travel/todetail&tour='.encrypt_product_id($result['itinerary_id'] )
                );
            }
            
            $this->data['pagination'] = $pagination->render();
            $this->data['total'] = $total;
            //load template
            $this->template = 'default/template/travel/together.tpl';
        

            $this->children = array(
                'common/header',
                'common/footer',
            );
            $this->language->load('travel/together');
            $this->data['text_home']        = $this->language->get('text_home');
            $this->data['text_deal_travel'] = $this->language->get('text_deal_travel');
            $this->data['text_slide_text1'] = $this->language->get('text_slide_text1');
            $this->data['text_slide_text2'] = $this->language->get('text_slide_text2');
            $this->data['text_intro']       = $this->language->get('text_intro');
        
        
        
        $this->data['redirectUrl'] = $this->url->link('travel/together');
        $this->response->setOutput($this->render());
    }
}
?>