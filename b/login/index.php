<?php 

session_start();
/*$myfile = fopen("a.txt", "w") or die("Unable to open file!");
fwrite($myfile,$_REQUEST['user_id']);*/
$_SESSION['user_id']=$_REQUEST['user_id'];
echo json_encode(array('user_id'=>$_REQUEST['user_id']));


