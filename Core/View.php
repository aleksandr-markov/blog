<?php

namespace Core;

class View
{
    public function generate($contentView, $templateView = 'templateView.php', $data = null, $otherData = null)
    {
        include '../Application/Views/' . $templateView;
    }

}