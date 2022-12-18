<?php
include "client.php";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">		
	<link href="css/bootstrap-responsive.css" rel="stylesheet">	
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
	<a class="brand" href="#">RESTful - JSON</a>
	<ul class="nav">
	  <li><a href="?page=home"><i class="icon-home"></i> Home</a></li>
	  <li><a href="?page=tambah"><i class="icon-plus-sign"></i> Tambah Data Pelanggan</a></li>
	  <li><a href="?page=tambahh"><i class="icon-plus-sign"></i> Tambah Data Transaksi</a></li>
	  <li><a href="?page=data-server"><i class="icon-list"></i> Data Pelanggan</a></li>
	  <li><a href="?page=data-serverr"><i class="icon-list"></i> Data Transaksi</a></li>
	</ul>
  </div>
</div>

<div class="container">
<fieldset>

<?php if ($_GET['page']=='tambah') {
?>
<legend>Tambah Data Pelanggan</legend>	
	<div class="row-fluid ">
    <div class="span8 alert alert-info">
	<form class="form-horizontal" name="form1" method="POST" action="proses.php" novalidate>
		<input type="hidden" name="aksi" value="tambah"/>
		<div class="control-group">
			<label class="control-label" for="id_user">Id User</label>
			<div class="controls">
				<input type="text" name="id_user" class="input-small" placeholder="ID"
					rel="tooltip" data-placement="right" title="Masukkan ID User"
					required data-validation-required-message="Harus diisi">				  
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="server_id">Server Id</label>
			<div class="controls">
				<input type="text" name="server_id" class="input-medium" placeholder="Server Id"
					rel="tooltip" data-placement="right" title="Masukkan Server Id"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nickname">Nickname</label>
			<div class="controls">
				<input type="text" name="nickname" class="input-medium" placeholder="nickname"
					rel="tooltip" data-placement="right" title="Masukkan Nickname"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<input type="text" name="email" class="input-medium" placeholder="email"
					rel="tooltip" data-placement="right" title="Masukkan Email"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nohp">Nomor Whatsapp</label>
			<div class="controls">
				<input type="text" name="nohp" class="input-medium" placeholder="nohp"
					rel="tooltip" data-placement="right" title="Masukkan Nomor Whatsapp"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
			</div>	
		</div>		
	</form>	
	</div>
	</div>

<?php } elseif ($_GET['page']=='tambahh') {
?>
<legend>Tambah Data Transaksi</legend>	
	<div class="row-fluid ">
    <div class="span8 alert alert-info">
	<form class="form-horizontal" name="form1" method="POST" action="proses.php" novalidate>
		<input type="hidden" name="aksi" value="tambahh"/>
		<div class="control-group">
			<label class="control-label" for="id_user">Id User</label>
			<div class="controls">
				<input type="text" name="id_user" class="input-small" placeholder="ID"
					rel="tooltip" data-placement="right" title="Masukkan ID User"
					required data-validation-required-message="Harus diisi">				  
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nominal">Nominal Pembelian</label>
			<div class="controls">
				<input type="text" name="nominal" class="input-medium" placeholder="nominal"
					rel="tooltip" data-placement="right" title="Masukkan Nominal Pembelian"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="harga">Harga</label>
			<div class="controls">
				<input type="text" name="harga" class="input-medium" placeholder="harga"
					rel="tooltip" data-placement="right" title="Masukkan Harga"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="metode">Metode Pembayaran</label>
			<div class="controls">
				<input type="text" name="metode" class="input-medium" placeholder="metode"
					rel="tooltip" data-placement="right" title="Masukkan Metode"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tanggal">Tanggal Transaksi</label>
			<div class="controls">
				<input type="text" name="tanggal" class="input-medium" placeholder="tanggal"
					rel="tooltip" data-placement="right" title="Masukkan Tanggal Pembayaran"
					required data-validation-required-message="Harus diisi">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button>
			</div>	
		</div>		
	</form>	
	</div>
	</div>
<?php } elseif ($_GET['page']=='ubah') {	
	$r = $abc->tampil_data($_GET['id_user']);	
?>
<legend>Ubah Data</legend>	
	<form name="form1" method="post" action="proses.php" class="form-inline">
		<input type="hidden" name="aksi" value="ubah"/>
		<input type="hidden" name="id_user" value="<?=$r->id_user?>" />
		<input type="text" disabled class="input-small" placeholder="Server Id" value="<?=$r->server_id?>">
		<input type="text" disabled class="input-small" placeholder="nickname" value="<?=$r->nickname?>">
		<input type="text" name="nama" class="input-medium" placeholder="email" value="<?=$r->email?>">
		<input type="text" disabled class="input-small" placeholder="nohp" value="<?=$r->nohp?>">
		<button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i> Ubah</button>
	</form>

<?php } elseif ($_GET['page']=='ubahh') {	
	$s = $abc->tampil_data2($_GET['id_user']);	
?>
<legend>Ubah Data</legend>	
	<form name="form1" method="post" action="proses.php" class="form-inline">
		<input type="hidden" name="aksi" value="ubahh"/>
		<input type="hidden" name="id_user" value="<?=$s->id_user?>" />
		<input type="text" disabled class="input-small" placeholder="nominal" value="<?=$s->nominal?>">
		<input type="text" disabled class="input-small" placeholder="harga" value="<?=$s->harga?>">
		<input type="text" name="nama" class="input-medium" placeholder="metode" value="<?=$s->metode?>">
		<input type="text" disabled class="input-small" placeholder="tanggal" value="<?=$s->tanggal?>">
		<button type="submit" name="ubahh" class="btn btn-primary"><i class="icon-ok icon-white"></i> Ubah</button>
	</form>

<?php  // menghapus variabel dari memory
	unset($r,$abc);	
	} else if ($_GET['page']=='data-server') {
?>
<legend>Daftar Data Pelanggan</legend>
	<form name="form1" method="post" action="proses.php" class="form-inline">
	</form>

	<table class="table table-hover">
	<tr><th width='10%'>No</th>
		<th width='10%'>Id User</th>
		<th width='10%'>Server Id</th>
		<th width='10%'>Nickname</th>
		<th width='10%'>Email</th>
		<th width='70%'>Nomor Whatsapp</th>
		<th width='5%'>Ubah</th>
		<th width='5%'>Hapus</th>
	</tr>
	<?php	$no = 1;
		$data = $abc->tampil_semua_data();
		foreach ($data as $r)	{
	?>	<tr><td><?=$no?></td>
			<td><?=$r->id_user?></td>
			<td><?=$r->server_id?></td>
			<td><?=$r->nickname?></td>
			<td><?=$r->email?></td>
			<td><?=$r->nohp?></td>
			<td><a href="?page=ubah&id_user=<?=$r->id_user?>" role="button" class="btn btn-success"><i class="icon-pencil"></i></a></td>
			<td><a href="proses.php?aksi=hapus&id_user=<?=$r->id_user?>" role="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" ><i class="icon-remove" ></i></a></td>
	    </tr>
	<?php	$no++;
		}	

		// menghapus variabel dari memory
		unset($data,$r,$no,$abc);
	?>
	</table>

<?php  // menghapus variabel dari memory
	unset($s,$abc);	
	} else if ($_GET['page']=='data-serverr') {
?>
<legend>Daftar Data Transaksi</legend>
	<form name="form1" method="post" action="proses.php" class="form-inline">
	</form>

	<table class="table table-hover">
	<tr><th width='10%'>No</th>
		<th width='10%'>Id User</th>
		<th width='10%'>Nominal</th>
		<th width='10%'>Harga</th>
		<th width='10%'>Metode</th>
		<th width='70%'>Tanggal</th>
		<th width='5%'>Ubah</th>
		<th width='5%'>Hapus</th>
	</tr>
	<?php	$no = 1;
		$data12 = $abc->tampil_semua_data2();
		foreach ($data12 as $s)	{
	?>	<tr><td><?=$no?></td>
			<td><?=$s->id_user?></td>
			<td><?=$s->nominal?></td>
			<td><?=$s->harga?></td>
			<td><?=$s->metode?></td>
			<td><?=$s->tanggal?></td>
			<td><a href="?page=ubahh&id_user=<?=$s->id_user?>" role="button" class="btn btn-success"><i class="icon-pencil"></i></a></td>
			<td><a href="proses.php?aksi=hapuss&id_user=<?=$s->id_user?>" role="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" ><i class="icon-remove" ></i></a></td>
	    </tr>
	<?php	$no++;
		}	

		// menghapus variabel dari memory
		unset($data12,$s,$no,$abc);
	?>
	</table>


	
<?php } else {
?>
<legend>Home</legend>
	Aplikasi sederhana ini menggunakan RESTful dengan format data JSON (JavaScript Object Notation).
</fieldset>
</div>
<?php	}
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/tooltip.js"></script>

<!-- jqBootstrapValidation -->
<script src="js/jqBootstrapValidation.js"></script>
<script>
	$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>

</body>
</html>
