<?php

class ControllerCommonProductFull extends Controller
{
    public function index()
    {
        $LIMIT = 8;
        $this->load->model('catalog/product');

        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/product_portrait.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/common/product_portrait.tpl';
        } else {
            $this->template = 'default/template/common/product_portrait.tpl';
        }

        $index = 0;
        $typeRequest = 'full';
        if (isset($_POST['index'])) {
            $index = $_POST['index'];
        }
        $dataModel = $this->model_catalog_product->getNewProductListReceive($typeRequest, $index, $LIMIT);
        $this->data['dataModel'] = $dataModel;

        $this->response->setOutput($this->render());
    }
}

?>