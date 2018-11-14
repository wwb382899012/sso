<?php
/**
 * Created by PhpStorm.
 * User: wwb
 * Date: 2018/11/12
 * Time: 10:52
 */
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
if (isset($_GET['sessname']) && isset($_GET['sessid'])) {
    // cross domain request from www.bsite.com
    setcookie($_GET['sessname'], $_GET['sessid'], time() + 3600);
}
?>
