<?php

class  Provider{
	private $table  = 'providers';

	public $id      = '';
	public $name    = '';
	public $rfc     = '';
	public $address = '';
	public $email   = '';

	public function __construct($data = null){
		if(isset($data['id'])){
			$this->id       = $data['id'];
			$this->name     = $data['name'];
			$this->rfc      = $data['rfc'];
			$this->address  = $data['address'];
			$this->email    = $data['email'];
		}else{
			$this->name     = $data['name'];
			$this->rfc      = $data['rfc'];
			$this->address  = $data['address'];
			$this->email    = $data['email'];
			$this->store($this);
		}
	}
	public function store($provider){
		require('../database.php');

		$query = 'INSERT INTO accounts.'.$this->table.' (name, rfc, address, email) VALUES ("'.$provider->name.'" , "'.$provider->rfc.'" , "'.$provider->address.'" , "'.$provider->email.'")';
		$result = mysqli_query($conn, $query);
		if ($result) {
			echo json_encode(['message' => 'Proveedor guardado correctamente' , 'type' => 'success']);
		} else {
			echo json_encode(['message' => 'La información no fue guardada' , 'type' => 'error']);
		}
	}

	public static function getAll(){
		require('../database.php');
		$query  = 'SELECT * FROM providers';
		$result = mysqli_query($conn, $query);
		if ($result) {
			$arr = array();
			foreach ($result as $provider) {
				array_push($arr, new Provider($provider));
			}
			return $arr;
		} else {
			echo json_encode(['message' => 'Error de Conexión' , 'type' => 'error']);
		}
	}
	public static function find($id){
		require('../database.php');
		$query = 'SELECT * FROM providers WHERE id='.$id;		
		$result = mysqli_query($conn, $query);		
		if ($result) {
			$row = mysqli_fetch_assoc($result);			
			$provider = new Provider($row);
			return $provider;
		} else {
			echo json_encode(['message' => 'Error de Conexión' , 'type' => 'error']);
		}		
	}
}

?>