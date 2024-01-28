<?php 
namespace Quockhanh\Asignment2\Controllers\Client;
use Quockhanh\Asignment2\common\Controller;

class HomeController extends Controller{
    public function index(){
        return $this->renderClient("home");
    }
}

?>