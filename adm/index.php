<?php
     #ini_set('display_errors', 1);
     #error_reporting(E_ALL);
    session_start();
	if (isset($_GET['logout'])){	
		$logout  = $_GET['logout'];	
	} else {
		$logout = 0;
	}
		
        if($_SESSION['auth'] != 1 or $logout == 1 )
    {   
        session_unset();     
        header("Location:/adm/auth.php");
    }
    

    require_once 'configuration.php';
    require_once "function/db_function.php";
    require_once "function/function.php";
    require_once 'all_errors.php';
    require_once "template/index.php"; 
?>