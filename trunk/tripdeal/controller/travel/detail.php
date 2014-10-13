<?php

class ControllerTravelDetail extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        
        $this->load->model('catalog/product');
        
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
                $data['product_id']   = $this->request->post['product_id'];
                $data['total']        = $this->request->post['dis_price'];
                
                $this->model_catalog_product->insert_order($data);   
                
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
        $product_id =  decrypt_product_id($this->request->get['tour']);
        
        $this->load->model('tool/image');
        
        $product = $this->model_catalog_product->get_product_by_ID($language_id, $product_id);
        $this->data['product'] = $product;
        
        //get partner info
        $this->data['partner'] = array();
        $partner_info = $this->model_catalog_product->get_partner($product['partner_id']);
       
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
                'url'       => '/'.DIR_ROOT_NAME.'/?route=travel/partner&partner_id='.encrypt_product_id($partner_info['partner_id'])
             );
        }
        
        //get related product
        $this->data['related_products'] = array();
        $related_products = $this->model_catalog_product->get_related_products($language_id, $product_id);
        
        foreach ($related_products as $result) {
            
            if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 235, 115);
            } else {
                $image = $this->model_tool_image->resize('no_image.jpg', 235, 115);
            }

            $special = false;

            $this->data['related_products'][] = array(
                'product_id' => $result['product_id'],
                'name'      => $result['name'],
                'price'     => $result['price'],
                'dis_price' => $result['dis_price'],
                'image'     => $image,
                'url'       => '/'.DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($result['product_id'] )
            );
        }
        
        //get product images
        $this->data['product_images'] = array();
        $product_images = $this->model_catalog_product->get_product_images($product_id);

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
        
        
        
        $this->template = 'default/template/travel/detail.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        $this->language->load('travel/detail');
        
        $this->data['text_start_place'] = $this->language->get('text_start_place');
        $this->data['text_over_view'] = $this->language->get('text_over_view');
        $this->data['text_itinary'] = $this->language->get('text_itinary');
        $this->data['text_note'] = $this->language->get('text_note');
        $this->data['text_contact'] = $this->language->get('text_contact');
        $this->data['text_keep_secret'] = $this->language->get('text_keep_secret');
        $this->data['text_feature_tour'] = $this->language->get('text_feature_tour');
        $this->data['text_provider'] = $this->language->get('text_provider');
        $this->data['text_original_price'] = $this->language->get('text_original_price');
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