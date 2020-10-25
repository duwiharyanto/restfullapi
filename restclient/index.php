<?php
session_start();
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$token=false;
if(isset($_SESSION["token"])){
	$token=$_SESSION["token"];
}

function cektoken($token){
	if(!$token){
		echo 'token tidak ditemukan';
		die();
	}
}
//$token='TGJMTkY0eDNBMjlKalVTWVAwZnhzUDNFTUxHdURrNHdUdzBkNnkzTA==';
$client = new Client(['base_uri' => 'localhost:1000/']);
if($_GET['aksi']=='pegawai'){
	cektoken($token);
	$url='admin/pegawai';
	$body=$client->get($url, [
	    'query' => ['token' =>$token]
	]);	
	$data=$body->getBody();
	$status=$body->getStatusCode();
	echo '<b>Status '.$status.'</b><br>';
	$obj =json_decode($data);
	foreach($obj->data AS $row){
	    echo $row->nama.', departmen '.$row->getdepartmen->departmen.'<br>';    
	}	
}elseif($_GET['aksi']=='register'){
	$url='register';
	$body=$client->post($url, [
	    //'query' => ['token' =>$token],
	    'form_params' => [
		    'name' => 'mita',
		    'email' => 'mita@gmail.com',
		    'password' =>'mita',
		]
	]);	
	$data=$body->getBody();
	$status=$body->getStatusCode();
	echo '<b>Status '.$status.'</b><br>';
	$obj =json_decode($data);
 	echo 'Message '.$obj->message.'<br>';  	
}elseif($_GET['aksi']=='login'){
	$url='login';
	$body=$client->post($url, [
	    //'query' => ['token' =>$token],
	    'form_params' => [
		    'email' => $_GET['email'],
		    'password' =>$_GET['password'],
		]
	]);	
	$data=$body->getBody();
	$status=$body->getStatusCode();
	$obj =json_decode($data);
	if($status==201){
		$_SESSION["token"] = $obj->data->apitoken;
		$_SESSION["user"] = $obj->data->user->name;
		echo 'Token dimasukkan session <br>';
	}else{
		echo 'Message '.$obj->message.'<br>';
		die();
	}
	echo '<b>Status '.$status.'</b><br>';
 	echo 'Message '.$obj->message.'<br>';
 	echo 'Token '.$obj->data->apitoken.'<br>';

}elseif($_GET['aksi']='hapuspegawai'){
	cektoken($token);
	$id=$_GET['id'];
	$url='admin/pegawai/delete/'.$id;

	$body=$client->delete($url, [
	    'query' => ['token' =>$token]
	]);	
	$data=$body->getBody();
	$status=$body->getStatusCode();
	$obj =json_decode($data);
	echo '<b>Status '.$status.'</b><br>';
	echo 'Message '.$obj->message.'<br>';
}elseif($_GET['aksi']='logout'){
	session_destroy();
	echo 'Logout';
	die(); 
}else{
	echo 'aksi tidak diketahui';
	die();
}

?>