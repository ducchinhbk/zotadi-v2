<?php

class ControllerCommonHeader extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->session->data['language'] = $this->request->post['language_code'];

            $url = $this->request->post['redirectUrl'];
            if (isset($url)) {
                $this->redirect($url);
            } else {
                $this->redirect($this->url->link('travel/custom'));
            }
        }
        if (!isset($this->request->get['route'])) {
            $this->data['redirectUrl'] = $this->url->link('common/home');
        } else {
            $data = $this->request->get;

            unset($data['_route_']);

            $route = $data['route'];

            unset($data['route']);

            $url = '';

            if ($data) {
                $url = '&' . urldecode(http_build_query($data, '', '&'));
            }

            $this->data['redirectUrl'] = $this->url->link($route, $url);
        }

        $this->template = 'default/template/common/header.tpl';


        $this->language->load('common/header');
        $this->data['text_home'] = $this->language->get('text_home');
        $this->data['text_deal_travel'] = $this->language->get('text_deal_travel');
        $this->data['text_login'] = $this->language->get('text_login');
        $this->data['text_together'] = $this->language->get('text_together');
        $this->data['text_check_order'] = $this->language->get('text_check_order');

        $this->response->setOutput($this->render());
    }

    public function language()
    {
        if (isset($_POST['language_code'])) {
            $this->session->data['language'] = $_POST['language_code'];

            if (isset($this->request->get['redirectUrl'])) {
                $this->redirect($this->request->get['redirectUrl']);
            } else {
                $this->redirect($this->url->link('travel/custom'));
            }
        }
    }
}

?>