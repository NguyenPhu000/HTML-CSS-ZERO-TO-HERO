<?php
if (isset($_GET['req'])) {
    $request = $_GET['req'];
    switch ($request) {
        case 'exjs01':
            require './pageJS/exjs01.php';
            break;
        case 'exjs02':
            require './pageJS/exjs02.php';
            break;
        case 'exjs03':
            require './pageJS/exjs03.php';
            break;
        case 'userView':
            require './elements/mUser/userView.php';
            break;
        case 'userupdate';
            require './elements/mUser/userUpdate.php';
            break;
        case 'loaihangView';
            require './elements/mLoaihang/loaihangView.php';
            break;
    }
} else {
    require './elements/default.php';
}
