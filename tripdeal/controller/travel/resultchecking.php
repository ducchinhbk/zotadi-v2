<?php

class ControllerTravelResultchecking extends Controller
{
    public function index()
    {
        
        
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        $this->load->model('catalog/order');
        
        $lang = $this->session->data['language'];
        if($lang == 'en')
            $language_id = 1;
        else 
            $language_id = 2;
        
        $order_code = $this->request->post['order_code'];
        
        $this->load->model('tool/image');
        /*
        $this->data['itineraries'] = array();
        $results = $this->model_catalog_order->get_itineraries($language_id, $order_id);
        
        foreach ($results as $result) {
            
            if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 80, 60);
            } else {
                $image = $this->model_tool_image->resize('no_image.jpg', 80, 60);
            }

            $this->data['itineraries'][] = array(
                'itinerary_id' => $result['itinerary_id'],
                'name' => $result['name'],
                'partner' => $result['partner'],
                'price' => $result['price'],
                'image' => $image,
                'status' => $result['status_name']
            );
        }
       */
       
        $this->language->load('travel/checkorder');
        $this->data['text_title'] = $this->language->get('text_title');
        $this->data['text_order_status'] = $this->language->get('text_order_status');
        $this->data['text_order_position'] = $this->language->get('text_order_position');
        $this->data['text_shipping'] = $this->language->get('text_shipping');
        $this->data['text_order_code'] = $this->language->get('text_order_code');
        $this->data['text_order_email'] = $this->language->get('text_order_email');
        $this->data['text_check_now'] = $this->language->get('text_check_now');
        
        $this->template = 'default/template/travel/resultchecking.tpl';
        
        $this->children = array(
            'common/header',
            'common/footer'
        );
        
        
        
        $this->data['redirectUrl'] = $this->url->link('travel/resultchecking');

        $this->response->setOutput($this->render());
    }
    
}

?>