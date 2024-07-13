<?php
function custom_session_start() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['sess_destroyed'])) {
       if ($_SESSION['sess_destroyed'] < time()-300) {
            require_once(LOGOUT);
       }
       if (isset($_SESSION['new_sess_id'])) {
           session_commit();
           session_id($_SESSION['new_sess_id']);
           session_start();
           return;
       }
   }
}

function custom_session_regenerate_id($conn) {
    $old_sess_id = session_id();
    $new_sess_id = session_create_id(); //create new id
    $_SESSION['new_sess_id'] = $new_sess_id;
    $_SESSION['sess_destroyed'] = time(); //set the session_destroyed timestamp
    $old_sess = $_SESSION; //save the session values
    
    session_commit(); //write and close old session
    ini_set('session.use_strict_mode', 0);
    session_id($new_sess_id); //set the new session id
    ini_set('session.use_strict_mode', 1);
    session_start(); //start the new session

    $_SESSION = $old_sess; //bring the previous values into new session

    //unset old and unneeded values
    unset($old_sess);
    unset($_SESSION['sess_destroyed']);
    unset($_SESSION['new_sess_id']);

    //update the current active login record to use the new id
    $active_up_sql = "UPDATE active_logins SET login_session_id = '$new_sess_id' WHERE login_session_id = '$old_sess_id'";
    $conn->query($active_up_sql);
}
?>