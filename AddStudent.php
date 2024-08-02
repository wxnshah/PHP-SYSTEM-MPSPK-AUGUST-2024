<?php
require_once("conn.php");
include("headeruser.php");

if(isset($_POST['Submit'])) {
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	include("assets/proses/AddStudent.class.php");
}
include('sweetalerts2.php');

if(!empty($_SESSION)){
?>
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">Add Student</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Student Page</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-file-lines me-1"></i>
                                Blank Page Example
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post" onSubmit="return capture();">
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Name</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert Student Name" name="name_students">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student IC</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert Student IC" name="ic_students">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">

                                            <label for="inputEmail4">Student University</label>
                                            <select class="form-control select2" name="id_university" required autofocus>
                                            <option value="">Please Select Student University</option>
                                                <?php
                                                    $rs = dbquery("SELECT * FROM lt_university");
                                                    while($data=dbarray($rs)){
                                                    $id_university = $data['id_university'];
                                                    $name_university = $data['name_university'];
                                                    $code_university = $data['code_university'];
                                                
                                                    echo "<option value='".$id_university."'>".$name_university." (".$code_university.")</option>";
                                                    }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Department</label>
                                            <select class="form-control select2" name="id_department" required autofocus>
                                            <option value="">Please Select Student Department</option>
                                                <?php
                                                    $rs = dbquery("SELECT * FROM lt_department");
                                                    while($data=dbarray($rs)){
                                                    $id_department = $data['id_department'];
                                                    $name_department = $data['name_department'];
                                                
                                                    echo "<option value='".$id_department."'>".$name_department."</option>";
                                                    }
                                                ?>
                                            </select>
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