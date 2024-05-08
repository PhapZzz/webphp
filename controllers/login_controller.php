<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/login.php');

class LoginController extends BaseController
{
  private $data;

  function __construct() {

      $this->folder = 'pages';

    //   Khởi tạo biến $data
      $this->data = array(
          'css_files' => array(
              './assets/css/header.css',
              './assets/css/footer.css',
              './assets/css/login.css',
              './assets/icon/themify-icons/themify-icons.css',
              'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css',
              'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css'
          ),
          'js_files' => array(
              './assets/JavaScript/header.js',
              'assets/JavaScript/xulyajax.js'
          ),
        
      );
}
public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

public function login() {
    // Load view
    if (isset($_SESSION['user_id'])) {
        header("Location: http://localhost:8008/PHP/index.php?controller=pages&action=home");
    }
    $this->render('login', $this->data, null);
}

public function loginAuthentication()
{   
    $loginController = new LoginController();
      //   'err'=>"ok",
  
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (isset($_SESSION['user_id'])) {
        header("Location: http://localhost:8008/PHP/index.php?controller=pages&action=home");
    }
  
  // Kết nối CSDL - Đảm bảo bạn đã thực hiện kết nối trước đó
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Lấy thông tin người dùng từ CSDL
        $user = login::getAccountUser($username);

        if ($user) {
            // Kiểm tra mật khẩu
            if (password_verify($password, $user->getPassword())) {
                // Mật khẩu đúng, lưu thông tin người dùng vào session và chuyển hướng
                $_SESSION['user_id'] = $user->getIdUser();
                $_SESSION['role'] = $user->getRole()->getIdRole();
                $_SESSION['user'] = serialize($user);
                echo"succes";
                // header("Location: http://localhost:8008/PHP/index.php?controller=pages&action=home");
            } else {
                // Mật khẩu không đúng, hiển thị thông báo lỗi
                echo "err";
                // header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login&incorrectAccount=true");
            
            }
        } else {
            // Tên người dùng không tồn tại, hiển thị thông báo lỗi
            // header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login&incorrectAccount=true");
            echo "err";
        }
}

}

public function logout() {
    // Xóa session
    session_destroy();
    // Chuyển hướng về trang đăng nhập
    header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
}

public function error()
{
    $this->render('error', null , null);
}

}

