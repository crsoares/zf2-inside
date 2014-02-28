<?php

require "library/Zend/Loader/StandardAutoloader.php";
$loader = new Zend\Loader\StandardAutoloader(array("autoregister_zf"=>true));
$loader->registerNamespace('SON', 'library/SON');
$loader->register();

use Zend\Http\Response;
//use Zend\Http\Request;

//Request GET
// $request = new Request();
// $request->setMethod(Request::METHOD_GET);
// $request->setUri("http://www.google.com");
// $request->setContent("Conteudo da nossa request");

// $request = new Request();
// $request->setMethod(Request::METHOD_POST);
// $request->getPost()->set('nome', 'Crysthiano');
// $request->getHeaders()->addHeaders(array('headerX' => 10, 'headerY' => 20));
// $request->getHeaders()->addHeaderLine("Content-Type: text/html");
// $request->setUri("http://www.google.com");
// $request->setContent($request->getPost()->toString());

// echo $request->toString();

$response = new Response();
$response->setStatusCode(Response::STATUS_CODE_200);
$response->getHeaders()->addHeaderLine('X-Token: JKLF54353DJKLDFD');
$response->setContent(<<<EEE
			<html>
				<body>
					Ola mundo
				</body>
			</html>
	EEE;);

echo $response->toString();