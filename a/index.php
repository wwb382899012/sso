<?php

error_reporting(E_ALL);
//使用redis做session共享
ini_set('session.save_handler', 'redis');
ini_set('session.save_path', 'tcp://192.168.88.130:6379');
session_start();
//退出 销毁服务器端的session 状态完全同步 其他站点也会退出登录
if (isset($_GET['act'])) {
    session_destroy();
    header("location:index.php");
}

$currentUrl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//当前页面url

?>


<?php
    if (isset($_SESSION['user'])) {
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>www.a.com</title>
        </head>
        <body>
        <div>欢迎登录系统A： <?php echo $_SESSION['user']?></div>

        <div>
            <h4>session完全同步验证</h4>
            <?php foreach ($_SESSION as $key => $value): ?>
                <p><?php echo $key . '--' . $value?></p>
            <?php endforeach ?>
        </div>

        <a href="index.php?act=logout">退出</a>
        </body>
        </html>
<?php
    }
    else{
    if (isset($_GET['sessid'])) {

        setcookie($_GET['sessname'], $_GET['sessid'], time() + 3600);

    }elseif(isset($_GET['back_id'])){
        echo "请先登录!&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href='http://api.com/index.php?backUrl=".$currentUrl."'>登录</a>";

    }else{

        header("location:http://api.com/index.php?backUrl2=".$currentUrl);
    }
}
?>

