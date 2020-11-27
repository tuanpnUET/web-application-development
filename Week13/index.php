<?php
	namespace core\control;
    require_once("app/core/control/Router.php");

    class FrontController {
        public static function proc() {     
            $ret = Router::proc();
            $filename = "app/".$ret["moduleName"]."/control/".ucfirst($ret["controllerName"])."Controller.php";   
            require_once($filename);
            $controllerName = "\\".$ret["moduleName"]."\\control\\".ucfirst($ret["controllerName"])."Controller";  
            $controller = new $controllerName();
			if (method_exists($controller, $ret['actionName'])) {
                        $action = $ret['actionName'];
                        $controller->$action($ret['parameters']);
            } else {
				header('Content-type: application/json');
            	echo '{"status":"ERR", "data":"ACTION-NOT-FOUND"}';
			}
        }
    }
	
    FrontController::proc();
