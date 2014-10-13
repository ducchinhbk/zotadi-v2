<?php

class ControllerTravelTodetail extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        
        $this->load->model('catalog/itinerary');
        
        if (!isset($this->request->get['tour']))
            $this->redirect($this->url->link('travel/custom'));
        
        //process form buy now
         if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
                $data = array();
                $data['fname']        = $this->filterSqlInjection($this->request->post['txtFirstname']);
                $data['lname']        = $this->filterSqlInjection($this->request->post['txtLastname']);
                $data['address']      = $this->filterSqlInjection($this->request->post['txtAddress']);
                $data['phone']        = $this->filterSqlInjection($this->request->post['txtPhone']);
                $data['email']        = $this->filterSqlInjection($this->request->post['txtEmail']);
                $data['itinerary_id']   = $this->request->post['itinerary_id'];
                $data['total']        = $this->request->post['price'];
                
                $this->model_catalog_itinerary->insert_order($data);   
                
                $this->redirect($this->url->link('travel/checkout'));
               
                
            }  
           
        //get language_id
        $lang = $this->session->data['language'];
        if($lang == 'en')
            $language_id = 1;
        else 
            $language_id = 2;
            
        
        //get real tourID by derypting    
        $this->load->helper('customize');      
        $itinerary_id =  decrypt_product_id($this->request->get['tour']);
        
        $this->load->model('tool/image');
        
        $itinerary = $this->model_catalog_itinerary->get_itinerary_by_ID($language_id, $itinerary_id);
        $this->data['itinerary'] = $itinerary;
        
        //get partner info
        $this->data['partner'] = array();
        $partner_info = $this->model_catalog_itinerary->get_partner($itinerary['partner_id']);
        
        if($partner_info){
            if ($partner_info['logoImage'] && file_exists(DIR_IMAGE . $partner_info['logoImage'])) {
                $image= $this->model_tool_image->resize($partner_info['logoImage'], 60, 60);
            } else {
                $image = $this->model_tool_image->resize('no_image.jpg', 60, 60);
            }
            if($lang == 'en')
            {
                $partner_name = $partner_info['en_name'];
                $partner_intro = $partner_info['en_intro'];
            }  
            else
            {
                $partner_name = $partner_info['vi_name'];
                $partner_intro = $partner_info['vi_intro'];
            } 
            $this->data['partner'] = array(
                'image' => $image,
                'name' => $partner_name,
                'introduction' =>$partner_intro,
                'url'       => '/'.DIR_ROOT_NAME.'/?route=travel/partner&partner_id='.encrypt_product_id($partner_info['partner_id'] )
             );
        }
        
        //get product images
        $this->data['product_images'] = array();
        $product_images = $this->model_catalog_itinerary->get_itinerary_images($itinerary_id);

        foreach ($product_images as $image) {
            
            if ($image['image'] && file_exists(DIR_IMAGE . $image['image'])) {
                $large_image = $this->model_tool_image->resize($image['image'], 995, 367);
                $small_image = $this->model_tool_image->resize($image['image'], 120, 44);
            } else {
                $large_image = $this->model_tool_image->resize('no_image.jpg', 995, 367);
                $small_image = $this->model_tool_image->resize('no_image.jpg', 50, 60);
            }

            $special = false;

            $this->data['product_images'][] = array(
                'large_image' => $large_image,
                'small_image' => $small_image
             );
        }
        
        
        
        $this->template = 'default/template/travel/todetail.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        $this->language->load('travel/todetail');
        
        $this->data['text_start_place'] = $this->language->get('text_start_place');
        $this->data['text_over_view'] = $this->language->get('text_over_view');
        $this->data['text_itinary'] = $this->language->get('text_itinary');
        $this->data['text_note'] = $this->language->get('text_note');
        $this->data['text_contact'] = $this->language->get('text_contact');
        $this->data['text_keep_secret'] = $this->language->get('text_keep_secret');
        $this->data['text_feature_tour'] = $this->language->get('text_feature_tour');
        $this->data['text_price_person'] = $this->language->get('text_price_person');
        $this->data['text_service_provider'] = $this->language->get('text_service_provider');
        $this->data['text_start_date'] = $this->language->get('text_start_date');
        $this->data['text_num_date'] = $this->language->get('text_num_date');
        $this->data['text_fname'] = $this->language->get('text_fname');
        $this->data['text_lname'] = $this->language->get('text_lname');
        $this->data['text_address'] = $this->language->get('text_address');
        $this->data['text_telephone'] = $this->language->get('text_telephone');
        $this->data['text_email'] = $this->language->get('text_email');
        $this->data['text_buynow'] = $this->language->get('text_buynow');
        $this->data['text_error_fname'] = $this->language->get('text_error_fname');
        $this->data['text_error_lname'] = $this->language->get('text_error_lname');
        $this->data['text_error_address'] = $this->language->get('text_error_address');
        $this->data['text_error_phone'] = $this->language->get('text_error_phone');
        $this->data['text_error_email'] = $this->language->get('text_error_email');
        
        $this->data['redirectUrl'] = $this->url->link('travel/detail');
        $this->response->setOutput($this->render());
        
    }
    
    protected function filterSqlInjection($string){
        $keyword = array("SELECT","select", "DELETE", "delete", 
                        "ALTER", "alter", "DROP", "drop", "INSERT", "insert", "UPDATE", "update");
        return str_replace($keyword, "", $string);
    }
}

?>