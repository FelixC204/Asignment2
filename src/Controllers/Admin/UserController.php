<?php 
namespace Quockhanh\Asignment2\Controllers\Admin;
use Quockhanh\Asignment2\common\Controller;

class UserController extends Controller{
    protected $folder = "Users.";
    public function index(){
        return $this->renderAdmin($this->folder.__FUNCTION__);
    }
}


?>