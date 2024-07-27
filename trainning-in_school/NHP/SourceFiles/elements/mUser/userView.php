<div>Quản lý người dùng</div>
<hr>
<div>Người dùng mới</div>
<div class="container">
    <form name="newuser" id="formreg" method="post" action="./elements/mUser/userAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" /></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" checked="true" />
                    Nữ<input type="radio" name="gioitinh" value="0" />
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" /></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi" /></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai" /></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" /></td>
                <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr>
    <?php
    require './elements/mod/userCls.php';
    $userOBJ = new User();
    $list_user = $userOBJ->UserGetAll();
    $l = count($list_user);
    ?>
    <div class="title_user">Danh sách người dùng</div>
    <div class="content_user">
        Trong bảng có: <strong><?php echo $l ?></strong>

        <table border="solid">
            <thead>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ngày đăng ký</th>
                <th>Hoạt động</th>
                <th>Chức Năng</th>
            </thead>
            <?php
            //danh sách trả về có dữ liệu
            if ($l > 0) {
                foreach ($list_user as $user) {
            ?>
                    <tr>
                        <td><?php echo $user->iduser ?></td>
                        <td><?php echo $user->username ?></td>
                        <td><?php echo $user->password ?></td>
                        <td><?php echo $user->hoten ?></td>
                        <td align="center">
                            <?php if ($user->gioitinh == 1) {
                            ?>
                                <img src="./img_NguyenHongPhu/male.png" alt="male" class="icon_img">
                            <?php
                            } else {
                            ?>
                                <img src="./img_NguyenHongPhu/female.png" alt="female" class="icon_img">
                            <?php
                            } ?>
                        </td>
                        <td><?php echo $user->ngaysinh ?></td>
                        <td><?php echo $user->diachi ?></td>
                        <td><?php echo $user->dienthoai ?></td>
                        <td><?php echo $user->ngaydangky ?></td>

                        <!-- lock - unlock -->
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {


                                if ($user->setlock == 1) {
                            ?>
                                    <a href="./elements/mUser/userAct.php?reqact=setlock&iduser=<?php echo $user->iduser; ?> &setlock=<?php echo $user->setlock; ?>">
                                        <img src="./img_NguyenHongPhu/unlock.png" alt="active unlock" class="icon_img">
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="./elements/mUser/userAct.php?reqact=setlock&iduser=<?php echo $user->iduser; ?> &setlock=<?php echo $user->setlock; ?>">
                                        <img src="./img_NguyenHongPhu/lock.png" alt="active lock" class="icon_img">
                                    </a>
                                <?php
                                }
                            } else {
                                if ($user->setlock == 0) {
                                ?>
                                    <img src="./img_NguyenHongPhu/unlock.png" alt="active unlock" class="icon_img">
                                <?php
                                } else {
                                ?>
                                    <img src="./img_NguyenHongPhu/lock.png" alt="active lock" class="icon_img">
                            <?php
                                }
                            } ?>
                        </td>

                        <!-- delete-update -->
                        <td align="center">
                            <!-- delete -->
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./elements/mUser/userAct.php?reqact=deleteuser&iduser=<?php echo $user->iduser; ?>">
                                    <img src="./img_NguyenHongPhu/delete.png" alt="delete button" class="icon_img">
                                </a>
                            <?php
                            } else {
                            ?>
                                <img src="./img_NguyenHongPhu/delete.png" alt="delete button" class="icon_img">
                            <?php
                            }
                            ?>

                            <!-- update -->
                            <?php
                            if (isset($_SESSION['USER']) && $user->username == 'admin') {
                            ?>
                                <img src="./img_NguyenHongPhu/user-pen-solid.svg" alt="update button" class="icon_img">
                            <?php
                            } else {
                            ?>
                                <temps class="btn_update" value="<?php echo $user->iduser; ?>">
                                    <img src="./img_NguyenHongPhu/user-pen-solid.svg" alt="update button" class="icon_img">
                                </temps>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>