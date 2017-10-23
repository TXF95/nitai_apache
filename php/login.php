<?php
header("content-type:text/html;charset=utf-8");

//注销登录
//if($_GET['action']=="logout"){
	//unset($_SESSION['name']);
	//echo '注销登录成功！点击此处<a href="../login.html">登录</a>';
	//exit;
//}

//if(!isset($_POST['submit'])){
//	exit('非法访问!');
//}


//$username = isset($_POST['name'])?$_POST['name']:"";
//$pwd = isset($_POST['pswd'])?$_POST['pswd']:"";
$username = $_POST['name'];
$pwd = $_POST['pswd'];

if((!empty($username))&&(!empty($pwd))){
	//$time=date("Y-m-d H:i:s",time());//获取时间作为本次登录时间
	//$ip=$_SERVER["REMOTE_ADDR"];//获取登陆IP地址

	$conn=@mysqli_connect("localhost",'root','','user_db') or die("数据库连接失败！");
	$sql="SELECT name,pswd FROM user_info WHERE name='$username' AND pswd='$pwd'";
	
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query);
	
	//判断用户名或密码是否正确
	if(($username==$row['name'])&&($pwd==$row['pswd'])) {
		session_start();
		$_SESSION['user']=$username;

		$time=date("Y-m-d H:i:s");//获取时间作为本次登录时间
		$ip=$_SERVER["REMOTE_ADDR"];//获取登陆IP地址
		//$conn=@mysqli_connect("localhost",'root','','user_db') or die("数据库连接失败！");
		echo "'当前访问用户,IP地址,时间 \n',$username, $ip, $time)<br>";	
		
		mysqli_query($conn,"set names utf8");
		$sql_log="insert into log_info(name,ip_addr,login_time) values('{$username}','{$ip}','now()')";
		//$sqlinsert="INSERT INTO log_info(name,ip_addr,login_time) VALUES('txf','192.168.137.102',null)";
		//mysql_query("use user_db");

                $result=mysqli_query($conn,$sql_log);
                if(!$result){
			die('Could not updte log_info data: ' . mysql_error());
		}
		echo $username," 欢迎你！<br>";
		//echo "<a href='loginsucc.php'>用户中心</a><br>";
		//echo "click here <a href='login.php'>login</a>";
		echo "点击此处<a href='logout.php'>注销</a><br>";
		exit;
	}else{
		//用户名或密码错误，赋值err为1
		
		header("Location:../login.html?err=1");
		echo '用户名或密码错误！';
	}
}else {
	echo "用户名或密码为空!";
	header("Location:../login.html?err=2");
}
?>
