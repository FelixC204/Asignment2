<?php

namespace Quockhanh\Asignment2\Controllers\Admin;

use Quockhanh\Asignment2\common\Controller;
use Quockhanh\Asignment2\Models\Users;


class UserController extends Controller
{
    protected $folder = "Users.";
    private Users $user;
    public function __construct()
    {
        $this->user = new Users();
    }
    public function index()
    {
        $user = new Users();
        $users = $user->getAll();
        return $this->renderAdmin($this->folder . __FUNCTION__, ['users' => $users]);
    }

    public function create()
    {
        $data = [
            "name" => "",
            "email" => "",
            "password" => "",
            "image" => "",
            "address" => "",
            "phone" => ""
        ];

        if (!empty($_POST)) {
            if (!empty($_FILES['image']['name'])) {
                $target_dir = "public/uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $data["image"] = $target_file;
            }

            $data["name"] = $_POST["name"];
            $data["email"] = $_POST["email"];
            $data["password"] = $_POST["password"];
            $data["address"] = $_POST['address'];
            $data["phone"] = $_POST["phone"];
            $data["role"] = $_POST["role"];
            $this->user->insertUser($data);
            header('Location: /admin/user');
            exit();
        }

        return $this->renderAdmin($this->folder . __FUNCTION__);
    }


    public function update($id)
    {
        $data['user'] = $this->user->getUserById($id);
        if (empty($data['user'])) {
            die(404);
        }
        if (!empty($_POST)) {
            $userData = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];
            $this->user->updateUser(
                $id,
                $userData
            );
            $_SESSION['success'] = "Cập nhật thành công!";
            header('Location: /admin/user/' . $id . '/update');
            exit();
        }
        return $this->renderAdmin($this->folder . __FUNCTION__, $data);
    }

    public function show($id)
    {
        $data['user'] = $this->user->getUserById($id);
        if (empty($data['user'])) {
            die(404);
        }
        return $this->renderAdmin($this->folder . __FUNCTION__, $data);
    }

    public function delete($id)
    {
        $data['user'] = $this->user->getUserById($id);
        if (empty($data['user'])) {
            die(404);
        }
        $this->user->deleteUser($id);
        $_SESSION['success'] = 'Xoá thành công';
        header('Location: /admin/user');
        exit();
    }
}
