<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client =new Client();


 if(isset($_POST['submit'])){
	$response=$client->request('PUT', 'http://localhost/native/oop_crud_mysql_mysqli_api_server/api/buku.php',[
		'json'=>[
			'id'=>$_POST['id'],
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
		echo "gagal update";
	}
	 
 }else{
	$response=$client->request('GET', 'http://localhost/native/oop_crud_mysql_mysqli_api_server/api/buku.php',[
		'query'=>[
			'id'=>$_GET['id']
		]
	]);
	$data=json_decode($response->getBody()->getContents(),TRUE);

 }
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<?php foreach($data['data'] as $buku ): ?>
    <form method="POST">
    <input type="text" name="id" value="<?=$buku['id'];?>" hidden/>
        <table>
            <tr>
                <td>Penulis</td>
                <td>:&nbsp;<input type="text" name="penulis" value="<?=$buku['penulis'];?>"/></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:&nbsp;<input type="text" name="judul" value="<?=$buku['judul'];?>"/></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:&nbsp;<input type="text" name="kota" value="<?=$buku['kota'];?>"/></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:&nbsp;<input type="text" name="penerbit" value="<?=$buku['penerbit'];?>"/></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:&nbsp;<input type="text" name="tahun" value="<?=$buku['tahun'];?>"/></td>
            </tr>
        </table>
        <button name="submit" type="submit">Simpan</button>
    </form>
	<?php endforeach ?>
	
</body>
</html>
