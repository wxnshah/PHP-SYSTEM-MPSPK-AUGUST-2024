<?php
/*-------------------------------------------------------+
| dksyn_
+--------------------------------------------------------+
| Author: dksyn_
+--------------------------------------------------------*/
// Calculate script start/end time
function get_microtime() {
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

// Define script start time
define("START_TIME", get_microtime());
define("IN_FUSION", TRUE);

session_start();

# memanggil fail connection
include("connection.php");

// Establish mySQL database connection
//$conn = new mysqli(HOST,USER,PSWD,DBNAME);
// $link = mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);
// unset($nama_host, $username_SQL , $password_SQL , $nama_DB);

ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

// Log In User
if(isset($_POST['login_user_ic']) && isset($_POST['login_password']) && $_POST['login_user_ic'] != "" && $_POST['login_password'] != ""){
    $user_ic = $_POST['login_user_ic'];
    $password = hash_hmac("sha512", $_POST['login_password'], "majlisperbandaransungaipetani");

    // Prepare and execute a parameterized query
    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE user_ic = ? AND password = ?");
    $stmt->bind_param("ss", $user_ic, $password);
    $stmt->execute();
    $result = $stmt->get_result();
	
	// echo "SELECT * FROM tb_users WHERE user_ic = ".$user_ic." AND password = '".$password."'";

    if($result->num_rows > 0){
        $userData = $result->fetch_assoc();

        // Set session data
        $_SESSION['userData'] = $userData;

        // Assigning id_users to a variable
        $id_users = $_SESSION['userData']['id_users'];
        $full_name = $_SESSION['userData']['full_name'];
        $user_name = $_SESSION['userData']['user_name'];
        $user_ic = $_SESSION['userData']['user_ic'];
        $user_email = $_SESSION['userData']['email'];

        // Redirect to index.php after setting session data
        redirect("index.php");
    } else {
        redirect("login.php?success=0");
    }
} elseif(isset($_GET['logout']) && $_GET['logout'] == "yes"){
    session_unset();
    session_destroy();
    redirect("login.php");
} else {
    // Check if user is already logged in
    if(isset($_SESSION['userData'])){
        // Assigning id_users to a variable
        $id_users = $_SESSION['userData']['id_users'];
        $full_name = $_SESSION['userData']['full_name'];
        $user_name = $_SESSION['userData']['user_name'];
        $user_ic = $_SESSION['userData']['user_ic'];
        $user_email = $_SESSION['userData']['email'];
    }
}

// MySQL database functions
function dbquery($query) {
	global $conn, $mysql_queries_count, $mysql_queries_time; $mysql_queries_count++;

	$query_time = get_microtime();
	$result = @mysqli_query($conn, $query);
	$query_time = substr((get_microtime() - $query_time),0,7);

	$mysql_queries_time[$mysql_queries_count] = array($query_time, $query);

	if (!$result) {
		echo mysqli_connect_error();
		return false;
	} else {
		return $result;
	}
}

// function dbcount($field, $table, $conditions = "") {
// 	global $mysql_queries_count, $mysql_queries_time; $mysql_queries_count++;

// 	$cond = ($conditions ? " WHERE ".$conditions : "");
// 	$query_time = get_microtime();
// 	$result = @mysqli_query("SELECT Count".$field." FROM ".$table.$cond);
// 	$query_time = substr((get_microtime() - $query_time),0,7);

// 	$mysql_queries_time[$mysql_queries_count] = array($query_time, "SELECT COUNT".$field." FROM ".$table.$cond);

// 	if (!$result) {
// 		echo mysqli_connect_error();
// 		return false;
// 	} else {
// 		$rows = mysqli_result($result, 0);
// 		return $rows;
// 	}
// }

function dbrows($query) {
	$result = @mysqli_num_rows($query);
	return $result;
}

function dbarray($query) {	
	$result = @mysqli_fetch_assoc($query);
	if (!$result) {
		echo mysqli_connect_error();
		return false;
	} else {
		return $result;
	}
}

// function dbconnect($nama_host, $username_SQL , $password_SQL , $nama_DB) {
// 	global $db_connect;

// 	$db_connect = @mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);
// 	if (!$db_connect) {
// 		die("<strong>Unable to establish connection to MySQL</strong><br />".$db_connect -> connect_error." : ".mysqli_connect_error());
// 	}
// }

// Get Data (ID To Name) From Other Table
function getDataFromTable($column_name, $data_id, $column_id, $lt_name) {
	$res = "";
	if($column_name!="" && $data_id!="" && $lt_name!="" && $column_id!="") {
		$query = "SELECT ".$column_name." FROM ".$lt_name." WHERE ".$column_id."='".$data_id."'";
		$rs=dbquery($query);
		$data=dbarray($rs);
		$res = $data[$column_name];
	}
	return $res;
}

// Redirect browser using header or script function
function redirect($location, $script = false) {
	if (!$script) {
		header("Location: ".str_replace("&amp;", "&", $location));
		exit;
	} else {
		echo "<script type='text/javascript'>document.location.href='".str_replace("&amp;", "&", $location)."'</script>\n";
		exit;
	}
}
?>