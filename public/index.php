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
	
	    //뷰단 경로 셋팅 컨트롤단에서 출력이 없을경우 기본적인 아래 경로에서 뷰파일을 찾게된다
	    $di->set('view', function(){
	        $view = new \Phalcon\Mvc\View();
	        $view->setViewsDir('../app/views/');
	        return $view;
	    });
	
		//기본 접속경로를 필요로 할경우 셋팅
	    $di->set('url', function(){
		        $url = new \Phalcon\Mvc\Url();
		        $url->setBaseUri('/');
		        return $url;
      		 });
			 
	   //DB 접속정보 설정 
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