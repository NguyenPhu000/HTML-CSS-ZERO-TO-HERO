<div>Cập nhật người dùng</div>
<?php
require '../mod/userCls.php';
$iduser = $_REQUEST['iduser'];

$userOBJ = new user();
$get_user_update = $userOBJ->UserGetbyId($iduser);
?>
<!-- table -->
<form name="userupdate" id="formupdate" method="post" action="./elements/mUser/userAct.php?reqact=userupdate">
    <input type="hidden" name="iduser" value="<?php echo $get_user_update->iduser; ?>">
    <table>
        <tr>
            <td>Tên đăng nhập:</td>
            <td><input type="text" name="username" value="<?php echo $get_user_update->username ?>" /></td>
        </tr>
        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" value="<?php echo $get_user_update->password ?>" /></td>
        </tr>
        <tr>
            <td>Họ tên:</td>
            <td><input type="text" name="hoten" value="<?php echo $get_user_update->hoten ?>" /></td>
        </tr>
        <tr>
            <td>Giới tính:</td>
            <td>Nam<input type="radio" name="gioitinh" value="1" <?php if ($get_user_update->gioitinh == 1) echo 'checked' ?> />
                Nữ<input type="radio" name="gioitinh" value="0" <?php if ($get_user_update->gioitinh == 0) echo 'checked' ?> />
            </td>
        </tr>
        <tr>
            <td>Ngày sinh:</td>
            <td><input type="date" name="ngaysinh" value="<?php echo $get_user_update->ngaysinh ?>" /></td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td><input type="text" name="diachi" value="<?php echo $get_user_update->diachi ?>" /></td>
        </tr>
        <tr>
            <td>Điện thoại:</td>
            <td><input type="tel" name="dienthoai" value="<?php echo $get_user_update->dienthoai ?>" /></td>
        </tr>
        <tr>
            <td><input type="submit" id="btnsubmit" value="Cập nhật" /></td>
            <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
        </tr>
    </table>
</form>