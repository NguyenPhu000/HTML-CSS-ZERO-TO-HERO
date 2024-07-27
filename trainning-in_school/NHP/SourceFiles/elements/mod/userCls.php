<?php
$s = '../../elements/mod/Database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './elements/mod/Database.php';
}
require_once $f;
class user extends Database
{
    //UserCheckLogin
    public function UserCheckLogin($username, $password)
    {
        $sql = 'select * from user where username = ? and password = ? and setlock = 1';
        $data = array($username, $password);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());
        if ($get_obj === 1) {
            return true;
        } else {
            return false;
        }
    }
    // UserCheckUsername 
    public function UserCheckUsername($username)
    {
        $sql = 'select * from user where username = ? ';
        $data = array($username);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());
        if ($get_obj == 1) {
            return true;
        } else {
            return false;
        }
    }
    // UserGetAll
    public function UserGetAll()
    {
        $sql = 'select * from user ';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    // UserAdd
    public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai)
    {
        $sql = "INSERT INTO user( username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES (?,?,?,?,?,?,?)";
        $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    // UserDelete
    public function UserDelete($iduser)
    {
        $sql = 'DELETE  from user where iduser = ? ';
        $data = array($iduser);

        $del = $this->connect->prepare($sql);
        $del->execute($data);

        return $del->rowCount();
    }
    // UserUpdate 
    public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser)
    {
        $sql = "UPDATE user set  username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ? where iduser = ?";
        $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    // UserGetbyId
    public function UserGetbyId($iduser)
    {
        $sql = 'select * from user where iduser = ? ';
        $data = array($iduser);

        $getID = $this->connect->prepare($sql);
        $getID->setFetchMode(PDO::FETCH_OBJ);
        $getID->execute($data);

        return $getID->fetch();
    }
    // UserSetPassword
    public function UserSetPassword($iduser, $password)
    {
        $sql = "UPDATE user set  password = ? where iduser = ?";
        $data = array($password, $iduser);

        $update_pass = $this->connect->prepare($sql);
        $update_pass->execute($data);

        return $update_pass->rowCount();
    }
    // UserSetActive
    public function UserSetActive($iduser, $setlock)
    {
        $sql = "UPDATE user set setlock = ? where iduser = ?";
        $data = array($setlock, $iduser);

        $update_pass = $this->connect->prepare($sql);
        $update_pass->execute($data);

        return $update_pass->rowCount();
    }
    // UserChangePassword
    public function UserChangePassword($iduser, $passwordold, $passwordnew)
    {
        $sql = 'select * from user where iduser = ? and password = ?';
        $data = array($iduser, $passwordold);

        $select = $this->connect->prepare($sql);
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);

        $get_obj = count($select->fetchAll());
        if ($get_obj === 1) {
            $sql = "UPDATE user set  password = ? where iduser = ?";
            $data = array($passwordnew, $iduser);

            $update_pass = $this->connect->prepare($sql);
            $update_pass->execute($data);

            return $update_pass->rowCount();
        } else {
            return false;
        }
    }
}
// kiem thu insert->okla | sai sodienthoai

// $user = new user();
// $row = $user->UserAdd('nhp_123', 'nhp123', 'Nguyễn Văn D', '0', '2005-06-14', 'Bình Tân, Vĩnh Long', '0906549872');
// echo $row;

// kiem thu UserCheckLogin->okla
// $user = new user();
// echo $user->UserCheckLogin('admin', 'admin1233');

//kiemthu UserCheckUsername-->okla
// $user = new user();
// echo $user->UserCheckUsername('admin');

// kiem thu UserGetAll-->okla
// $user = new user();
// $list = $user->UserGetAll();
// foreach ($list as $l) {
//     echo $l->gioitinh . '<br/>';
// }

// kiem tra UserDelete->okla
// $user = new user();
// echo $user->UserDelete(45);

// kiem tra UserUpdate->okla
// $user = new user();
// $row = $user->UserUpdate('nhp__456', '123nhp', 'Nguyễn Văn D', '0', '2006-05-14', 'Thuận An, Bình Minh', '0906549872', 54);
// echo $row;

//kiem tra UserGetbyId->okla
// $user = new user();
// $doituong = $user->UserGetbyId(54);
// echo $doituong->username . "<br/>";
// echo $doituong->password . "<br/>";
// echo $doituong->hoten . "<br/>";
// echo $doituong->diachi . "<br/>";

//kiem tra UserSetPassword->okla
// $user = new user();
// echo $user->UserSetPassword(40, '12345678');

//kiem tra UserSetActive -> okla
// $user = new user();
// echo $user->UserSetActive(46, 1);

// kiem tra UserChangePassword->okla
// $user = new user();
// echo $user->UserChangePassword(46, '1', '123');