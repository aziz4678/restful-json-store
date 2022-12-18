<?php
error_reporting(1);
include "database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");
$postdataa = file_get_contents("php://input");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	$data = json_decode($postdata);
	$data12 = json_decode($postdataa);
    $id_user = $data->id_user;
	$server_id = $data->server_id;
    $nickname = $data->nickname;
    $email = $data->email;
    $nohp = $data->nohp;
	$id_userr = $data12->id_user;
	$nominal = $data12->nominal;
    $harga = $data12->harga;
    $metode = $data12->metode;
    $tanggal = $data12->tanggal; 

	if ($aksi == 'tambah')
	{	$data2=array('id_user' => $id_user, 
					'server_id' => $server_id,
					'nickname' => $nickname,
					'email' => $email,
					'nohp' => $nohp
					);	
		$abc->tambah_data($data2);
	} elseif ($aksi == 'ubah') 
	{	$data2=array('id_user' => $id_user, 
					 'server_id' => $server_id,
					 'nickname' => $nickname,
					 'email' => $email,
					 'nohp' => $nohp
					);	
		$abc->ubah_data($data2);	
	} elseif ($aksi == 'hapus') 
	{	$abc->hapus_data($id_user);
	} elseif ($aksii == 'tambahh')
	{	$data122=array('id_user' => $id_userr, 
					'nominal' => $nominal,
					'harga' => $harga,
					'metode' => $metode,
					'tanggal' => $tanggal
					);
		$abc->tambah_data2($data122);
	} elseif ($aksii == 'ubahh')
	{	$data122=array('id_user' => $id_userr, 
					'nominal' => $nominal,
					'harga' => $harga,
					'metode' => $metode,
					'tanggal' => $tanggal
					);
		$abc->ubah_data2($data122);
	} elseif ($aksii == 'hapuss') 
	{	$abc->hapus_data2($id_userr);
	}
	// hapus variable dari memory
	unset($postdata,$postdata,$data,$data2,$data12,$data122,$id_user,$server_id,$nickname,$email,$nohp,$id_userr,$nominal,$harga,$metode,$tanggal,$abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') 
{	if ( ($_GET['aksi']=='tampil') and (isset($_GET['id_user'])) )
	{	$id_user = $abc->filter($_GET['id_user']);	
		$data=$abc->tampil_data($id_user);
		echo json_encode($data);
	} else  //menampilkan semua data 
	{	$data = $abc->tampil_semua_data();
		echo json_encode($data);     
	} 

	unset($postdata,$data,$id_user,$abc);		
}
{ if ( ($_GET['aksi']=='tampill') and (isset($_GET['id_user'])) )
	{	$id_userr = $abc->filter($_GET['id_user']);	
		$data12=$abc->tampil_data2($id_userr);
		echo json_encode($data12);    
	} else //menampilkan semua data 
	{	$data12 = $abc->tampil_semua_data2();
		echo json_encode($data12);     
	}
	unset($postdataa,$data12,$id_userr,$abc);		
}
?>
