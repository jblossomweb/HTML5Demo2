<?php
	class page{
		
		function __construct($template = 'default') {
			$this->template = $template;
       			$this->title = '';
			$this->content = '<!-- use fill() -->';
   		}

		function title($title){
			$this->title = $title;
		}

		function fill($content){
			$this->content = $content;
		}

		function show(){
			include 'templates/'.$this->template.'/index.php';
		}
	

	}
?>
