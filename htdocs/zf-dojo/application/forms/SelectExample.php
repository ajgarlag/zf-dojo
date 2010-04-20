<?php
/**
 * Názov nového projektu
 *
 * LICENSE
 *
 * @category Crystal
 * @package Forms
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 * @version $Id: SelectExample.php 11 2010-04-11 10:08:53Z merizamed $
 */

/**
 * Form which demonstrates usage of the dijit.form.Select Form Element
 *
 * @uses Zend_Dojo_Form
 * @category Crystal
 * @package Forms
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 */
class Default_Form_SelectExample extends Zend_Dojo_Form
{

    /**
     * Options to use with select elements
     */
    private $_selectOptions = array(
        'red'    => 'Rouge',
        'blue'   => 'Bleu',
        'white'  => 'Blanc',
        'orange' => 'Orange',
        'black'  => 'Noir',
        'green'  => 'Vert',
    );

     /**
     * Form initialization
     *
     * @return void
     */
    public function init()
    {
        // Namespace pro dekorátory

        $this
            ->setMethod(Zend_Form::METHOD_POST)
            ->setAttribs(
                array(
                    'id'   => 'selectExample',
                    'name' => 'selectExample'
                )
            );

        $this
            ->addElement(
                'ValidationTextBox',
                'mailSiteName',
                array(
                    'label'          => 'mail-site-name',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'mailSiteName',
                        'maxLength'      => 255,
                        'required'       => true
                    )
                )
            )
            ->addElement(
                'ComboBox',
                'comboboxselect',
                array(
                    'label'        => 'ComboBox (select)',
                    'value'        => 'blue',
                    'autocomplete' => false,
                    'multiOptions' => $this->_selectOptions,
                )
            )
            ->addElement(
                'ComboBox',
                'comboboxremote',
                array(
                    'label'       => 'ComboBox (remote)',
                    'storeId'     => 'stateStore1',
                    'storeType'   => 'dojo.data.ItemFileReadStore',
                    'storeParams' => array(
                        'url' => $this->getView()->baseUrl('data/dojoStores/states.json')
                    ),
                    'dijitParams' => array(
                        'searchAttr' => 'name'
                    ),
                )
            )
            ->addElement(
                'Select',
                'idOfUserWhereWillBeSendOrders',
                array(
                    'label'          => 'Select (multiOptions)',
                    'class'          => 'select',
                    'optionalSuffix' => ':',
                    'multiOptions'   => $this->_selectOptions,
                    'dijitParams'    => array(
                        'jsId'           => 'idOfUserWhereWillBeSendOrders'
                    )
                )
            )
            ->addElement(
                'Select',
                'selectStoreContent',
                array(
                    'label'          => 'Select (remote)',
                    'class'          => 'select',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'      => 'selectStoreContent',
                        'maxHeight' => '400',
                        'store'     => array(
                            'store'  => 'stateStore2',
                            'type'   => 'dojo.data.ItemFileReadStore',
                            'params' => array(
                                'url' => $this->getView()->baseUrl('data/dojoStores/states.json')
                            ),
                        )
                    )
                )
            );

        $this->setElementDecorators(
            array(
                array('DijitElement'),
                array('Errors'),
                array('Description'),
                array('Label', array('separator' => ' ')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'elementGroup clear')),
            ),
            array(),
            false
        );
    }
}
