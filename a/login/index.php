<?php 

session_start();
$session_user_id='12345678';
$_SESSION['user_id']=$session_user_id;


/*//$con = curl_init("http://b.com/login/index.php");
$curl = curl_init();
//设置抓取的url
curl_setopt($curl, CURLOPT_URL, 'http://b.com/login/index.php');
//设置头文件的信息作为数据流输出
//curl_setopt($curl, CURLOPT_HEADER, 1);
//设置获取的信息以文件流的形式返回，而不是直接输出。
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//设置post方式提交
curl_setopt($curl, CURLOPT_POST, 1);
//设置post数据
$post_data = array(
    "user_id" => "wwb",
);
$a = curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
//执行命令
$data = curl_exec($curl);
//关闭URL请求
curl_close($curl);
//显示获得的数据
//print_r($data);*/

//header('location:http://b.com/login/index.php?user_id=123456');//成功

echo "<script src='http://test_a.com/login/index.php?user_id=".$session_user_id."'></script>";

?>


<!--<script src="http://b.com/login/index.php?user_id=123455"></script>-->
