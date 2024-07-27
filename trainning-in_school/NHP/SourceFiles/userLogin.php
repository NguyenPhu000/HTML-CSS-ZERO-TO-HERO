<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/431f29c925.js" crossorigin="anonymous"></script>
    <!-- css login -->
    <link rel="stylesheet" href="../../ss02/SourceFiles/stylecss_NguyenHongPhu/style_login.css" />
    <!-- js+jquery -->
    <script href="./js_NguyenHongPhu/jquery-3.7.1.min.js"></script>
    <script href="./js_NguyenHongPhu/jsrcipt.js"></script>
    <title>Login Website</title>
</head>

<body>
    <div id="login_form">
        <form name="form_login" method="post" action="elements/mUser/userAct.php?reqact=checklogin">
            <table>
                <tr>
                    <h1>Login</h1>
                </tr>
                <tr>
                    <div class="input_box">
                        <input type="text" placeholder="Username" name="username" id="username" required />
                        <i class="fa-solid fa-user"></i>
                    </div>
                </tr>
                <tr>
                    <div class="input_box">
                        <input type="password" placeholder="Password" name="password" id="password" required />
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </tr>

                <tr>
                    <div><button type="submit" class="btn">Login</button></div>
                </tr>

                <tr>
                    <div class="register-link">
                        <p>Bạn chưa có tài khoản?<a href="#">Đăng ký ngay</a></p>
                    </div>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>