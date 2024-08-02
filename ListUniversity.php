<?php
require_once('conn.php');
include('headeruser.php');

if(isset($_GET['delete_id'])) {
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_GET);
	// echo "</pre>";
	include('assets/proses/DeleteUniversity.class.php');
}

include('sweetalerts2.php');
if(!empty($_SESSION)){
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>University Name</th>
                                            <th>University Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>University Name</th>
                                            <th>University Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $result = dbquery("SELECT * FROM lt_university");
                                    if(dbrows($result)) {
                                        $i=0;
                                        while($data=dbarray($result)) {
                                        $i++;
                                        echo "
                                        <tr>
                                            <td align='center'>
                                                ".$i."
                                            </td>
                                            <td>
                                                <p>".$data['name_university']."</p>
                                            </td>
                                            <td>
                                                <p>".$data['code_university']."</p>
                                            </td>
                                            <td align='center' width='1%'>
                                                <a href='UpdateUniversity.php?id_university=".$data['id_university']."'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;
                                                <a href='ListUniversity.php?delete_id=".$data['id_university']."' onClick=\"return deletebuttonask()\"><i class='fas fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                        }   
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
} else {
    redirect('login.php');
}
    include('footer.php');
?>