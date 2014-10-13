<?php
require_once(DIR_SYSTEM . 'utilcommon/EmailUtil.php');

class ControllerTravelCustom extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/travel/custom.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/travel/custom.tpl';
        } else {
            $this->template = 'default/template/travel/custom.tpl';
        }
        $this->children = array(
            'common/header',
            'common/footer',
            'travel/custom/continent',
            'travel/custom/country',
            'travel/custom/city'
        );
        $this->language->load('travel/custom');
        $this->data['text_where_you_go'] = $this->language->get('text_where_you_go');

        $this->data['text_home'] = $this->language->get('text_home');
        $this->data['text_deal_travel'] = $this->language->get('text_deal_travel');

        $this->data['redirectUrl'] = $this->url->link('travel/custom');
        $this->response->setOutput($this->render());
    }

    public function continent()
    {
        $this->load->model('catalog/country');

        if (file_exists(DIR_TEMPLATE . $this->config->get('cosunfig_template') . '/template/travel/continent.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/travel/continent.tpl';
        } else {
            $this->template = 'default/template/travel/continent.tpl';
        }

        $continents = $this->model_catalog_country->getContinent();
        $this->data['continents'] = $continents;

        $this->response->setOutput($this->render());
    }

    public function country()
    {
        $this->load->model('catalog/country');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/travel/country.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/travel/country.tpl';
        } else {
            $this->template = 'default/template/travel/country.tpl';
        }
        $continentName = 'ASIA'; //default value
        if (isset($_POST['continentName'])) {
            $continentName = $_POST['continentName'];
        }

        $countries = $this->model_catalog_country->getCountries($continentName);
        $this->data['countries'] = $countries;

        $this->response->setOutput($this->render());
    }

    public function city()
    {
        $this->load->model('catalog/country');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/travel/city.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/travel/city.tpl';
        } else {
            $this->template = 'default/template/travel/city.tpl';
        }

        $countryName = 'VIETNAM'; //default value
        if (isset($_POST['countryName'])) {
            $countryName = $_POST['countryName'];
        }

        $cities = $this->model_catalog_country->getCities($countryName);
        $this->data['cities'] = $cities; //list city from model

        $this->data['countryName'] = $countryName;
        $this->response->setOutput($this->render());
    }

    public function submit()
    {
        $logger = new Log('customtour.log');
        $logger->write('Start get param----------');

        $this->load->model('catalog/customtour');

        $userEmail = '';
        $step1City = array();
        $step2Date = array();
        $step3StyleTravel = array();
        $step4BookHotel = array();
        $isGoWith = 0;
        $step5 = '';
        $minPrice = 0;
        $maxPrice = 0;

        if (isset($_POST['userEmail'])) {
            $userEmail = $_POST['userEmail'];
        }

        if (isset($_POST['step1'])) {
            $step1City = $_POST['step1'];
        }
        if (isset($_POST['step2'])) {
            $step2Date = $_POST['step2'];
        }

        if (isset($_POST['step3'])) {
            $step3StyleTravel = $_POST['step3'];
        }
        if (isset($_POST['step4'])) {
            $step4BookHotel = $_POST['step4'];
        }
        if (isset($_POST['step5'])) {
            $step5 = $_POST['step5'];
        }

        if (isset($_POST['step3_minprice'])) {
            $minPrice = $_POST['step3_minprice'];
        }
        if (isset($_POST['step3_maxprice'])) {
            $maxPrice = $_POST['step3_maxprice'];
        }

        if ($step5 == '') {
            $isGoWith = 1;
        }

        $logger->write('END get param----------');

        // TODO : Fill to email template & and send email
        $emailData = array();
        $images = array();
        $i = 0;
        foreach ($step1City as $cities) {
            // Test image ====== JUST FOR TEST ==========
            $images[$i]['imageLink'] = 'http://s14.postimg.org/6mmek51f5/nhatrang.jpg';


            //$emailData['lstCities'][$i]['imageLink'] = DIR_IMAGE. 'ASIA/VIETNAM/nhatrang.png';
            $images[$i]['cityName'] = $cities;
            $i++;
        }
        $emailData['lstCities'] = $images;

        if (isset($step2Date[0])) {
            $arrayInput = explode("/", $step2Date[0]);
            $emailData['startdate'] = $arrayInput[2] . "-" . $arrayInput[1] . "-" . $arrayInput[0] . " 00:00:00";
            $logger->write('Watch startdatetime ' . $emailData['startdate']);
        } else {
            $emailData['startdate'] = '';
        }

        $emailData['numdate'] = (isset($step2Date[1])) ? $step2Date[1] : '';
        $emailData['suites'] = (isset($step3StyleTravel[0])) ? $step3StyleTravel[0] : '';
        $emailData['accommodation'] = (isset($step3StyleTravel[1])) ? $step3StyleTravel[1] : array();

        $logger->write('Start prepare email data==========');
        $emailData['step3_minprice'] = $minPrice;
        $emailData['step3_maxprice'] = $maxPrice;
        $emailData['step3_ideal'] = '';


        $emailData['name'] = ((isset($step4BookHotel[0])) ? $step4BookHotel[0] : '') . ' ' . ((isset($step4BookHotel[1])) ? $step4BookHotel[1] : '');
        $emailData['national'] = (isset($step4BookHotel[5])) ? $step4BookHotel[5] : '';
        $emailData['email'] = (isset($step4BookHotel[4])) ? $step4BookHotel[4] : '';
        $emailData['telephone'] = (isset($step4BookHotel[2])) ? $step4BookHotel[2] : '';

        $logger->write('Start prepare email content==========');
        //Prepare email content
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/email/email.tpl')) {
            $dirEmailTpl = $this->config->get('config_template') . '/template/email/email.tpl';
        } else {
            $dirEmailTpl = 'default/template/email/email.tpl';
        }
        if (file_exists(DIR_TEMPLATE . $dirEmailTpl)) {
            extract($emailData);
            ob_start();
            require(DIR_TEMPLATE . $dirEmailTpl);

            $emailContent = ob_get_contents();
            ob_end_clean();
        } else {
            trigger_error('Error: Could not load template ' . DIR_TEMPLATE . $dirEmailTpl . '!');
            exit();
        }

        // TODO : Save DB ---------------
        $emailData['cities'] = implode(",", $step1City);
        $emailData['tripname'] = (isset($step2Date[2])) ? $step2Date[2] : '';
        $emailData['firstname'] = (isset($step4BookHotel[0])) ? $step4BookHotel[0] : '';
        $emailData['lastname'] = (isset($step4BookHotel[1])) ? $step4BookHotel[1] : '';
        $emailData['address'] = (isset($step4BookHotel[7])) ? $step4BookHotel[7] : '';
        $emailData['hearform'] = (isset($step4BookHotel[11])) ? $step4BookHotel[11] : '';
        $emailData['city'] = '';
        $emailData['postcode'] = '';
        $emailData['country_id'] = '';
        $emailData['zone_id'] = '';

        if (isset($step4BookHotel[3])) {
            $arrayInput = explode("/", $step4BookHotel[3]);
            $emailData['customer_birthday'] = $arrayInput[2] . "-" . $arrayInput[1] . "-" . $arrayInput[0];
        } else {
            $emailData['customer_birthday'] = '';
        }
        $emailData['numAdults'] = (isset($step4BookHotel[9])) ? $step4BookHotel[9] : '';
        $emailData['numChild'] = (isset($step4BookHotel[8])) ? $step4BookHotel[8] : '';
        $emailData['numUnderChild'] = (isset($step4BookHotel[10])) ? $step4BookHotel[10] : '';

        $logger->write('Start save DB=======================');
        $this->model_catalog_customtour->saveCustomTour($emailData);
        $logger->write('Save successfull ========================');

        $subject = "[Zotadi] Thanks for interesting";
        $mailSender = new EmailUtil();
        $mailSender->sendEmail($userEmail, $emailContent, $subject);

        $result = 'email: ' . $userEmail . '/ phone: ' . $emailData['telephone'];
        $this->response->setOutput($result);
    }
}

?>
