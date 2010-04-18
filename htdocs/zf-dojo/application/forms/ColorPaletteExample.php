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
 * @version $Id: ColorPaletteExample.php 12 2010-04-11 10:12:32Z merizamed $
 */

/**
 * Form which demonstrates usage of the dijit.ColorPalette
 *
 * @uses Zend_Dojo_Form
 * @category Crystal
 * @package Forms
 * @author Silver Zachara
 * @copyright Copyright © 2008 Silver Zachara, Andrej Hollý - IF Media
 */
class Default_Form_ColorPaletteExample extends Zend_Dojo_Form
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
                    'id'       => 'colorPaletteExample',
                    'name'     => 'colorPaletteExample',
                    'jsId'     => 'colorPaletteExample',
                    'enctype'  => parent::ENCTYPE_MULTIPART
                )
            );

        $this
            ->addElement(
                'TextBox',
                'colorTextbox',
                array(
                    'label'          => 'Color',
                    'optionalSuffix' => ':',
                    'dijitParams'    => array(
                        'jsId'           => 'colorTextbox',
                        'required'       => true
                    )
                )
            )
            ->addElement(
                'DropDownButton',
                'colorDropDown',
                array(
                    'dijitParams' => array(
                        'jsId'     => 'colorDropDown',
                        'label'    => 'Show Color Palette',
                        'dropDown' => 'colorPalette1'
                    )
                )
            )
            ->addElement(
                'SubmitButton',
                'submit',
                array(
                    'label'  => 'Submit',
                    'ignore' => true,
                    'dijitParams' => array(
                        'jsId' => 'submit'
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

        $this->getElement('submit')->removeDecorator('Label');
        $this->getElement('colorDropDown')->removeDecorator('Label');
    }
}
