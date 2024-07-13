<?php
/* Constants */
define('SITE_NAME', 'PHP Fullstack Template');
define('BASE_DIR', '/path/to/your/base/directory');
define('WEB_ROOT', BASE_DIR . '/src');
define('CONN', BASE_DIR . '/conn/conn.php');
define('PAGE_ASSETS', BASE_DIR . '/page-assets');
define('LOGIN', BASE_DIR . '/login/login.php');
define('LOGOUT', BASE_DIR . '/login/logout.php');
define('LOGIN_CHECK', BASE_DIR . '/login/login_check.php');

define('PLUGINS', WEB_ROOT. '/plugins');
define('STYLES', WEB_ROOT . '/styles');
define('PUBLIC_FILES', WEB_ROOT . '/public');

define('PHP_SESSION_MANAGE', PAGE_ASSETS . '/session_manage.php');
define('HEADER_SRCS', PAGE_ASSETS . '/header_srcs.php');
define('FOOTER_SRCS', PAGE_ASSETS . '/footer_srcs.php');
define('NAVBAR', PAGE_ASSETS . '/nav.php');
define('FOOTER', PAGE_ASSETS . '/footer.php');
define('PAGE_INIT', PAGE_ASSETS . '/page_init.php');
define('PAGE_END', PAGE_ASSETS . '/page_end.php');
define('HTML_END', PAGE_ASSETS . '/html_end.php');

if(isset($_SERVER["REMOTE_ADDR"]) ) {
    define('CLIENT_IP', $_SERVER["REMOTE_ADDR"]);
} elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ) {
    define('CLIENT_IP', $_SERVER["HTTP_X_FORWARDED_FOR"]);
} elseif(isset($_SERVER["HTTP_CLIENT_IP"]) ) {
    define('CLIENT_IP', $_SERVER["HTTP_CLIENT_IP"]);
}
define('CLIENT_BROWSER', $_SERVER['HTTP_USER_AGENT']);

/* MYSQL DB Config */
putenv("host=localhost");
putenv("user=");
putenv("pass=");
putenv("db=");
?>