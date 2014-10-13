<?php

class CallApiHelper
{
    private $curl;

    public function __construct()
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
    }

    public function makeCallApi($url, $method)
    {
        // TODO : BUILD URL FOR METHOD POST ======================
        $method = 'get';
        // SORY THIS TIME ONLY SUPPORT METHOD GET
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        $resp = curl_exec($this->curl);
        
        curl_close($this->curl);
        return json_decode($resp, true);
    }
}

?>