<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Dojo
 * @subpackage View
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Select.php 3 2010-04-08 17:34:46Z merizamed $
 */

/** Zend_Dojo_View_Helper_Dijit */
require_once 'Zend/Dojo/View/Helper/Dijit.php';

/**
 * Dojo Select dijit
 *
 * @uses       Zend_Dojo_View_Helper_Dijit
 * @package    Zend_Dojo
 * @subpackage View
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
  */
class Crystal_Dojo_View_Helper_Select extends Zend_Dojo_View_Helper_Dijit
{
    /**
     * Dijit being used
     * @var string
     */
    protected $_dijit  = 'dijit.form.Select';

    /**
     * Dojo module to use
     * @var string
     */
    protected $_module = 'dijit.form.Select';

    /**
     * dijit.form.Select
     *
     * @param  int $id
     * @param  mixed $value
     * @param  array $params  Parameters to use for dijit creation
     * @param  array $attribs HTML attributes
     * @param  array|null $options Select options
     * @return string
     */
    public function select($id, $value = null, array $params = array(), array $attribs = array(), array $options = null)
    {
        $html = '';
        if (!array_key_exists('id', $attribs)) {
            $attribs['id'] = $id;
        }
        if (array_key_exists('store', $params) && is_array($params['store'])) {
            // using dojo.data datastore
            if (false !== ($store = $this->_renderStore($params['store'], $id))) {
                $params['store'] = $params['store']['store'];
                if (is_string($store)) {
                    $html .= $store;
                }
            } else {
                unset($params['store']);
            }
        } elseif (array_key_exists('store', $params)) {
            if (array_key_exists('storeType', $params)) {
                $storeParams = array(
                    'store' => $params['store'],
                    'type'  => $params['storeType'],
                );
                unset($params['storeType']);
                if (array_key_exists('storeParams', $params)) {
                    $storeParams['params'] = $params['storeParams'];
                    unset($params['storeParams']);
                }
                if (false !== ($store = $this->_renderStore($storeParams, $id))) {
                    if (is_string($store)) {
                        $html .= $store;
                    }
                }
            }
        }

        // do as normal select
        $attribs = $this->_prepareDijit($attribs, $params, 'element');
        $html .= $this->view->formSelect($id, $value, $attribs, $options);
        return $html;
    }
}
