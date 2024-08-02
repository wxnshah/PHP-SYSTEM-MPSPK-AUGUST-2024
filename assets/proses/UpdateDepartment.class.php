<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	# mengambil data POST
	$id_department = $_POST['id_department'];

	$data_name_department = $_POST['name_department'];

    #pengesahan data
	if (empty ($id_department) || empty ($data_name_department))
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

        UPDATE lt_department

        SET 

        name_department = '".$data_name_department."'

        WHERE id_department = '".$id_department."'";
			
		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_kemaskini))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo"<script>alert('Kemaskini Data Berjaya')</script>";
			redirect("ListDepartment.php?success=2");
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
			redirect("UpdateDepartment.php?id_department='".$id_department."'");
		}
	}	
}
?>