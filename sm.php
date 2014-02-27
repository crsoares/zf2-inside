<?php

require "library/Zend/Loader/StandardAutoloader.php";
$loader = new Zend\Loader\StandardAutoloader(array("autoregister_zf"=>true));
$loader->registerNamespace('SON', 'library/SON');
$loader->register();

use Zend\ServiceManager\ServiceManager;

$service = new ServiceManager();
// $service->setService('Produto', new SON\Produto());

// $produto = $service->get('Produto');
// $produto2 = $service->get('Produto');

// var_dump((spl_object_hash($produto)) === spl_object_hash($produto2));

// $service->setInvokableClass('Produto', 'SON\Produto');
// $produto = $service->get('Produto');
// $produto2 = $service->get('Produto');

// var_dump((spl_object_hash($produto)) === (spl_object_hash($produto2)));

//$service->setService('Connection', new SON\Db\Connection('a', 'b', 'c', 'd'));

// $service->setFactory('Categoria', function($sm) {
// 	$connection = $sm->get('Connection');
// 	$categoria = new \SON\Categoria($connection);
// 	return $categoria;
// });

// $categoria = $service->get('Categoria');
// print_r($categoria);

// $service->setFactory('Categoria', 'SON\CategoriaFactory');
// $categoria = $service->get('Categoria');
// print_r($categoria);

// $service->setService('SON\Db\Connection', new SON\Db\Connection('a', 'b', 'c', 'd'));
// $service->setAlias('Connection', 'SON\Db\Connection');
// $connection = $service->get('Connection');
// print_r($connection);

//SharedManager
// $service->setInvokableClass('Produto', 'SON\Produto');
// $service->setShared('Produto', false);
// $produto = $service->get('Produto');
// $produto2 = $service->get('Produto');

// var_dump((spl_object_hash($produto)) === (spl_object_hash($produto2)));

//Preering Service Managers
// $serviceManagerA = new ServiceManager();
// $serviceManagerA->setInvokableClass('Produto', 'SON\Produto');
// $produto = $serviceManagerA->get('Produto');

// $serviceManagerB = $serviceManagerA->createScopedServiceManager(ServiceManager::SCOPE_PARENT);

// //$produto = $serviceManagerB->get('Produto');

// $serviceManagerC = $serviceManagerA->createScopedServiceManager(ServiceManager::SCOPE_CHILD);
// //$produto = $serviceManagerC->get('Produto'); //Nao funciona

// $serviceManagerC->setInvokableClass('Teste', 'SON\Test');
// $produto = $serviceManagerA->get('Teste');
// print_r($produto);

//print_r($produto);

//Initializers
// $service->setService('Connection', new SON\Db\Connection('a', 'b', 'c', 'd'));
// $service->setInvokableClass('Produto', 'SON\Produto');
// $service->addInitializer(function($instance, $serviceManager){
// 	if($instance instanceof SON\Produto) {
// 		$instance->setDb($serviceManager->get('Connection'));
// 	}
// });
// $produto = $service->get('Produto');
// print_r($produto);

$serviceManager = new ServiceManager();
$config = array(
		'factories' => array(
			'Connection' => function($sm) {
				return new SON\Db\Connection('a', 'b', 'c', 'd');
			}
		),
		'invokables' => array(
			'Produto' => 'SON\Produto'
		),
		'shared' => array(
			'Produto' => false
		)
	);

$serviceConfig = new Zend\Mvc\Service\ServiceManagerConfig($config);
$serviceConfig->configureServiceManager($serviceManager);

print_r($serviceManager->get('Produto'));
