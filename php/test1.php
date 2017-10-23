k<?php 
#eval($_POST['ee']);
#eval("echo dir('/');");
#print_r(scandir('./'));
$mulu=scandir('./');
echo "the directory is:";
echo "<br>";
foreach($mulu as $v){
	echo $v;
	echo "<br>";
}
?>
