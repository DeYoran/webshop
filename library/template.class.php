<?php
	class Template
	{
		protected $_variables = array();
		protected $_controller;
		protected $_action;
		
		public function set($name, $value)
		{
			$this->_variables[$name] = $value;
		}
		
		public function __construct($controller, $action)
		{
			$this->_controller = $controller;
			$this->_action = $action;
		}
		public function render()
		{
			extract($this->_variables);
			//header
			if (file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'header.php'))
			{
				require_once(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'header.php');
			}
			else
			{
				require_once(ROOT.DS.'application'.DS.'views'.DS.'header.php');
			}
			//content
			if (file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.$this->_action.'.php'))
			{
				require_once(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.$this->_action.'.php');
			}
			else
			{
				echo'the view '.$this->_action.' was not found ';
				echo(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.$this->_action.'.php');
			}
			//footer
			if (file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'footer.php'))
			{
				require_once(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'footer.php');
			}
			else
			{
				require_once(ROOT.DS.'application'.DS.'views'.DS.'footer.php');
			}
		}
	}
?>