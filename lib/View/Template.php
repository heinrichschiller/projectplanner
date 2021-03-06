<?php

namespace View;

class Template
{
    protected $_tmplFile = null;

    public function __construct(string $tmplFile)
    {
        $this->_tmplFile = $tmplFile;
    }

    public function renderTemplate(array $data)
    {
        extract($data);

        ob_start();
        require ABS_PATH . '/template/head.phtml';
        require ABS_PATH . '/template/header.phtml';
        require_once ABS_PATH . '/template/' . $this->_tmplFile;
        $htmlResponse = ob_get_contents();
        require ABS_PATH . '/template/footer.phtml';
        ob_end_clean();

        return $htmlResponse;
    }
}
