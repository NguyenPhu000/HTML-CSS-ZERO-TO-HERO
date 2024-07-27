<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/431f29c925.js" crossorigin="anonymous"></script>
    <!-- main css -->
    <link rel="stylesheet" href="./stylecss_NguyenHongPhu/style.css">
    <!-- main js -->
    <script type="text/javascript" src="./js_NguyenHongPhu/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="./js_NguyenHongPhu/jsrcipt.js"></script>
    <title>Website Thực Hành</title>
</head>

<body>
    <?php
    if (!isset($_SESSION["USER"]) && !isset($_SESSION["ADMIN"])) {
        header("location:userLogin.php");
    }
    ?>
    <div id="top_div">
        <?php require './elements/top.php'; ?>
    </div>
    <div id="left_div">
        <?php require './elements/left.php'; ?>
    </div>
    <div id="center_div">
        <?php require './elements/center.php'; ?>
    </div>
    <div id="right_div">
        <?php require './elements/right.php'; ?>
    </div>
    <div id="bottom_div"></div>
    <div id="logout_btn">
        <a href="./elements/mUser/userAct.php?reqact=userlogout">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
</body>

</html>