<?php
include "client.php";

if ($_POST['aksi']=='tambah')
{	$data = array("id_user"=>$_POST['id_user'],
				  "server_id"=>$_POST['server_id'],
				  "nickname"=>$_POST['nickname'],
				  "email"=>$_POST['email'],
				  "nohp"=>$_POST['nohp'],
				  "aksi"=>$_POST['aksi']);		
	$abc->tambah_data($data);
	header('location:index.php?page=data-server'); 
} else if ($_POST['aksi']=='ubah')
{	$data = array("id_user"=>$_POST['id_user'],
				  "server_id"=>$_POST['server_id'],
				  "nickname"=>$_POST['nickname'],
				  "email"=>$_POST['email'],
				  "nohp"=>$_POST['nohp'],
				  "aksi"=>$_POST['aksi']);
	$abc->ubah_data($data);
	header('location:index.php?page=data-server'); 
} else if ($_GET['aksi']=='hapus')
{	$data = array("id_user"=>$_GET['id_user'],
				  "aksi"=>$_GET['aksi']);
	$abc->hapus_data($data);
	header('location:index.php?page=data-server'); 
} else if ($_POST['aksi']=='tambahh')
{	$data12 = array("id_user"=>$_POST['id_user'],
				  "nominal"=>$_POST['nominal'],
				  "harga"=>$_POST['harga'],
				  "metode"=>$_POST['metode'],
				  "tanggal"=>$_POST['tanggal'],
				  "aksi"=>$_POST['aksi']);		
	$abc->tambah_data2($data12);
	header('location:index.php?page=data-serverr'); 
} else if ($_POST['aksi']=='ubah')
{	$data12 = array("id_user"=>$_POST['id_user'],
				  "nominal"=>$_POST['nominal'],
				  "harga"=>$_POST['harga'],
				  "metode"=>$_POST['metode'],
				  "tanggal"=>$_POST['tanggal'],
				  "aksi"=>$_POST['aksi']);
	$abc->ubah_data2($data12);
	header('location:index.php?page=data-serverr'); 
} else if ($_GET['aksi']=='hapuss')
{	$data12 = array("id_user"=>$_GET['id_user'],
				  "aksi"=>$_GET['aksi']);
	$abc->hapus_data2($data12);
	header('location:index.php?page=data-serverr'); 
} 
unset($data,$data12,$abc);
?>


