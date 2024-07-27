<div>Cập nhật loại hàng</div>
<?php
require '../mod/loaihangCls.php';
$idloaihang = $_REQUEST['idloaihang'];

$loaihangOBJ = new loaihang();
$get_loaihang_update = $loaihangOBJ->loaihangGetbyId($idloaihang);
?>
<!-- table -->

<!-- XIN CHÚ Ý FORM CÓ UPLOAD FILE GÌ ĐÓ THÌ LÀM ƠN ĐỂ ENCTPYE="MUTIPART/FORM-DATA" VÀO!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<form name="loaihangupdate" id="form-update-loaihang" method="post" enctype="multipart/form-data" action="./elements/mLoaihang/loaihangAct.php?reqact=loaihangupdate">
    <input type="hidden" name="idloaihang" value="<?php echo $get_loaihang_update->idloaihang; ?>">
    <input type="hidden" name="hinhanh" value="<?php echo $get_loaihang_update->hinhanh; ?>">
    <table>
        <tr>
            <td>Tên Loại hàng: </td>
            <td><input type="text" name="tenloaihang" value="<?php echo $get_loaihang_update->tenloaihang; ?>"></td>
        </tr>

        <tr>
            <td>Mô tả: </td>
            <td><input type="text" name="mota" value="<?php echo $get_loaihang_update->mota; ?>" size="50">
            </td>
        </tr>

        <tr>
            <td>File hình: </td>
            <td>
                <img height="100px" src="data:img/png;base64,<?php echo $get_loaihang_update->hinhanh; ?>">
                <br>
                <input type="file" name="fileimage">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" id="btnsubmit" value="Cập nhật" />
                <input type="reset" value="Làm lại" /><b id="noteForm"></b>
            </td>
        </tr>
    </table>
</form>