<?php

class DijitFormDropDownButtonController extends Zend_Controller_Action
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
        $this->view->form = new Default_Form_SelectExample();
    }
}
