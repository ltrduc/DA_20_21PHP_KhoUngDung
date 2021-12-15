<?php
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
 
// Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
// tồn tại key này trong biến toàn cục $_POST thì nghĩa là người
// dùng đã click register(submit)
if (isset($_POST['add_register']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    $username   = $_POST['username'];
    $password   =$_POST['password'];
    $fullname      = $_POST['fullname'];
     
    // Validate Thông Tin Username và Email có bị trùng hay không
     
    // Kết nối CSDL
    include_once('config.php');
     
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM user WHERE username = '$username'";
     
    // Thực thi câu truy vấn
    $result = mysqli_query($mysqli, $sql);
     
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Tài Khoản Đã Tồn Tại! Vui lòng Đăng Ký Lại Nha!"); window.location="register.php";</script>';
         
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO `user`(`username`, `password`, `fullname`, `address`, `phone`, `level`, `img_avatar`) VALUES ('$username', '$password', '$fullname', '', '', '2', 'img/photos/unsplash.jpg')";         
        if (mysqli_query($mysqli, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
        }
    }
}
