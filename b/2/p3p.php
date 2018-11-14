<?php
/**
 * Created by PhpStorm.
 * User: wwb
 * Date: 2018/11/12
 * Time: 10:53
 */

header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
if (isset($_GET['sessname']) && isset($_GET['sessid'])) {
    // cross domain request from www.asite.com
    setcookie($_GET['sessname'], $_GET['sessid'], time() + 3600);

    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>bsite cross domain et asite cookie</title>
    <?php
    //在这里我没有做session redis共享的一些初始化设置，因为我不并不去读取当前session的数据内容
    //我只需把session name 和 session id 跨域请求并传递给asite，其会根据我传递的参数在其域下设定相同的session cookie
    session_start();
    echo "<script src='http://a.com/2/p3p.php?sessid=" . session_id() . "&sessname=". session_name() ."'></script>";
    ?>
</head>
<body>
<div style="text-align: center">
    <p>success login</p>
</div>
</body>
<script type="text/javascript">
    window.onload = function() {
        setTimeout(function(){
            window.location.replace('index.php');
        }, 1000);
    }
</script>
</html>