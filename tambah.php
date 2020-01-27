<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client =new Client();

 if(isset($_POST['submit'])){
	 $response=$client->request('POST', 'http://localhost/native/oop_crud_mysql_mysqli_api_server/api/buku.php',[
		'json'=>[
            'penulis'=>$_POST['penulis'],
            'judul'=>$_POST['judul'],
            'kota'=>$_POST['kota'],
            'penerbit'=>$_POST['penerbit'],
            'tahun'=>$_POST['tahun']
		]
	]);
	$data=json_decode($response->getBody()->getContents(),TRUE);
	 
	if($data['success']==true){
		header('location:index.php');
	}else{
		echo "gagal tambah";
	}
	 
 }
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
</head>
<body>
    <form method="POST">
            <table>
                <tr>
                    <td>Penulis</td>
                    <td>:&nbsp;<input type="text" name="penulis" id="penulis"/></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:&nbsp;<input type="text" name="judul" id="judul"/></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:&nbsp;<input type="text" name="kota" id="kota"/></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:&nbsp;<input type="text" name="penerbit" id="penerbit"/></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:&nbsp;<input type="text" name="tahun" id="tahun"/></td>
                </tr>
            </table>
            <button name="submit" type="submit">Tambah</button>
        </form>
</body>
</html>
