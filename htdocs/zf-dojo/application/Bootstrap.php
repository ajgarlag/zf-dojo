<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Nastaví konštantu BASE_URL z Front controller-u
     *
     * @return void
     */
    protected function _initInit()
    {
        $this->bootstrap(array('FrontController', 'View', 'Layout'));

        // Enable Dojo View Helper
        $view = $this->getResource('View');

        Zend_Dojo::enableView($view);

        $view->baseHref = $this->getOption('viewbasehref');
    }

    /**
     * Bootstrap autoloader for application resources
     *
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Default',
            'basePath'  => dirname(__FILE__),
        ));

        return $autoloader;
    }

    /**
     * Bootstrap the view doctype
     *
     * @return void
     */
    protected function _initDoctype()
    {
        $this->bootstrap(array('View'));
        $view = $this->getResource('View');

        $view->doctype(Zend_View_Helper_Doctype::XHTML1_TRANSITIONAL);
    }

}

