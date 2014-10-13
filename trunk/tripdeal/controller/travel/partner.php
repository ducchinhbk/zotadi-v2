<?php

class ControllerTravelPartner extends Controller
{
    public function index()
    {
        $this->load->model('catalog/partner');

        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');
        
        if (!isset($this->request->get['partner_id']))
            $this->redirect($this->url->link('travel/custom'));
            
        $this->load->helper('customize');  
        $this->load->model('tool/image');    
        $partner_id =  decrypt_product_id($this->request->get['partner_id']);
          
        $LIMIT = 20; 
        $lang = $this->session->data['language'];
        if($lang == 'en')
        $language_id = 1;
        else 
        $language_id = 2;
         
                
        //get partner information
        $this->data['partner'] = array();
        $partner_info = $this->model_catalog_partner->get_partner($partner_id);
       
        if($partner_info){
            if ($partner_info['logoImage'] && file_exists(DIR_IMAGE . $partner_info['logoImage'])) {
                $image= $this->model_tool_image->resize($partner_info['logoImage'], 60, 60);
            } else {
                $image = $this->model_tool_image->resize('no_image.jpg', 60, 60);
            }
            if($lang == 'en')
            {
                $partner_name = $partner_info['en_name'];
            }  
            else
            {
                $partner_name = $partner_info['vi_name'];
            } 
            $this->data['partner'] = array(
                'image' => $image,
                'name' => $partner_name
            );
        } 
          
         //get partner deals  
         if (isset($this->request->get['page'])) {
    			$page = $this->request->get['page'];
    		} else {
    			$page = 1;
    		}
            $url = '';
            $offset = 0;
            
            $pagination = new Pagination();
            
            if (isset($this->request->get['page'])) {
    			$url .= '&page=' . $this->request->get['page'];
                $offset = ((int)$page-1)*$LIMIT;
                
    		}
            $total = $this->model_catalog_partner->get_total_feature_deals($partner_id, $language_id);
    		$pagination->total = $total;
    		$pagination->page = $page;
    		$pagination->limit = $LIMIT;
    		$pagination->text = $this->language->get('text_pagination');
    		$pagination->url = $this->url->link('travel/partner', '&page={page}', '');
            $this->data['pagination'] = $pagination->render();
            $this->data['total'] = $total;
            
            $this->data['deals'] = array();
            $deals = $this->model_catalog_partner->get_feature_deals($partner_id, $language_id, $offset, $LIMIT);
            
            foreach ($deals as $result) {
                
                if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
                    $image = $this->model_tool_image->resize($result['image'], 430, 207);
                } else {
                    $image = $this->model_tool_image->resize('front_no_image.jpg', 430, 207);
                }
                $percent = cal_percent($result['price'], $result['dis_price']);
                $special = false;
    
                $this->data['deals'][] = array(
                    'product_id'  => $result['product_id'],
                    'name'          => $result['name'],
                    'price'         => $result['price'],
                    'dis_price'     => $result['dis_price'],
                    'duration'      => $result['duration'],
                    'percent'       =>$percent,
                    'image'         => $image,
                    'url'           => '/'.DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($result['product_id'] )
                );
            }
       
        
        
        $this->template = 'default/template/travel/partner.tpl';
        
        $this->children = array(
            'common/header',
            'common/footer'
        );
         $this->language->load('travel/partner');
        $this->data['text_feature_deal'] = $this->language->get('text_feature_deal');
        
        
        $this->data['redirectUrl'] = $this->url->link('travel/partner');

        $this->response->setOutput($this->render());
    }
}

?>