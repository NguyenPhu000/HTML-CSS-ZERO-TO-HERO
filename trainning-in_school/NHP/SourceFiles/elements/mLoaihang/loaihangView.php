<div>Quan lý loại hàng</div>
<hr>
<div>Thêm loại hàng</div>
<div class="container-loaihang">
    <!-- form add -->
    <form name="newloaihang" id="form_add-loaihang" enctype="multipart/form-data" method="post" action="./elements/mLoaihang/loaihangAct.php?reqact=addnew">
        <table>
            <tr>
                <td><input type="text" placeholder="Tên loại hàng" name="tenloaihang"></td>
            </tr>

            <tr>
                <td><input type="text" placeholder="Mô tả" name="mota"></td>
            </tr>

            <tr>
                <td><input type="file" placeholder="File hình" name="fileimage"></td>
            </tr>

            <tr>
                <td>
                    <input type="submit" id="btn_submit" value="Add">
                    <input type="reset" value="Reset"> <b id="noteForm"></b>
                    </ttd </tr>
        </table>
    </form>
    <!-- table hien thi-->
    <hr>
    <?php
    require './elements/mod/loaihangCls.php';
    $loaihangOBJ = new loaihang();
    $list_loaihang = $loaihangOBJ->loaihangGetAll();
    $l = count($list_loaihang);
    ?>
    <div class="title_loaihang">Danh sách loại hàng</div>
    <div class="content_loaihang">
        Trong bảng có: <strong><?php echo $l ?></strong>

        <table border="solid " class="table_loaihang">
            <thead>
                <th>ID</th>
                <th>Tên loại hàng</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Chức Năng</th>
            </thead>
            <?php
            //danh sách trả về có dữ liệu
            if ($l > 0) {
                foreach ($list_loaihang as $loaihang) {
            ?>
                    <tr>
                        <td><?php echo $loaihang->idloaihang ?></td>
                        <td><?php echo $loaihang->tenloaihang ?></td>
                        <td><?php echo $loaihang->mota ?></td>
                        <!-- decode hinhanh -->
                        <td align="center">
                            <img class="img_resize" src="data:image/png;base64,<?php echo ($loaihang->hinhanh) ?>">
                        </td>
                        <td align="center">
                            <!-- delete -->
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./elements/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $loaihang->idloaihang; ?>">
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

                            <img src="./img_NguyenHongPhu/modify.png" alt="update button" height="20px" class="w-update-open-btn cursor" value="<?php echo $loaihang->idloaihang; ?>">

                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <!-- hiển thị bảng update loaị hàng -->
    <div id="w-update">
        <div id="w-update-form"></div>
        <input type="button" value="close" class="w-update-close-btn">
    </div>
</div>