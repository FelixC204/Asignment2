<?php 
namespace Quockhanh\Asignment2\Controllers\Admin;
use Quockhanh\Asignment2\common\Controller;

class AdminController extends Controller{
    public function index(){
        return $this->renderAdmin("index");
    }
}


?>