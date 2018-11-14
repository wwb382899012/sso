<?php
/**
 * Created by PhpStorm.
 * User: wwb
 * Date: 2018/11/12
 * Time: 10:52
 */

error_reporting(E_ALL);
//使用redis做session共享
//ini_set('session.save_handler', 'redis');
//ini_set('session.save_path', 'tcp://127.0.0.1:6379');
session_start();
//退出 销毁服务器端的session 状态完全同步 其他站点也会退出登录
if (isset($_GET['act'])) {
    session_destroy();
    header("location:index.php");
}

//添加新的session 用以验证session完全同步
if (isset($_POST['add'])) {
    $_SESSION[$_POST['key']] = $_POST['value'];
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>www.bsite.com</title>
</head>
<body>
<?php
if (isset($_SESSION['user'])) {
    ?>

    <div>welcome!<?php echo $_SESSION['user']?></div>
    <div>
        <h4>session完全同步验证</h4>
        <?php foreach ($_SESSION as $key => $value): ?>
            <p><?php echo $key . '--' . $value?></p>
        <?php endforeach ?>
    </div>
    <div>
        <h4>添加新的session键值</h4>
        <form action="" method="post">
            <input type="text" name="key" placehodler="session key">
            <input type="text" name="value" placehodler="session value">
            <input type="submit" value="Add" name="add">
        </form>
    </div>
    <a href="index.php?act=logout">退出</a>
    <?php
} elseif (isset($_POST['submit'])) {
    //用户登录
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['passwd'] = $_POST['passwd'];
    //同时触发cookie跨域设置的请求
    header("location:p3p.php");
} else {
    ?>
    <div>
        <h4>登录<h4>
                <form action="" method="post">
                    <input type="text" name="user" placehodler="username">
                    <input type="text" name="passwd" placehodler="userpasswd">
                    <input type="submit" value="Login" name="submit">
                </form>
    </div>
    <?php
}
?>
</body>
</html>