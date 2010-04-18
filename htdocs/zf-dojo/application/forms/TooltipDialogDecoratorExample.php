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
 * @version $Id: TooltipDialogDecoratorExample.php 16 2010-04-11 14:50:23Z merizamed $
 */

/**
 * Form which demonstrates usage of the dijit.TooltipDialog as Form Decorator
 *
 * @uses Zend_Dojo_Form
 * @category Crystal
 * @package Forms
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 */
class Default_Form_TooltipDialogDecoratorExample extends Zend_Dojo_Form
{

    /**
     * Form initialization
     *
     * @return void
     */
    public function init()
    {
        // Namespace pro dekorátory
        $this->addPrefixPath('Crystal_Dojo_Form_Decorator', 'Crystal/Dojo/Form/Decorator', 'decorator')
             ->addPrefixPath('Crystal_Dojo_Form_Element', 'Crystal/Dojo/Form/Element', 'element')
             ->addElementPrefixPath('Crystal_Dojo_Form_Decorator', 'Crystal/Dojo/Form/Decorator', 'decorator')
             ->addDisplayGroupPrefixPath('Crystal_Dojo_Form_Decorator', 'Crystal/Dojo/Form/Decorator');

        $this
            ->setMethod(Zend_Form::METHOD_POST)
            ->setAttribs(
                array(
                    'id'   => 'tooltipDialogExample',
                    'name' => 'tooltipDialogExample',
                    'jsId' => 'tooltipDialogExample'
                )
            );

        $this->clearDecorators();
        $this->addDecorator('FormElements')
             ->addDecorator('TooltipDialog', array(
                 'title' => 'dijit.TooltipDialog as Dojo Form\'s Decorator',
                 'style' => 'width: 500px;'
             ));

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
                'ValidationTextBox',
                'mailOdMeno',
                array(
                    'label'          => 'mail-od-meno',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'mailOdMeno',
                        'maxLength'      => 255,
                        'required'       => true
                    )
                )
            )
            ->addElement(
                'ValidationTextBox',
                'emailWhereWillBeSendOrdersEmail',
                array(
                    'label'          => 'email-where-will-be-send-orders-email',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'emailWhereWillBeSendOrdersEmail',
                        'maxLength'      => 255,
                        'required'       => true,
                        'regExpGen'      => 'dojox.validate.regexp.emailAddress'
                    )
                )
            )
            ->addElement(
                'ValidationTextBox',
                'emailWhereWillBeSendOrdersName',
                array(
                    'label'          => 'email-where-will-be-send-orders-name',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'emailWhereWillBeSendOrdersName',
                        'maxLength'      => 255,
                        'required'       => true
                    )
                )
            )
            ->addElement(
                'ComboBox',
                'idOfUserWhereWillBeSendOrders',
                array(
                    'label'          => 'id-of-user-where-will-be-send-orders',
                    'class'          => 'select',
                    'optionalSuffix' => ':',
                    'multiOptions'   => array(
                        '0' => 'no',
                        '1' => 'yes'
                    ),
                    'dijitParams'    => array(
                        'jsId'           => 'idOfUserWhereWillBeSendOrders',
                        'autoComplete'   => 'false'
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
