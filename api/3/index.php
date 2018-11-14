<?php
/**
 * Created by PhpStorm.
 * User: wwb
 * Date: 2018/11/12
 * Time: 10:51
 */

    error_reporting(E_ALL);
    //使用redis做session共享
    ini_set('session.save_handler', 'redis');
    ini_set('session.save_path', 'tcp://192.168.88.130:6379');
    session_start();

?>

    <?php
        if (isset($_SESSION['user'])) {//如果登录过，则设置 url来源 的cookie
    ?>



    <?php
        } elseif (isset($_POST['submit'])) {
            //用户登录
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['passwd'] = $_POST['passwd'];
            //同时触发cookie跨域设置的请求
            header("location:p3p.php?backUrl=".$_POST['backUrl']);
        } else {
    ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>www.api.com</title>
                </head>
                <body>
                        <div>
                            <h4>登录<h4>
                            <form action="" method="post">
                                <input type="text" name="user" placehodler="username">
                                <input type="text" name="passwd" placehodler="userpasswd">

                                <input type="hidden" name="backUrl" value="<?php echo $_GET['backUrl'];?>">
                                <input type="submit" value="Login" name="submit">
                            </form>
                        </div>
                </body>
            </html>
    <?php
        }
    ?>
