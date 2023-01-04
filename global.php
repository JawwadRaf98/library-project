<?php 
    include_once "function/common_funtion.php";
    include_once "_modal/classes/db.class.php";
    include_once "admin/includes/config.php";
    // include_once "admin/class/admin.class.php";
   
   
    $dbF = new Database($host, $database, $user, $password );
    $functions = new CommonFunction('library-project');
    // $admin = new Admin();

    $GLOBALS['web_url'] = $functions->webUrl();

?>