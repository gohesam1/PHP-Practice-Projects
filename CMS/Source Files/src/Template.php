<?php

class Template{

    private $layout;

    public function __construct($layout) {
        $this->layout = $layout;
    }

    function view($template, $variables){
        extract($variables);

        include VIEW_PATH . 'admin/layout/default.html';
    }
}

