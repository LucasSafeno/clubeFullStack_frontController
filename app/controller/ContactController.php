<?php

namespace app\controller;

use core\template\Plates;

class ContactController
{
    public function __construct(
        private Plates $template
    ) {

    }
    public function index()
    {
        $this->template->render('contact');
    }

}
