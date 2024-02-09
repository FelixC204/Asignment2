<?php

namespace Quockhanh\Asignment2\Controllers\Auth;

use Quockhanh\Asignment2\common\Controller;
use Quockhanh\Asignment2\Models\Users;

class AuthController extends Controller
{
    private $path = "Auth.";
    public function login()
    {
        if (!empty($_POST)) {
            $_SESSION['error'] = [];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $_SESSION['error']['email'] = 'Email không được để trống';
            }
            if (empty($password)) {
                $_SESSION['error']['password'] = 'Password không được để trống';
            }
            $user = (new Users)->getEmailAndPassword($email, $password);
            if (empty($user)) {
                $_SESSION['error']['login'] = 'Email hoặc mật khẩu không đúng';
            } else {
                $_SESSION['user'] = $user;
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('Location: /admin');
                exit();
            }
        }
        return $this->renderAuth("login");
    }

    public function logout()
    {
        $_SESSION["error"]['logout']= "Đăng xuất thành công";
        unset($_SESSION['user']);
        header('Location: /auth/login');
        exit();
    }
}
