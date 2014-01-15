<?php
	try {
		    //Register an autoloader
	    $loader = new \Phalcon\Loader();
	    $loader->registerDirs(array(
	        '../app/controllers/',
	        '../app/models/'
	    ))->register();
	
	    //Create a DI
	    $di = new Phalcon\DI\FactoryDefault();
	
	    //��� ��� ���� ��Ʈ�Ѵܿ��� ����� ������� �⺻���� �Ʒ� ��ο��� �������� ã�Եȴ�
	    $di->set('view', function(){
	        $view = new \Phalcon\Mvc\View();
	        $view->setViewsDir('../app/views/');
	        return $view;
	    });
	
		//�⺻ ���Ӱ�θ� �ʿ�� �Ұ�� ����
	    $di->set('url', function(){
		        $url = new \Phalcon\Mvc\Url();
		        $url->setBaseUri('/');
		        return $url;
      		 });
			 
	   //DB �������� ���� 
	   $di->set('db', function(){
		        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
		        "host" => "localhost",
		        "username" => "root",
		        "password" => "haru8245",
		        "dbname" => "phalconTest1"
		        ));
		    });
	    //Handle the request
	    $application = new \Phalcon\Mvc\Application($di);
	
	    echo $application->handle()->getContent();
	
	} catch(\Phalcon\Exception $e) {
	     echo "PhalconException: ", $e->getMessage();
	}
?>