<?php
if($logout_status !== 'skip') {
    $n = "NULL";
    $d = date('Y-m-d H:i:s');
    $get_ip = CLIENT_IP;
    $get_browser = CLIENT_BROWSER;
    $log_sql = "INSERT INTO login_logs VALUES($n, $_SESSION[u_id], '$logout_status', '$d', '$get_ip', '$get_browser')";
    $conn->query($log_sql);

    $del_active_sql = "DELETE FROM active_logins WHERE userid = $_SESSION[u_id]";
    $conn->query($del_active_sql);
}

session_destroy();
header('location:/');
?>