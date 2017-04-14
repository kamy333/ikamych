<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/22/2015
 * Time: 12:45 PM
 */
class MyPHPMailer extends PHPMailer
{

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages


    public function __construct()
    {
        parent::__construct();
        $this->SMTPDebug=0;
        $this->Debugoutput = 'html';
        $this->isSMTP();
        $this->Host =MY_HOST;
//        $this->Port=465; bluewin
        $this->Port=25;

//        $this->SMTPSecure = "ssl"; bluewin
        $this->SMTPSecure = "tls";

        $this->SMTPAuth=true;
        $this->Username=EMAIL_USERNAME ;
        $this->Password=EMAIL_PASSWORD;
        $this->FromName="ikamy.ch";
        $this->From = "ikamy.ch@bluewin.ch";
        $this->From = "kamy@ikamy.ch";

        // $this->addCC("nafisspour@bluewin.ch");
        $this->addReplyTo("nafisspour@bluewin.ch", "Reply");

    }

}