<?php
class Database
{	private $host ="192.168.56.136";
    private $dbname="store";
    private $user ="aziz";
    private $password ="1";
    private $port ="3306";
    private $conn;
	
	// function yang pertama kali di-load saat class dipanggil
	public function __construct()
	{	// koneksi database
		try
		{	$this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8",$this->user,$this->password);		
		} catch (PDOException $e)
		{	echo "Koneksi gagal";			
		}
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
	{	$query = $this->conn->prepare("select id_user,server_id,nickname,email,nohp from pelanggan order by id_user");
		$query->execute();	
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);		
		// mengembalikan data	
		return $data;	
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
	}

	public function tampil_semua_data2()
	{	$queryy = $this->conn->prepare("select id_user,nominal,harga,metode,tanggal from transaksi order by id_user");
		$queryy->execute();	
		// mengambil banyak data dengan fetchAll	
		$data12 = $queryy->fetchAll(PDO::FETCH_ASSOC);		
		// mengembalikan data	
		return $data12;	
		// hapus variable dari memory	
		$queryy->closeCursor();
		unset($data12);
	}


	public function tampil_data($id_user)
	{	$query = $this->conn->prepare("select id_user,server_id,nickname,email,nohp from pelanggan where id_user=?");
		$query->execute(array($id_user));	
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;		
		$query->closeCursor();
		unset($id_user,$data);
	}

	public function tampil_data2($id_userr)
	{	$queryy = $this->conn->prepare("select id_user,nominal,harga,metode,tanggal from transaksi where id_user=?");
		$queryy->execute(array($id_userr));	
		// mengambil satu data dengan fetch	
		$data12 = $queryy->fetch(PDO::FETCH_ASSOC);
		return $data12;		
		$queryy->closeCursor();
		unset($id_userr,$data12);
	}
	
	public function tambah_data($data)
	{	$query = $this->conn->prepare("insert ignore into pelanggan (id_user,server_id,nickname,email,nohp from pelanggan) values (?,?,?,?,?)");
		$query->execute(array($data['id_user'],$data['server_id'],$data['nickname'],$data['email'],$data['nohp']));
		$query->closeCursor(); 
		unset($data);
	}

	public function tambah_data2($data12)
	{	$queryy = $this->conn->prepare("insert ignore into transaksi (id_user,nominal,harga,metode,tanggal from transaksi) values (?,?,?,?,?)");
		$queryy->execute(array($data12['id_user'],$data12['nominal'],$data12['harga'],$data12['metode'],$data12['tanggal']));
		$queryy->closeCursor(); 
		unset($data12);
	}

	public function ubah_data($data)
	{	$query = $this->conn->prepare("update pelanggan set server_id=?,nickname=?,email=?,nohp=? where id_user=?");
		$query->execute(array($data['server_id'],$data['nickname'],$data['email'],$data['nohp'],$data['id_user']));	
		$query->closeCursor(); 
		unset($data);
	}

	public function ubah_data2($data12)
	{	$queryy = $this->conn->prepare("update transaksi set nominal=?,harga=?,metode=?,tanggal=? where id_user=?");
		$queryy->execute(array($data12['nominal'],$data12['harga'],$data12['metode'],$data12['tanggal'],$data12['id_user']));	
		$queryy->closeCursor(); 
		unset($data12);
	}

	public function hapus_data($id_user)
	{	$query = $this->conn->prepare("delete from pelanggan where id_user=?");
		$query->execute(array($id_user));	
		$query->closeCursor(); 
		unset($id_user);
	}

	public function hapus_data2($id_userr)
	{	$queryy = $this->conn->prepare("delete from transaksi where id_user=?");
		$queryy->execute(array($id_userr));	
		$queryy->closeCursor(); 
		unset($id_userr);
	}
}
?>
