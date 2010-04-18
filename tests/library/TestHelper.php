<?php

/*
 * Include PHPUnit dependencies
 */
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/Framework/IncompleteTestError.php';
require_once 'PHPUnit/Framework/TestCase.php';
require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/Runner/Version.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'PHPUnit/Util/Filter.php';

error_reporting( E_ALL | E_STRICT );

$zfRoot        = realpath(dirname(dirname(dirname(__FILE__))));

$path = array(
    $zfRoot . '/library',
    $zfRoot . '/htdocs/zf-dojo/library',
    $zfRoot . '/tests/library',
    get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, $path));
var_dump($zfRoot);
unset($zfRoot);