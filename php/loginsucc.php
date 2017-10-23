<?php  
session_start();  
  
//检测是否登录，若没登录则转向登录界面  
if(!isset($_SESSION['name'])){  
    header("Location:../login.html");  
    exit();  
}  

//数据库连接文件   
$conn = @mysqli_connect("localhost","root","","user_db");  
if (!$conn){  
    die("连接数据库失败：" . mysql_error());  
}  
#mysql_select_db("user_db", $conn);  

$username = $_SESSION['name'];  
$user_query = mysql_query("select * from user_info where name=$username limit 1");  
$row = mysql_fetch_array($user_query);  
echo '用户信息：<br />';  
echo '用户名：',$username,'<br />';  
echo '邮箱：',$row<'email'>,'<br />';  
//echo '注册日期：',date("Y-m-d", $row['regdate']),'<br />';  
echo '<a href="logout.php">注销</a> <br />';  
?>  
