<?php
	require_once 'Templates.php';
	require_once 'Requests.php';
	
	class Display extends Templates
	{
		public $name;
		public $data;
		public $key;
		public $id;
		
		public function __construct($options)
		{
			$this->name = $options["params"]["item"];
			$this->data = new Request();
			
			//Set values for libguides
			$this->key = '';
			$this->id = '';
		}
		
		public function output()
		{
		$results = array (
			'name' => $this->name,
			'journals' => $this->getJournal(),
			'faids'	   => $this->getFindingAids(),
			'libguides' => $this->getLibguides()	
		);			
			header('Content-Type: application/json; charset=utf-8');
			$json = json_encode($results);
			$callback = $_GET['callback'];
			echo $callback.'('.$json.');';
		}
	
		
		
		public function view()
		{
			global $view;
			echo $view->render('placard.phtml', array(
				'search' => $this->name,
				'data'	=> $this->getJournal(),
				'fa' => $this->getFindingAids(),
				'lg' => $this->getLibguides()
			));
		}
		
		
		public function getJournal()
		{
			return $this->data->searchJournals($this->name);
		}
		
		public function getFindingAids()
		{
			return $this->data->searchFindingAids($this->name);
		}
		
		public function getLibguides()
		{
			return $this->data->searchLibguides($this->name, $this->id, $this->key);
		}
		
		public function error($error)
		{
			print '<pre>';
			print_r($error);
			print '</pre>';
  		}
  
	}

?>
	