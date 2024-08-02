<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	# mengambil data POST
	$id_students = $_POST['id_students'];

    $data_name_students = $_POST['name_students'];
	$data_ic_students = $_POST['ic_students'];
	$data_id_university = $_POST['id_university'];
	$data_id_department = $_POST['id_department'];

    #pengesahan data
	if (empty ($data_name_students) || empty ($data_ic_students) || empty ($data_id_university) || empty ($data_id_department))
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

        UPDATE tb_students

        SET 

        name_students = '".$data_name_students."',
        ic_students = '".$data_ic_students."',
        id_university = '".$data_id_university."',
        id_department = '".$data_id_department."'

        WHERE id_students = '".$id_students."'";
			
		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_kemaskini))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo"<script>alert('Kemaskini Data Berjaya')</script>";
			redirect("ListStudent.php?success=2");
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
			redirect("UpdateStudent.php?id_student='".$id_student."'");
		}
	}	
}
?>