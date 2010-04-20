<?php

class DijitFormSelectController extends Zend_Controller_Action
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
        $this->view->selectContent = array(
            'first'  => 'First Value',
            'second' => 'Second Value',
            'third'  => 'Third Value',
            'fourth' => 'Fourth Value'
        );
    }

    public function dataStoreAction()
    {
        ;
    }

    public function selectFormAction()
    {
        $this->view->form = new Default_Form_SelectExample();
        $this->view->formCode = highlight_file(
            APPLICATION_PATH . '/forms/SelectExample.php', true
        );
    }
}
