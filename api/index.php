<?php
/**
 * Created by PhpStorm.
 * User: wwb
 * Date: 2018/11/12
 * Time: 10:51
 */

    //使用redis做session共享
    error_reporting(E_ALL);
    ini_set('session.save_handler', 'redis');
    ini_set('session.save_path', 'tcp://192.168.88.130:6379');
    session_start();

?>

    <?php if (isset($_SESSION['user'])):  //如果登录过，则去生成 url来源 的cookie ?>
                    <?php
                            if(isset($_GET['backUrl2'])) {
                                $backUrl = isset($_GET['backUrl2']) ? $_GET['backUrl2'] : '';
                                echo "<script src='" . $backUrl . "?sessid=" . session_id() . "&sessname=" . session_name() . "'></script>";
                                echo "<script>location.href='" . $backUrl . "'</script>";
                            }
                            else{
                                echo '非法请求!';
                            }
                    ?>

    <?php elseif(isset($_POST['submit'])):?>
            <?php

                    //用户登录
                    $_SESSION['user'] = $_POST['user'];
                    $_SESSION['passwd'] = $_POST['passwd'];
                    //同时触发cookie跨域设置的请求


                    if (isset($_POST['backUrl'])) {
                        $setCookieUrl = $_POST['backUrl'];
                        echo "<script src='" . $setCookieUrl . "?sessid=" . session_id() . "&sessname=" . session_name() . "'></script>";
                    } else {
                        if (isset($_SESSION['user'])) {
                            $setCookieUrl = dirname($_SERVER['HTTP_REFERER']) . '/index.php';
                            echo "<script src='" . $setCookieUrl . "?sessid=" . session_id() . "&sessname=" . session_name() . "'></script>";
                        }else{
                            $setCookieUrl = dirname($_SERVER['HTTP_REFERER']) . '/index.php';
                            echo "<script src='" . $setCookieUrl . "'></script>";
                        }
                    }

                    $backUrl = isset($_POST['backUrl']) ? $_POST['backUrl'] : dirname($_SERVER['HTTP_REFERER']) . '/index.php';
                    $backUrl.="?back_id=".time();
                    header("location:".$backUrl);
            ?>

    <?php else:?>
            <?php if(isset($_GET['backUrl'])): ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>统一登录平台</title>
                </head>
                <body>
                        <div>
                            <h4>sso登录<h4>
                            <form action="" method="post">
                                <input type="text" name="user" placehodler="username">
                                <input type="text" name="passwd" placehodler="userpasswd">

                                <input type="hidden" name="backUrl" value="<?php echo isset($_GET['backUrl'])?$_GET['backUrl']:'';?>">
                                <input type="submit" value="Login" name="submit">
                            </form>
                        </div>
                </body>
            </html>
            <?php else: ?>
                      <?php
                            if(isset($_GET['backUrl2'])) {
                                $backUrl = isset($_GET['backUrl2']) ? $_GET['backUrl2'] : '';
                                $backUrl .= "?back_id=" . time();
                                header("location:" . $backUrl);
                            }else{
                                echo '非法请求!';
                            }

                        ?>
            <?php endif;?>
   <?php endif;?>
