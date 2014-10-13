<?php

class ControllerCommonFeedback extends Controller
{
    public function index()
    {
        $email = '';
        $message = '';
        if (isset($_POST['message'])) {
            $message = $_POST['message'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }

        if ($email != '' && $message != '') {
            $this->load->model('common/feedback');
            $this->model_common_feedback->insertFeedback($email, $message);
            $this->response->setOutput(json_encode('Thanks for your feedback'));
        } else {
            if ($email == '') {
                $this->response->setOutput(json_encode('Please fill your email'));
            } else {
                $this->response->setOutput(json_encode('Please fill your message'));
            }
        }
    }
}

?>