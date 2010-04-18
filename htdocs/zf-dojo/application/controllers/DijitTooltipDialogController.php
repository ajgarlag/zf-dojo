<?php

class DijitTooltipDialogController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $this->_redirect('/index/index/');
    }

    public function tooltipDialogDecoratorAction()
    {
        $this->view->form = new Default_Form_TooltipDialogDecoratorExample();
        $this->view->formCode = highlight_file(
            APPLICATION_PATH . '/forms/TooltipDialogDecoratorExample.php', true
        );
    }
}
