<?php
    namespace core\control;
    
    class Router {
        public static function proc() {
			$ret = array();
			$moduleName = "fallback";		
            $controllerName = "fallback";	
            $actionName = "proc";			
            $parameters = array();			

			// Tách URI
			$requestURI = explode('/', strtolower($_SERVER['REQUEST_URI']));
			$scriptName = explode('/', strtolower($_SERVER['SCRIPT_NAME']));
			$commandArray = array_diff_assoc($requestURI, $scriptName);
			$commandArray = array_values($commandArray);
			
			// GET /students
			if (count($commandArray) == 1	&&
				$_SERVER["REQUEST_METHOD"] == "GET" && 	
				strtolower($commandArray[0]) == "students") 
			{
				$moduleName = "qldt";
				$controllerName = "std";
				$actionName = "proc";
			}
			
			else if (count($commandArray) == 1	&&
				$_SERVER["REQUEST_METHOD"] == "GET" && 
				strtolower($commandArray[0]) == "std") 
			{
				$moduleName = "qldt";
				$controllerName = "std";
				$actionName = "proc";
			}

			else if (count($commandArray) == 2 &&
				$_SERVER["REQUEST_METHOD"] == "GET" && 	
				strtolower($commandArray[0]) == "students") 
			{
				$moduleName = "qldt";
				$controllerName = "std";
				$actionName = "getByID";
				$parameters[0] = $commandArray[1];
			}

			else if (count($commandArray) == 2 &&
				$_SERVER["REQUEST_METHOD"] == "PUT" && 	
				strtolower($commandArray[0]) == "students") {
				$moduleName = "qldt";
				$controllerName = "std";
				$actionName = "updateOneStd";
				$parameters[0] = $commandArray[1];
			}
			


			$ret["moduleName"]  = $moduleName;		
			$ret["controllerName"]  = $controllerName;
			$ret["actionName"]  = $actionName;
			$ret["parameters"]  = $parameters;	
			return $ret;
        }
    }
