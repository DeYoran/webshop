<?php
 class Controller
 {
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;
	
	protected function set($name, $value)
	{
		$this->_template->set($name, $value);
	}

	public function __construct($model, $controller, $action)
	{
		$this->_model = $model; //User
		$this->_controller = $controller; //users
		$this->_action = $action; //viewall
		$this->_template = new Template($controller, $action); //new Template('users', 'viewall')
	}

	public function __destruct()
	{
		$this->_template->render();
	}
 }
?>