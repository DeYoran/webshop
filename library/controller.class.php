<?php
 class Controller
 {
	//Fields
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;
	protected $qoutes;
	
	protected function set($name, $value)
	{
		$this->_template->set($name, $value);
	}
	
	//Constructor
	public function __construct($model, $controller, $action)
	{		
		$this->_model = new $model(); //Er wordt een nieuwe instantie gemaakt van de User class
		//$this->_model = new User();
		$this->_controller = $controller; //users
		$this->_action = $action; //viewall
		$this->_template = new Template($controller, $action); //new Template('users', 'viewall')
		$qoutes = $this->_model->select_qoutes();
		$qoutelist = '';
		foreach ($qoutes[0] as $value)
		{
			$qoutelist .= "<div id='q".$value['id']."' class='".$value['type']." lefttop'>
					'".$value['content']."'
					<br><br>
					- ".$value['name']." -
					</div>";
		}
		$this->set('qoutes',$qoutelist);
	}
	
	public function __destruct()
	{
		$this->_template->render();
	}
 }
?>