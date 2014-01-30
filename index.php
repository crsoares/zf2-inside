<?php

require "library/Zend/Loader/StandardAutoloader.php";
$loader = new Zend\Loader\StandardAutoloader(array("autoregister_zf"=>true));
$loader->registerNamespace('SON', 'library/SON');
$loader->register();

$definitionList = new Zend\Di\DefinitionList(array(
    new Zend\Di\Definition\ArrayDefinition(include __DIR__ . '/data/di/SON-definition.php'),
    $runtime = new Zend\Di\Definition\RuntimeDefinition()
));

$di = new Zend\Di\Di($definitionList);
$di->instanceManager()->setParameters("SON\Db\Connection", array(
    'server' => 'localhost',
    'dbname' => 'banco',
    'user' => 'username',
    'password' => 123
));

$produto = $di->get("SON\Produto");
$categoria = $di->get("SON\Categoria");
$test = $di->get("SON\Test");

Zend\Di\Display\Console::export($di);