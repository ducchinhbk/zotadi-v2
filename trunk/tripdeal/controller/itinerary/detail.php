<?php

class ControllerItineraryDetail extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        //get language_id
        $lang = $this->session->data['language'];
        if($lang == 'en')
            $language_id = 1;
        else 
            $language_id = 2;
        if (!isset($this->request->get['tour']))
            $this->redirect($this->url->link('travel/custom'));
        //get real tourID by derypting    
        $this->load->helper('customize');      
        $product_id =  decrypt_product_id($this->request->get['tour']);
        
        $this->load->model('catalog/itinerary');
        $product = $this->model_catalog_itinerary->get_product_by_ID($language_id, $product_id);
        $this->data['product'] = $product;
        //get related product
        $place_to_go_id = $product[0]['manufacturer_id'];
        $related_products = $this->model_catalog_itinerary->get_related_product($language_id, $place_to_go_id);
        $this->data['related_products'] = $related_products;
        //get product images
        $product_images = $this->model_catalog_itinerary->get_product_images($product_id);
        $this->data['product_images'] = $product_images;
        
        $this->template = 'default/template/itinerary/detail.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        $this->language->load('travel/itinerary');
        $this->data['text_where_you_go'] = $this->language->get('text_where_you_go');
        
        $this->data['text_home'] = $this->language->get('text_home');
        $this->data['text_deal_travel'] = $this->language->get('text_deal_travel');
        
        $this->data['text_start_place'] = $this->language->get('text_start_place');
        $this->data['text_over_view'] = $this->language->get('text_over_view');
        $this->data['text_itinary'] = $this->language->get('text_itinary');
        $this->data['text_note'] = $this->language->get('text_note');
        $this->data['text_contact'] = $this->language->get('text_contact');
        $this->data['text_keep_secret'] = $this->language->get('text_keep_secret');
        $this->data['text_feature_tour'] = $this->language->get('text_feature_tour');
        
        $this->data['text_confirmed_code'] = $this->language->get('text_confirmed_code');
        $this->data['text_buynow'] = $this->language->get('text_buynow');
        $this->data['text_service_provider'] = $this->language->get('text_service_provider');
        
        $this->data['redirectUrl'] = $this->url->link('itinerary/detail');
        $this->response->setOutput($this->render());
    }
}

?>