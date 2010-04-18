<?php

class DijitColorPaletteController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $this->_redirect('/index/index/');
    }

    public function simpleAction()
    {
    }

    public function paletteInFormAction()
    {
        $this->view->form = new Default_Form_ColorPaletteExample();
        $this->view->formCode = highlight_file(
            APPLICATION_PATH . '/forms/ColorPaletteExample.php', true
        );
    }
}
