<?php
$page_admin = false;
$browser_title = SITE_NAME;
$custom_srcs = [];
$custom_styles = [];
ob_start();
require_once PHP_SESSION_MANAGE;
custom_session_start();
require_once CONN;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="/site.webmanifest" crossorigin="use-credentials">
	<link rel="icon" href="/public/favicon.ico" type="image/ico">
	<link rel="icon" href="/public/favicon-16x16.png" type="image/png" sizes="16x16">
	<link rel="icon" href="/public/favicon-32x32.png" type="image/png" sizes="32x32">
	<link rel="icon" href="/public/android-chrome-192x192.png" type="image/png" sizes="192x192">
	<link rel="icon" href="/public/android-chrome-512x512.png" type="image/png" sizes="512x512">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" sizes="180x180">
    <title><?php echo $browser_title; ?></title>
    <?php require_once HEADER_SRCS; ?>
    <?php
    if(isset($custom_styles) && !empty($custom_styles)) {
        foreach($custom_styles as $link) {
            echo "<link rel='stylesheet' href='$link'>";
        }
    }
    if(isset($custom_srcs) && !empty($custom_srcs)) {
        foreach($custom_srcs as $src) {
            echo "<script defer src='$src'></script>";
        }
    }
    ?>
</head>
<body>

<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'success' && isset($_GET['logout'])) {
	$logout_status = $_GET['logout'];
	require_once LOGOUT;
} elseif(isset($_SESSION['login']) && $_SESSION['login'] == 'success') {
	header("location: /dashboard.php");
}

if((isset($_POST['uname']) && isset($_POST['password'])) && ($_POST['uname'] != NULL && $_POST['password'] != NULL)) {
	$data = array();
	$u = $_POST['uname'];
	$p = $_POST['password'];
	
	$q = "SELECT * FROM users WHERE username = ?";
	$stmt = $conn->prepare($q);
	$stmt->bind_param("s", $u);
	$stmt->execute();
	$r = $stmt->get_result()->fetch_assoc();

	if(!is_null($r)) {
		if($r['username'] == $u && password_verify($p, $r['userpass'])) {
			$_SESSION['login'] = 'success';
			$_SESSION['u_id'] = $r['userid'];
			$_SESSION['u_name'] = $u;
			$_SESSION['u_type'] = $r['usertype'];
			$_SESSION['session_start'] = time(); //set session start to current time
			$_SESSION['session_expire'] = $_SESSION['session_start'] + 1800; //set session to expire in 30 min

			$stmt->close();

			custom_session_regenerate_id($conn);

			//insert into login logs
			$n = "NULL";
			$d = date('Y-m-d H:i:s');
			$get_ip = CLIENT_IP;
			$get_browser = CLIENT_BROWSER;
			$log_sql = "INSERT INTO login_logs VALUES($n, $_SESSION[u_id], 'login', '$d', '$get_ip', '$get_browser')";
			$conn->query($log_sql);

			$sess_id = session_id();
			//check if an active session already exists
			$active_check_sql = "SELECT * FROM active_logins WHERE userid = $_SESSION[u_id]";
			$active_check_stmt = $conn->query($active_check_sql);
			$active_num = $active_check_stmt->num_rows;
			if($active_num > 0) {
				$del_active_sql = "DELETE FROM active_logins WHERE userid = $_SESSION[u_id]";
				$conn->query($del_active_sql);
				$new_active_sql = "INSERT INTO active_logins VALUES('$sess_id', $_SESSION[u_id], '$d', '$get_ip', '$get_browser')";
				$conn->query($new_active_sql);
			} else {
				$new_active_sql = "INSERT INTO active_logins VALUES('$sess_id', $_SESSION[u_id], '$d', '$get_ip', '$get_browser')";
				$conn->query($new_active_sql);
			}
			
			ob_clean();
			$data['status'] = 'success';
			echo json_encode($data);
			return;
		} elseif($r['username'] != $u || !password_verify($p,$r['userpass'])) {
			ob_clean();
			$data['status'] = 'error';
			$data['message'] = 'Username or Password Incorrect';
			echo json_encode($data);
			return;
		}
	} else {
		ob_clean();
		$data['status'] = 'error';
		$data['message'] = 'User Cannot Be Found';
		echo json_encode($data);
		return;
	}
}
?>

<div class="container-fluid" style="margin-top: 200px;">
	<main class="form-signin col-md-4 m-auto">
		<div class='card'>
			<div class='card-body'>
				<form id="login-form" action="" method="post">
					<h1 class="h3 mb-3 fw-normal"><?php echo SITE_NAME ?>: Please sign in</h1>
					<div class="form-floating mb-3">
						<input type="text" class="form-control form-control-lg" id="uname" name="uname" placeholder="Username" required>
						<label for="uname">Username</label>
					</div>
					<div class="form-floating">
						<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
						<label for="password">Password</label>
					</div>
					<br>
					<button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
					<p class="mt-5 mb-3 text-body-secondary">© AlmostHDcode 2024</p>
				</form>
			</div>
		</div>
	</main>
</div>


<?php require_once FOOTER_SRCS; ?>

<script>
$(document).ready(function() {
	if($("#uname").val() != '') {
		$("#password").focus();
	}
});

$('#login-form').on('submit',function(e){
	e.preventDefault();
	$.ajax({
		url:'/',
		data: new FormData(e.target),
		cache: false,
		contentType: false,
		processData: false,
		method: 'POST',
		type: 'POST',
		success:function(data){
			console.log(data);
			data = $.parseJSON(data);
			if(data.status == 'success') {
                window.location.replace("/dashboard.php");
			} else {
				SweetToast(data.message,'warning');
				$("#password").val("");
				$("#password").focus();
			}
		}
	});
});
</script>

</body>
</html>
<?php ob_end_flush(); ?>
