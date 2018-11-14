<?php
/**
 * Created by PhpStorm.
 * User: wwb
 * Date: 2018/11/12
 * Time: 10:52
 */

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>asite cross domain set bsite cookie</title>
        <?php
        //在这里我没有做session redis共享的一些初始化设置，因为我不并不去读取当前session的数据内容
        //我只需把session name 和 session id 跨域请求并传递给bsite，其会根据我传递的参数在其域下设定相同的session cookie
        session_start();

        if (isset($_GET['backUrl'])) {
            $setCookieUrl = $_GET['backUrl'];
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

        $backUrl = isset($_GET['backUrl']) ? $_GET['backUrl'] : dirname($_SERVER['HTTP_REFERER']) . '/index.php';
        $backUrl.="?back_id=".time();

        ?>
    </head>
    <body>
    <div style="text-align: center">
        <p>success login</p>
    </div>
    </body>
    <script type="text/javascript">
        window.onload = function () {
            setTimeout(function () {
                window.location.replace('<?php echo $backUrl; ?>');
            }, 1000);
        }
    </script>
    </html>
