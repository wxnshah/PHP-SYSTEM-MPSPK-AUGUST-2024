<?php
require_once("conn.php");
include("headeruser.php");

$id_department = isset($_GET['id_department']) && $_GET['id_department']!="" ? $_GET['id_department'] : "";

if(isset($_POST['Submit'])) {
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	include("assets/proses/UpdateDepartment.class.php");
}

if ($id_department != "") {
	# arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
	$arahan_SQL_cari1= "SELECT * FROM lt_department WHERE id_department = '".$id_department."'";
	
	# melaksanakan arahan memilih
	$laksana_arahan_cari=mysqli_query($conn,$arahan_SQL_cari1);
	
	# pembolehubah rekod mengambil data yang di pilih baris demi baris
	$rekod = mysqli_fetch_assoc($laksana_arahan_cari);
	$id_department = $rekod['id_department'];

	$data_name_department = $rekod['name_department'];
	
}

include('sweetalerts2.php');

if(!empty($_SESSION)){
?>
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">Update Department</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Department Page</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-file-lines me-1"></i>
                                Blank Page Example
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post" onSubmit="return capture();">
                                    <input type="hidden" name="id_department" value="<?php echo $id_department; ?>">
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Department Name</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert Department Name" name="name_department" value="<?php echo $data_name_department; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 mt-3" style="text-align: center;">
                                            <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>

                    </div>
                </main>
<?php
} else {
    redirect('login.php');
}
    include('footer.php');
?>