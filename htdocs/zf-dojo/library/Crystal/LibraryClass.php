<?php
class LibraryClass
{
    private function __construct() {}

    static function disableLayoutAndViewRender() {
        require_once 'Zend/Controller/Action/HelperBroker.php';
        Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->setNoRender(true);

        require_once 'Zend/Layout.php';
        $layout = Zend_Layout::getMvcInstance();
        if ($layout instanceof Zend_Layout) {
            $layout->disableLayout();
        }
    }

    static function setResponseContentType($contentType) {
        $response = Zend_Controller_Front::getInstance()->getResponse();
        $response->setHeader('Content-Type', $contentType);
    }
}
