<?php
/**
 * Názov nového projektu
 *
 * LICENSE
 *
 * @category   Crystal_Shop_Manager
 * @package    Crystal_Controller
 * @subpackage Plugins
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 * @version $Id: Multilanguage.php 3 2010-04-08 17:34:46Z merizamed $
 */

/** Zend_Controller_Plugin_Abstract */
require_once 'Zend/Controller/Plugin/Abstract.php';

/**
 * Inicializácia Multijazyčnej podpory
 *
 * @uses       Zend_Controller_Plugin_Abstract
 * @category   Crystal_Shop_Manager
 * @package    Crystal_Controller
 * @subpackage Plugins
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 */
class Crystal_Controller_Plugin_Multilanguage extends Zend_Controller_Plugin_Abstract
{
    /**
     * Inicializácia Multijazyčnej podpory
     *
     * @param Zend_Controller_Request_Abstract $request
     * @return void
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $locale = Zend_Registry::get('Zend_Locale');
        $config = Zend_Registry::get('config');

        if (isset($config->cache->enable) && $config->cache->enable == 1) {
            $cache = Zend_Cache::factory('Core', 'File',
                array(
                    'cache_id_prefix' => 'cs_lang_',
                    'lifetime'        => 8640
                ),
                array(
                    'cache_dir'        => $config->cache->directory,
                    'file_name_prefix' => 'cs_lang_',
                    'cache_file_umask' => 0644
                )
            );
            Zend_Translate::setCache($cache);
        }


        $translate = Zend_Registry::get('Zend_Translate');

        if (!$translate->isAvailable($locale->getLanguage())) {
            $locale->setLocale($config->localization->defaultLocale); // Vychozia jazyková mutácia
        }

        $translate->setLocale($locale);

        // TODO nastavit lang aj do cookies, mozno bude potreba Zachara
//        setcookie('lang', $locale->getLanguage(), null, '/');

        // Set up localeLanguage to the view
        $view = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getResource('view');
        $view->localeLanguage = $locale->getLanguage();

        // Set up locales to the view
        $view->locales = $locale->toString();
    }
}
