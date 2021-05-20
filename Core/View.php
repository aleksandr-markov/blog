<?php

namespace Core;

class View
{
    public $navbarData;


    public function generate($contentView, $templateView = 'templateView.php', $data = null, $otherData = null)
    {
        $navbar = $this->navbarData;
        $userInfo = $_SESSION;
        include '../Application/Views/' . $templateView;
    }


}