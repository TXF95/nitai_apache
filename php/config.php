<?php  
header ("Content-type:text/html;charset=utf8_bin");  
  
   define('HOST','127.0.0.1');  
   define('USERNAME','root');  
   define('PASSWORD','');  
  
//连库  
 $con=mysql_connect(HOST,USERNAME,PASSWORD);  
//选库  
mysql_select_db('user_db');  
  
//字符集  
  mysql_query('set names utf8_bin');  
?>  
