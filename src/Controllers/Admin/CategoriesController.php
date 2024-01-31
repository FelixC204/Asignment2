<?php

namespace Quockhanh\Asignment2\Controllers\Admin;

use Illuminate\Console\View\Components\Alert;
use Quockhanh\Asignment2\common\Controller;
use Quockhanh\Asignment2\Models\Categories;


// Các hàm của SweetAlert có thể được sử dụng như sau:



class CategoriesController extends Controller
{
    protected $folder = "Categories.";
    private Categories $categories;

    public function __construct()
    {
        $this->categories = new Categories();
    }
    public function index()
    {
        $data = $this->categories->getAll();
        return $this->renderAdmin($this->folder . __FUNCTION__, ["data" => $data]);
    }

    public function create()
    {
        if (!empty($_POST)) {
            $data = [
                "name" => $_POST["name"],
                "create_at" => date("Y-m-d"),
            ];
            $this->categories->insert($data);
            header("Location: /admin/categories");
            exit();
        }
        return $this->renderAdmin($this->folder . __FUNCTION__);
    }

    public function update($id)
    {
        $data['catgories'] = $this->categories->getCategoryById($id);
        if (empty($data['catgories'])) {
            die(404);
        }
        if (!empty($_POST)) {
            $this->categories->update($id,$_POST['name']);
            $_SESSION['success'] = "Cập nhật thành công!";
            header('Location: /admin/categories/'.$id.'/update');
            exit();
        }
        return $this->renderAdmin($this->folder . __FUNCTION__,$data);
    }

    public function delete($id)
    {
        $this->categories->deleteCategory($id);
        header('Location: /admin/categories');
        exit();
    }
}
