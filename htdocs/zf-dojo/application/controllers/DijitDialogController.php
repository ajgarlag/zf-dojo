<?php

class DijitDialogController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $this->_redirect('/index/index/');
    }

    public function simpleAction()
    {
        $this->view->content = '
<p>Lorem ipsum dolor sit amet consectetuer natoque euismod laoreet sit Aliquam. Pretium Vestibulum Praesent orci ipsum tempor eros iaculis Nulla nulla nibh. Lacus sollicitudin malesuada sem Vivamus sociis Donec malesuada quis ipsum eget. Sem Pellentesque eget Sed in Ut elit interdum porttitor commodo laoreet. Curabitur sociis suscipit elit Donec In nec rhoncus nunc ipsum felis. Faucibus Suspendisse at Nulla in Donec ante justo.</p>
<p>Consequat Quisque Suspendisse Pellentesque Suspendisse eget tortor sit odio elit turpis. Id ac est congue ligula interdum Lorem magna nisl id condimentum. Feugiat elit massa Quisque risus nunc amet felis urna congue ante. Ac convallis quis lobortis ut Aenean quis consectetuer elit urna adipiscing. Porttitor est dui nibh pharetra dictum ipsum a libero porttitor elit. At metus quis eu tempus sodales laoreet Phasellus sed dis rutrum. Tortor eget tempor fringilla gravida vitae leo tincidunt Vestibulum parturient.</p>
<p>Nec nascetur tempus elit neque pretium mus augue lobortis est non. Tempus vitae laoreet dolor Nulla Vestibulum id lorem egestas semper massa. Wisi ornare Suspendisse Curabitur at ut convallis volutpat turpis Curabitur consequat. Lacinia ut at elit tincidunt congue tristique Suspendisse tortor consequat pretium. Augue elit quis id pede risus accumsan nunc enim pulvinar ante. Pede sed ac est hendrerit pellentesque vitae id elit adipiscing Sed. Semper tempor.</p>
<p>Dictum at semper Phasellus Maecenas justo Donec libero urna sem pede. Quam cursus tristique rhoncus Pellentesque tellus turpis Nam Lorem semper Mauris. Malesuada quis cursus dolor leo eleifend Vestibulum urna malesuada vitae Vestibulum. Libero quis Sed convallis Suspendisse Integer a interdum vitae congue et. Dictumst porta sagittis id Duis turpis parturient sagittis quis gravida tincidunt. Interdum pede natoque accumsan leo elit gravida semper condimentum libero elit. Magna hac Aenean Vestibulum mus Sed cursus massa.</p>
        ';
    }

    public function remoteContentAction()
    {
    }

    public function remoteContentDataAction()
    {
        Zend_Layout::getMvcInstance()->disableLayout();
    }

    public function formInDialogAction()
    {
        $this->view->form = new Default_Form_SelectExample();
    }

    public function dialogDecoratorAction()
    {
        $this->view->form = new Default_Form_DialogDecoratorExample();
        $this->view->formCode = highlight_file(
            APPLICATION_PATH . '/forms/DialogDecoratorExample.php', true
        );
    }
}
