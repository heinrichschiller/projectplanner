<?php

namespace Controller;

class Base
{
    public function render(string $template, array $data = array())
    {
        $view = new \View\Template($template);
        return $view->renderTemplate($data);
    }
}
