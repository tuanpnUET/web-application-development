<?php
    namespace qldt\control;
    require_once("app/qldt/model/Std.php");
    
    
    class StdController {
        public function proc($arr) {
			header('Content-type: application/json');
			echo '{"status":"OK", "data":[1, 2, 3]}';
        }

		public function getByID($arr) {
			header('Content-type: application/json');
			echo '{"status":"OK", "data":{"masv":"'.$arr[0].'"}}';
        }

        public function updateOneStd($arr) {
			header('Content-type: application/json');
			echo '{"status":"OK", "data":'.file_get_contents("php://input").'}';
        }  
    }
