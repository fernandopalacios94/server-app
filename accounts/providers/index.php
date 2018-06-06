<?php 
	header('Content-Type: application/json;charset=UTF-8');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: DELETE, HEAD, GET, OPTIONS, POST, PUT');
	header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
	header('Access-Control-Max-Age: 1728000');

	require('../Classes/Provider.php');

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		store($_POST);
	}
	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		index($_GET);
	}
	function store($request){
		if(isset($request['ws'])){

		}else{
			$acountPayable = new Provider($request);
		}
	}
	function index($request){
		if(isset($request['ws'])){

		}else{			
			if(isset($request['id'])){
				$provider = Provider::find($request['id']);
				echo json_encode($provider);
			}else{
				$providers = Provider::getAll();
				echo json_encode($providers);
			}
		}
	}


?>