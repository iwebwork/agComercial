<?php
	
	date_default_timezone_set('UTC');
	require("config.php");
	class evetos{

		private $id;
		private $title;
		private $color;
		private $start;
		private $end;

		public function setId($value){

			if(isset($value) && empty($value) == false){
				$this->id = $value; 
			}

		}

		public function getId(){
			return $this->id;
		}

		public function setTitle($value){

			if(isset($value) && empty($value) == false){
				$this->title = $value; 
			}

		}

		public function getTitle(){
			return $this->title;
		}

		public function setColor($value){

			if(isset($value) && empty($value) == false){
				$this->color = $value; 
			}

		}

		public function getColor(){
			return $this->color;
		}

		public function setStart($value){

			if(isset($value) && empty($value) == false){
				$this->start = $value; 
			}

		}

		public function getStart(){
			return $this->start;
		}

		public function setEnd($value){
			if(isset($value) && empty($value) == false){
				$this->end = $value; 
			}	
		}

		public function getEnd(){
			return $this->end;
		}

		public function selectDados(){
			$sql = "SELECT id,title,color,start,end FROM events";
  			$sql = $pdo->query($sql);
  			if($sql->rowCount() > 0){
  				$sql = $sql->fetch();

  				foreach ($variable as $key => $value) {
  					
  				}

  			}
  			


		}

	}

?>
















