<?php
require_once(DIR_SYSTEM . 'library/mail.php');
class EmailUtil
{
    private $mailSender;

    public function __construct()
    {
        $this->mailSender = new Mail();
        $this->mailSender->setFrom('zotadivn@gmail.com');
        $this->mailSender->setSender('zotadivn@gmail.com');
        $this->mailSender->protocol = 'smtp';
        $this->mailSender->port = '465';
        $this->mailSender->hostname = 'ssl://smtp.gmail.com';
        $this->mailSender->username = "zotadivn@gmail.com";
        $this->mailSender->password = "henryhenry";
    }

    public function  sendEmail($userEmail, $emailContent, $subject)
    {
        $this->mailSender->setTo($userEmail);
        $this->mailSender->setHtml($emailContent);
        $this->mailSender->setSubject($subject);
        $this->mailSender->send();
    }
}

?>