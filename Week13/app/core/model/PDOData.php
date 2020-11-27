<?php
    namespace core\model;
    use \PDO;
    
	class PDOData {
		private $db = null; 
		
		public function __construct() {
			try {
				$this->db = new PDO("mysql:host=localhost;dbname=QLDT;", "root", "root");
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}
		
		
		public function __destruct() {
			try {
				$this->db = null;
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}

		public function doQuery($query) {
			$ret = array(); 
			
			try {
				$stmt = $this->db->query($query);  
				if ($stmt) {
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$ret[] = $row; 
					}
				} 
			} catch(PDOException $ex) {	echo $query; }
			
			return $ret;
		}
		
		public function doPreparedQuery($queryTmpl, $paras) {
			$ret = array();
			try {
				$stmt = $this->db->prepare($queryTmpl);
				foreach ($paras as $k=>$v) $stmt->bindValue($k+1, $v);
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$ret[] = $row; 
				}
			} catch(PDOException $ex) {	echo $ex; }
			
			return $ret;
		}	

		public function doSql($sql) {
		    $count = 0;
			try {
				$count = $this->db->exec($sql);
			} catch(PDOException $ex) {
				$count = -1;
			}
			return $count;
		}
		
		 
	}
