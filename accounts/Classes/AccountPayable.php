<?php

class  AccountPayable{
	private $table      = 'accounts_payable';

	public $id          = '';
	public $provider_id = '';
	public $total       = '';
	public $concept     = '';

	public function __construct($data){
		if(isset($data['id'])){
			$this->id          = $id;			
			$this->provider_id = $data['provider_id'];
			$this->total       = $data['total'];
			$this->concept     = $data['concept'];
		}else{
			$this->provider_id = $data['provider_id'];
			$this->total       = $data['total'];
			$this->concept     = $data['concept'];
			$this->store($this);
		}
	}
	public function store($account){
		require('../database.php');
		$sql = 'INSERT INTO '.$this->table.' (id, provider_id, total, concept) VALUES (1,'.$account->provider_id.', '.$account->total.' , "'.$account->concept.'")';
		if (mysqli_query($conn, $sql)) {
			echo "Información guardada correctamente";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}
}

?>