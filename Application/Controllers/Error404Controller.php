<?php

namespace Application\Controllers;

use Core\Controller;

class Error404Controller extends Controller
{
    public function index()
    {
        $this->view->generate('404-view.php', 'templateView.php');
    }
}