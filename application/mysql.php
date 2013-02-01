<?php

// jblossom's mysql driver

class mysql {

	private $db = NULL;

	function __construct(){
	
		if (!defined('DB_CHARSET'))define('DB_CHARSET', 'utf8');
		$this->db = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '".DB_CHARSET."'");
		$db = $this->db;
	}
	
	function __destruct(){
			$this->db  = null;
	}
   
   public function query($sql,$params=NULL){
		
		$query = $this->db->prepare($sql);
		if(is_array($params)) {
			foreach($params as $key=>$value){
				if(is_int($value)){
					$query->bindValue($key,intval($value), PDO::PARAM_INT);
				} else {
					$query->bindValue($key,$value, PDO::PARAM_STR);
				}
			}
		}
		
		try{
			if ($query->execute()){ 
				$results = $query->fetchAll(PDO::FETCH_ASSOC);
				return (is_array($results) ? $results : true);
			} else {
				// query failed
				error_log('Query Failed. Something is broken.');
				error_log('Failed query: '.$sql);
				return false;
			}
		} catch(PDOException $err){
            error_log('PDO catch: '.$err);
			error_log('PDO catch query: '.$sql);
			error_log(var_export($err->getMessage(),1));
			return false;
        }
	}
   
   
   
}
