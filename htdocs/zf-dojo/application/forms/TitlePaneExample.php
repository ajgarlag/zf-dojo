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
 * @version $Id: TitlePaneExample.php 11 2010-04-11 10:08:53Z merizamed $
 */

/**
 * Form which demonstrates usage of the dijit.TitlePane Form Decorator
 *
 * @uses Zend_Dojo_Form
 * @category Crystal
 * @package Forms
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 */
class Default_Form_TitlePaneExample extends Zend_Dojo_Form
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
             ->addElementPrefixPath('Crystal_Dojo_Form_Decorator', 'Crystal/Dojo/Form/Decorator', 'decorator');

        // Nastavenia pre dijit.TitlePane dekorátor
        $titlePaneDecoratorOptions = array(
            'style' => 'margin-bottom: 16px'
        );

        $this
            ->setMethod(Zend_Form::METHOD_POST)
            ->setAttribs(
                array(
                    'id'   => 'titlePaneExample',
                    'name' => 'titlePaneExample'
                )
            );

        // Základné nastavenia e-shop web stránok
        $site = new Zend_Dojo_Form_SubForm();
        $site->setAttribs(
            array(
                'id'     => 'siteForm',
                'name'   => 'siteForm',
                'legend' => 'General',
                'Description' => 'test test test'
            )
        );


        $site->clearDecorators();
        $site->addDecorator('FormElements')
             ->addDecorator('TitlePane', $titlePaneDecoratorOptions)
             ->addDecorator('Description', array(
                'placement' => Zend_Form_Decorator_Abstract::PREPEND,
                'class'     => 'formDescription'
             )
         );

        $site->setDescription('TitlePane Decorator with default settings:');

        $site
            ->addElement(
                'ValidationTextBox',
                'mainSiteUrl',
                array(
                    'label'          => 'main-site-url',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'main-site-url',
                        'maxLength'      => 255,
                        'required'       => true
                    )
                )
            );

        $site->setElementDecorators(
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

        // Nastavenia emailov
        $mail = new Zend_Dojo_Form_SubForm();
        $mail->setAttribs(
            array(
                'id'     => 'mailForm',
                'name'   => 'mailForm',
                'legend' => 'Email'
            )
        );

        $titlePaneDecoratorOptionsForMailSubform = $titlePaneDecoratorOptions;
        $titlePaneDecoratorOptionsForMailSubform['open'] = 'false';

        $mail->clearDecorators();
        $mail->addDecorator('FormElements')
             ->addDecorator('TitlePane', $titlePaneDecoratorOptionsForMailSubform)
             ->addDecorator('Description', array(
                'placement' => Zend_Form_Decorator_Abstract::PREPEND,
                'class'     => 'formDescription'
             )
         );

        $mail->setDescription('TitlePane Decorator is collapsed (closed) after refresh, passed setting "open" => "false":');

        $mail
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

        $mail->setElementDecorators(
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


        // Nastavenia cien
        $prices = new Zend_Dojo_Form_SubForm();
        $prices->setAttribs(
            array(
                'id'     => 'pricesForm',
                'name'   => 'pricesForm',
                'legend' => 'Prices'
            )
        );

        $titlePaneDecoratorOptionsForPricesSubform = $titlePaneDecoratorOptions;
        $titlePaneDecoratorOptionsForPricesSubform['toggleable'] = 'false';

        $prices->clearDecorators();
        $prices->addDecorator('FormElements')
               ->addDecorator('TitlePane', $titlePaneDecoratorOptionsForPricesSubform)
               ->addDecorator('Description', array(
                  'placement' => Zend_Form_Decorator_Abstract::PREPEND,
                  'class'     => 'formDescription'
               )
         );

        $prices->setDescription('TitlePane Decorator isn\'t toggleable, passed setting "toggleable" => "false":');

        $prices
            ->addElement(
                'ValidationTextBox',
                'decimalPoint',
                array(
                    'label'          => 'decimal-point',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'decimalPoint',
                        'maxLength'      => 1,
                        'required'       => true,
                        'regExp'         => '(,|.)'
                    )
                )
            )
            ->addElement(
                'ValidationTextBox',
                'thousandsSeparator',
                array(
                    'label'          => 'thousands-separator',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'thousandsSeparator',
                        'maxLength'      => 1,
                        'required'       => false,
                        'regExp'         => '( |,|.|)'
                    )
                )
            )
            ->addElement(
                'ComboBox',
                'isDualPriceMod',
                array(
                    'label'          => 'is-dual-price-mod',
                    'class'          => 'select',
                    'optionalSuffix' => ':',
                    'multiOptions'   => array(
                        '0' => 'no',
                        '1' => 'yes'
                    ),
                    'dijitParams'    => array(
                        'jsId'           => 'isDualPriceMod',
                        'autoComplete'   => 'false'
                    )
                )
            )
            ->addElement(
                'ValidationTextBox',
                'dualPriceRate',
                array(
                    'label'          => 'dual-price-rate',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'dualPriceRate',
                        'maxLength'      => 255,
                        'required'       => true
                    )
                )
            )
            ->addElement(
                'ValidationTextBox',
                'dualPriceCurrency',
                array(
                    'label'          => 'dual-price-currency',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'dualPriceCurrency',
                        'maxLength'      => 4,
                        'required'       => true
                    )
                )
            );

        $prices->setElementDecorators(
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

        $this->addSubForm($site,   'generalPropertiesForm')
             ->addSubForm($mail,   'productPropertiesForm')
             ->addSubForm($prices, 'productPricesForm');
    }
}
