<?php
require_once('conn.php');
include('headeruser.php');

$id_university = isset($_GET['id_university']) && $_GET['id_university']!="" ? $_GET['id_university'] : "";

if(isset($_POST['Submit'])) {
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	include("assets/proses/UpdateUniversity.class.php");
}

if ($id_university != "") {
	# arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
	$arahan_SQL_cari1= "SELECT * FROM lt_university WHERE id_university = '".$id_university."'";
	
	# melaksanakan arahan memilih
	$laksana_arahan_cari=mysqli_query($conn,$arahan_SQL_cari1);
	
	# pembolehubah rekod mengambil data yang di pilih baris demi baris
	$rekod = mysqli_fetch_assoc($laksana_arahan_cari);
	$id_university = $rekod['id_university'];

	$data_name_uni = $rekod['name_university'];
	$data_code_uni = $rekod['code_university'];
	
}

include('sweetalerts2.php');

if(!empty($_SESSION)){
?>
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">Update University</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update University Page</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-file-lines me-1"></i>
                                Blank Page Example
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post" onSubmit="return capture();">
                                    
                                
                                
                                <input type="hidden" name="id_university" value="<?php echo $id_university; ?>">




                                
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">University Name</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert University Name" name="name_university" value="<?php echo $data_name_uni; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">University Code</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert University Code" name="code_university" value="<?php echo $data_code_uni; ?>">
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