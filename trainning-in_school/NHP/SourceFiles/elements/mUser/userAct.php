<?php
session_start();
require '../../elements/mod/userCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            //xu ly them
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $hoten = $_REQUEST['hoten'];
            $gioitinh = $_REQUEST['gioitinh'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $dienthoai = $_REQUEST['dienthoai'];
            //kiem thu
            // echo $username . '<br/>';
            // echo $password . '<br/>';
            // echo $hoten . '<br/>';
            // echo $gioitinh . '<br/>';
            // echo $ngaysinh . '<br/>';
            // echo $diachi . '<br/>';
            // echo $dienthoai . '<br/>';
            //ok
            $user = new user();
            $rs = $user->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);
            if ($rs) {
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'deleteuser':
            $iduser = $_REQUEST['iduser'];
            $user = new user();
            $rs = $user->UserDelete($iduser);
            if ($rs) {
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'setlock':
            $iduser = $_REQUEST['iduser'];
            $setlock = $_REQUEST['setlock'];
            $user = new user();
            if ($setlock == 1) {
                $rs = $user->UserSetActive($iduser, 0);
            } else {
                $rs = $user->UserSetActive($iduser, 1);
            }
            if ($rs) {
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'userupdate':

            $iduser = $_REQUEST['iduser'];
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $hoten = $_REQUEST['hoten'];
            $gioitinh = $_REQUEST['gioitinh'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $dienthoai = $_REQUEST['dienthoai'];
            //kiem tra 
            // echo $iduser . '<br/>';
            // echo $username . '<br/>';
            // echo $password . '<br/>';
            // echo $hoten . '<br/>';
            // echo $gioitinh . '<br/>';
            // echo $ngaysinh . '<br/>';
            // echo $diachi . '<br/>';
            // echo $dienthoai . '<br/>';
            //-->okla
            $user = new user();
            $rs = $user->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);
            if ($rs) {
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'checklogin':
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            // echo $username . '<br/>';
            // echo $password . '<br/>';
            $user_OBJ = new user();
            $rs = $user_OBJ->UserCheckLogin($username, $password);
            if ($rs) {
                if ($username == 'admin') {
                    $_SESSION['ADMIN'] = $username;
                } else {
                    $_SESSION['USER'] = $username;
                }
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'userlogout':
            $timelogin = date('h:i - d/m/Y');
            if (isset($_SESSION["USER"])) {
                $namelogin = $_SESSION["USER"];
            }
            if (isset($_SESSION["ADMIN"])) {
                $namelogin = $_SESSION["ADMIN"];
            }
            setcookie($namelogin, $timelogin, time() + (86400 * 30), "/");
            session_destroy();
            header('location:../../index.php?');

            break;
        default:
            header('location:../../index.php?req=userView');
            break;
    }
} else {
    header('location:../../index.php?req=userView');
}