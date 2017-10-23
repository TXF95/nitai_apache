<?php
    //开启session
    //session_start();
    //撤销session
    //session_unset();
    session_destroy();
	//跳转到login.php
	unset($_SESSION);
	echo "<script>location.href='login.php';</script>";
    #header("Location:login.php");
?>
