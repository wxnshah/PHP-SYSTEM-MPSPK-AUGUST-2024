<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	
	# mengambil data POST
	$name_students = $_POST['name_students'];
	$ic_students = $_POST['ic_students'];
	$id_university = $_POST['id_university'];
	$id_department = $_POST['id_department'];
		
	#pengesahan data
	if (empty ($name_students) || empty ($ic_students) || empty ($id_university) || empty ($id_department))
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
		$arahan_sql_simpan = "INSERT INTO tb_students(name_students, ic_students, id_university, id_department)VALUES('$name_students','$ic_students','$id_university','$id_department')";

		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_simpan))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo "<script>alert('Kemasukan Data Berjaya')</script>";
			redirect("ListStudent.php?success=1");
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
			redirect("AddStudent.php?error=8");
		}
	}
	
}
?>