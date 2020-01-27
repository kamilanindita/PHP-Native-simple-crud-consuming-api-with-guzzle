 <?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client =new Client();

 $response=$client->request('DELETE', 'http://localhost/native/oop_crud_mysql_mysqli_api_server/api/buku.php',[
		'json'=>[
			'id'=>$_GET['id']
		]
	]);
	$data=json_decode($response->getBody()->getContents(),TRUE);
	
	if($data['success']==true){
		header('location:index.php');
	}else{
		echo "gagal hapus";
	}

?>