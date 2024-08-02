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
	include("assets/proses/AddUniversity.class.php");
}
include('sweetalerts2.php');

if(!empty($_SESSION)){
?>
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">Add University</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add University Page</li>
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
                                            <label for="inputEmail4">University Name</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert University Name" name="name_university">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">University Code</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Please Insert University Code" name="code_university">
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