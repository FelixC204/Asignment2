<?php 
namespace Quockhanh\Asignment2\Controllers\Auth;
use Quockhanh\Asignment2\common\Controller;

class AuthController extends Controller{
    public function index(){
        return $this->renderAuth("login");
    }
}


?>