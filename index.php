<?php
//install by composer : 'composer require guzzlehttp/guzzle:~6.0' di folder yang sama

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client =new Client();
$response=$client->request('GET', 'http://localhost/native/oop_crud_mysql_mysqli_api_server/api/buku.php');
$data=json_decode($response->getBody()->getContents(),TRUE);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
</head>
<body>
    <h3><a href="tambah.php">Tambah Buku</a>
    <br>
    <table>
        <tr>
            <th>Penulis</th>
            <th>Judul</th>            
            <th>Kota</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Action</th>
        </tr>
    <?php foreach($data['data'] as $buku ): ?>
        <tr>
            <td><?=$buku['penulis'];?></td>
            <td><?=$buku['judul'];?></td>
            <td><?=$buku['kota'];?></td>
            <td><?=$buku['penerbit'];?></td>
            <td><?=$buku['tahun'];?></td>
            <td>
                <a href="edit.php?id=<?=$buku['id'];?>">Edit</a> 
                |
                <a href="hapus.php?id=<?=$buku['id'];?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </table>

</body>
</html>
