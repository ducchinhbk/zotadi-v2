<?php

class ControllerCommonHotdeal extends Controller
{
    public function index()
    {
        $LIMIT = 6;
        $this->load->model('catalog/product');

        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        $this->template = 'default/template/common/hotdeal.tpl';
        

        $index = 0;
        $typeRequest = 'newReceived';
        if (isset($_POST['index'])) {
            $index = $_POST['index'];
        }
        $dataModel = $this->model_catalog_product->getNewProductListReceive($typeRequest, $index, $LIMIT);
        $this->data['dataModel'] = $dataModel;
        $this->data['redirectUrl'] = $this->url->link('common/hotdeal');

        $this->response->setOutput($this->render());
    }
}

?>