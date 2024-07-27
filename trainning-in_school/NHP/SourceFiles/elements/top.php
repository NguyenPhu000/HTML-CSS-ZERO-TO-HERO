<?php
if (isset($_SESSION["USER"])) {
    $namelogin = $_SESSION["USER"];
}
if (isset($_SESSION["ADMIN"])) {
    $namelogin = $_SESSION["ADMIN"];
}
if (isset($_COOKIE["$namelogin"])) {
    echo 'Xin Chào '  . $namelogin . '<br/>';
    echo 'Lần đăng nhập gần nhất của ' . $namelogin . ' là:' . $_COOKIE[$namelogin];
}
//xử lý kết quả trả về của biến result
echo '<br/>';
if (isset($_GET['result'])) {
    if ($_GET['result'] == 'ok') {
?>
        <img src="./img_NguyenHongPhu/wait.png" alt="waiting" height="30px">
    <?php
    } else {
    ?>
        <img src="./img_NguyenHongPhu/wait.png" alt="waiting" height="30px">
    <?php
    }
} else {
    ?>
    <img src="./img_NguyenHongPhu/wait.png" alt="waiting" height="30px">
<?php
}
