<?php
error_reporting(1); // error ditampilkan
class Client
{
	// diload pertama kali
	public function __construct($url)
	{	$this->url = $url;
		try
		{	if ($this->driver == 'mysql')
			{	$this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8",$this->user,$this->password);	
			} elseif ($this->driver == 'pgsql')
			{	$this->conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->password");	
			}	
		} catch (PDOException $e)
		{	echo "Koneksi gagal";			
		}

		// menghapus variable dari memory
		unset($url);
	}	

	// function untuk menghapus selain huruf dan angka
	public function filter($data)
	{	$data = preg_replace('/[^a-zA-Z0-9]/','',$data);
		return $data;
		unset($data);
	}

	public function filter2($data12)
	{	$data12 = preg_replace('/[^a-zA-Z0-9]/','',$data12);
		return $data12;
		unset($data12);
	}

	public function tampil_semua_data()
	{	$client = curl_init($this->url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);		
		// mengembalikan data
		return $data;
		// menghapus variable dari memory
		unset($data,$client,$response);
	}

	public function tampil_semua_data2()
	{	$client = curl_init($this->url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data12 = json_decode($response);		
		// mengembalikan data
		return $data12;
		// menghapus variable dari memory
		unset($data12,$client,$response);
	}
	
	public function tampil_data($id_user)
	{	$id_user = $this->filter($id_user);
		$client = curl_init($this->url."?aksi=tampil&id_user=".$id_user);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);		
		return $data; 
		unset($id_user,$client,$response,$data);		
	}
	
	public function tampil_data2($id_userr)
	{	$id_userr = $this->filter2($id_userr);
		$client = curl_init($this->url."?aksi=tampil&id_user=".$id_userr);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data12 = json_decode($response);		
		return $data12; 
		unset($id_userr,$client,$response,$data12);		
	}

	public function tambah_data($data)
	{	$data = '{	"id_user":"'.$data['id_user'].'",
					"server_id":"'.$data['server_id'].'",
					"nickname":"'.$data['nickname'].'",
					"email":"'.$data['email'].'",
					"nohp":"'.$data['nohp'].'",
					"aksi":"'.$data['aksi'].'"
				}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data,$c,$response);
	}

	public function tambah_data2($data12)
	{	$data12 = '{"id_user":"'.$data12['id_user'].'",
					"nominal":"'.$data12['nominal'].'",
					"harga":"'.$data12['harga'].'",
					"metode":"'.$data12['metode'].'",
					"tanggal":"'.$data12['tanggal'].'",
					"aksi":"'.$data12['aksi'].'"
				}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data12);
		$response = curl_exec($c);
		curl_close($c);
		unset($data12,$c,$response);
	}

	public function ubah_data($data)
	{	$data = '{	"id_user":"'.$data['id_user'].'",
					"server_id":"'.$data['server_id'].'",
					"nickname":"'.$data['nickname'].'",
					"email":"'.$data['email'].'",
					"nohp":"'.$data['nohp'].'",
					"aksi":"'.$data['aksi'].'"
				}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data,$c,$response);
	}

	public function ubah_data2($data12)
	{	$data12 = '{"id_user":"'.$data12['id_user'].'",
					"nominal":"'.$data12['nominal'].'",
					"harga":"'.$data12['harga'].'",
					"metode":"'.$data12['metode'].'",
					"tanggal":"'.$data12['tanggal'].'",
					"aksi":"'.$data12['aksi'].'"
				}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data12);
		$response = curl_exec($c);
		curl_close($c);
		unset($data12,$c,$response);
	}
	
	public function hapus_data($data)
	{	$nim = $this->filter($data['nim']);
		$data = '{	"nim":"'.$nim.'",
					"aksi":"'.$data['aksi'].'"
				}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($c);
		curl_close($c);
		unset($nim,$data,$c,$response);		
	}

	public function hapus_data2($data12)
	{	$id_userr = $this->filter2($data12['id_user']);
		$data12 = '{	"id_user":"'.$id_userr.'",
					"aksi":"'.$data12['aksi'].'"
				}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data12);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_userr,$data12,$c,$response);		
	}

	// function yang terakhir kali di-load saat class dipanggil
	public function __destruct()
	{	// hapus variable dari memory
		unset($this->url);	
	}
}

$url = 'http://192.168.56.136/restful-json-store/server/server.php';
// buat objek baru dari class Client
$abc = new Client($url);
?>