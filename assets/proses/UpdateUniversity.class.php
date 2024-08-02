<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	# mengambil data POST
	$id_university = $_POST['id_university'];

	$data_name_uni = $_POST['name_university'];
	$data_code_uni = $_POST['code_university'];

    #pengesahan data
	if (empty ($id_university) || empty ($data_name_uni) || empty($data_code_uni))
	{
		echo "<script>
			setTimeout(function() {
				Swal.fire({
					position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Data Tidak Lengkap !', icon: 'error', timerProgressBar: true, timer: 3000
				})
			}, 600);
		</script>";
	} else {
		#arahan SQL untuk menyimpan data	
		$arahan_sql_kemaskini = "

        UPDATE lt_university 

        SET 

        name_university = '".$data_name_uni."', 
        code_university = '".$data_code_uni."'

        WHERE id_university = '".$id_university."'";
			
		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_kemaskini))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo"<script>alert('Kemaskini Data Berjaya')</script>";
			redirect("ListUniversity.php?success=2");
		}
		else
		{	
			#jika proses menyimpan gagal,papar laman sebelumnya
			echo "<script>
				setTimeout(function() {
					Swal.fire({
						position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Gagal !', icon: 'error', timerProgressBar: true, timer: 3000
					})
				}, 600);
			</script>";
			redirect("UpdateUniversity.php?id_university='".$id_university."'");
		}
	}	
}
?>