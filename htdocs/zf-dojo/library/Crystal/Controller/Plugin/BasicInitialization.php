<?php
/**
 * Názov nového projektu
 *
 * LICENSE
 *
 * @category   Crystal
 * @package    Crystal_Controller
 * @subpackage Plugins
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 * @version $Id: BasicInitialization.php 10 2010-04-11 10:04:11Z merizamed $
 */

/**
 * Inicializácia Multijazyčnej podpory
 *
 * @uses       Zend_Controller_Plugin_Abstract
 * @category   Crystal
 * @package    Crystal_Controller
 * @subpackage Plugins
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 */
class Crystal_Controller_Plugin_BasicInitialization extends Zend_Controller_Plugin_Abstract
{
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {}

    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        if ((int) $request->getParam('useDeclarative', 0) === 1) {
            Zend_Dojo_View_Helper_Dojo::setUseDeclarative();
        } elseif ((int) $request->getParam('useDeclarative', 0) === 0) {
            Zend_Dojo_View_Helper_Dojo::setUseProgrammatic();
        } else {
            Zend_Dojo_View_Helper_Dojo::setUseProgrammatic();
        }
    }

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {}

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $view = Zend_Layout::getMvcInstance()->getView();

        if ($request->getActionName() !== 'index') {
            $view->code = highlight_file(
                APPLICATION_PATH . '/views/scripts/' . $this->getRequest()->getControllerName()
              . '/' . $this->getRequest()->getActionName() . '.phtml', true
            );
        }
    }

    /**
     * Nastaví názov stránky
     *
     * @param Zend_Controller_Request_Abstract $request
     * @return void
     * @see library/Zend/Controller/Plugin/Zend_Controller_Plugin_Abstract#postDispatch()
     */
    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
//        $this->_getSiteTitle();
    }

    public function dispatchLoopShutdown()
    {}

    private function _getSiteTitle() {
//        $vlastnostiStranok = new VlastnostiStranok();
//        $nastavenia        = new Nastavenia();
//        $this->_setSiteTitle(
//            $vlastnostiStranok->getPagetitleByAlias($this->_request->getActionName()),
//            $nastavenia->getSitename()
//        );
    }

    private function _setSiteTitle($title, $site_name) {
//        $view = Zend_Layout::getMvcInstance()->getView();
//        $translate = Zend_Registry::get('Zend_Translate');
//        $view->headTitle($translate->_($title))
//             ->headTitle($translate->_($site_name));
//        $view->headTitle()->setSeparator(' | ');
    }
}
