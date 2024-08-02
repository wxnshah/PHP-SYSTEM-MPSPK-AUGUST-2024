<?php
$id_university = isset($_GET['delete_id']) && $_GET['delete_id']!="" ? $_GET['delete_id'] : "";

#arahan SQL untuk padam data
$arahan_sql_kemaskini = "DELETE FROM lt_university WHERE id_university = '".$id_university."'";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($conn, $arahan_sql_kemaskini))
	{
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Data Berjaya Dipadam')</script>";
		redirect("ListUniversity.php?success=3");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal Padam');
		window.history.back();</script>";
	}
?>