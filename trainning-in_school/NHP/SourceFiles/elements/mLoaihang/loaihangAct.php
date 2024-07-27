<?php
session_start();
require '../../elements/mod/loaihangCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            //xu ly them
            $tenloaihang = $_REQUEST['tenloaihang'];
            $mota = $_REQUEST['mota'];
            $hinhanh_file = $_FILES['fileimage']['tmp_name'];
            //encode matran 2 chieu thanh matran 1 chieu;
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));

            $loaihang = new loaihang();
            $rs = $loaihang->loaihangAdd($tenloaihang, $hinhanh, $mota);
            // echo $tenloaihang . '<br/>';
            // echo $mota . '<br/>';
            // echo $hinhanh . '<br/>';
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;

        case 'deleteloaihang':
            $idloaihang = $_REQUEST['idloaihang'];
            $loaihang = new loaihang();
            $rs = $loaihang->loaihangDelete($idloaihang);
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;

        case 'loaihangupdate':

            $idloaihang = $_REQUEST['idloaihang'];
            $tenloaihang = $_REQUEST['tenloaihang'];
            $mota = $_REQUEST['mota'];

            if (file_exists($_FILES['fileimage']['tmp_name'])) {
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                //encode matran 2 chieu thanh matran 1 chieu;
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            } else {
                $hinhanh = $_REQUEST['hinhanh'];
            }
            //kiem tra 
            // echo $idloaihang . '<br/>';
            // echo $tenloaihang . '<br/>';
            // echo $mota . '<br/>';
            // echo $hinhanh . '<br>';
            $loaihang = new loaihang();
            $rs = $loaihang->loaihangUpdate($tenloaihang, $hinhanh, $mota, $idloaihang);
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=loaihangView');
            break;
    }
} else {
    header('location:../../index.php?req=loaihangView');
}
