<?php
$now = time();

if(!isset($_SESSION['login']) || $_SESSION['login'] != 'success') {
    $logout_status = 'skip';
    require_once(LOGOUT);
}

if(isset($_SESSION['session_expire']) && $now <= $_SESSION['session_expire']) {
    $_SESSION['session_expire'] = time() + 1800;
} else {
    $logout_status = 'timeout';
    require_once(LOGOUT);
}

if($page_admin) {
    if($_SESSION['u_type'] != 'admin') {
        header('location:/dashboard.php');
    }
}
?>
