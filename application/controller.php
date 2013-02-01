<?php

class Controller {

   public $load;
   public $model;

   function __construct() { //serves as front controller
	  
		define('BASE_PATH','http://'.$_SERVER['HTTP_HOST'].$this->_subfolder());

		if (array_key_exists('PATH_INFO', $_SERVER)) {
			$uri = explode("/", $_SERVER['PATH_INFO']);
			array_splice($uri, 0, 1);
			$page = strtolower($uri[0]);
		} else {
			$uri=array('','home');
			$page = 'home';
		}

		define('SITE_PAGE',$page);

		$this->load = new Load();
		$this->model = new Model();
		$this->$page($uri);
   }

   /* public function home($uri=array(null,'home')) { // example manual override
		
		$this->load->view('home', array(
			'title'		=>		'Home Page',
			'model'		=>		$this->model->home($uri),
		));
	  
   }
   */
   
   public function __call($page, $data=array()) { // magic page controller
		if(is_array($data)) {
         $uri = $data[0];
		}
		$path = 'views/'.$page.'.php';
		if(file_exists($path)){ // test based on view
			$this->load->view($page, array(
				'title'		=>		ucwords($page),
				'model'		=>		$this->model->$page($uri), //matching page method in model
			));
		} else {
			$this->_error('404');
		}
  }
  
  
  //////////////////////////////////////////////////////////////////////////////////////
  
   private function _error($type) { // error controller
		
		$this->load->view($type, array(
			'title'		=>		$type,
		));
	  
   }
   
   private function _subfolder() { // private tool
		
		if(strpos($_SERVER['REQUEST_URI'],'/index.php/') === false){
			
			if (array_key_exists('PATH_INFO', $_SERVER)) {
				$subfolder = str_replace($_SERVER['PATH_INFO'],'',$_SERVER['REQUEST_URI']).'/';
			} else {
				$subfolder = $_SERVER['REQUEST_URI'];
			}
			
		} else {
			$split = explode("index.php/", $_SERVER['REQUEST_URI']);
			$subfolder = $split[0];
		}
		
		return $subfolder;
	  
   }
   
}
