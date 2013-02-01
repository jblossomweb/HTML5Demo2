<?php

class Load {
   
   
   function view($file, $data = null) {

		if(is_array($data)) {
         extract($data);
		}
		if(isset($model) && is_array($model)) {
			//var_dump($model);
			extract($model);
		} /* else {
			var_dump($data);
		} */
	  
		ob_start();
		include 'views/' .$file.'.php';
		$content = ob_get_contents();
		ob_end_clean();
	  
		$this->wrap('default',array(
			'title'		=>	$file,
			'content'	=>	$content,
		));
	  
   }
   
   private function wrap($template,$data){ //build html page from template
		
		DEFINE('ASSET_PATH',BASE_PATH.'/templates/'.$template.'/');
		
		if(is_array($data)) {
         extract($data);
		}
		
		$page = new page($template);
		$page->title($title);
		$page->fill($content);
		$page->show();
   
   }
   
}



