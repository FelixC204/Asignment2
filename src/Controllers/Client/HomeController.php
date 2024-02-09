<?php 
namespace Quockhanh\Asignment2\Controllers\Client;
use Quockhanh\Asignment2\common\Controller;
use Quockhanh\Asignment2\Models\Posts;

class HomeController extends Controller{
    private Posts $posts;

    public function __construct(){
        $this->posts = new Posts();
    }
    public function index(){
        $posts = $this->posts->getAll();
        return $this->renderClient("home");
    }

    public function profile(){
        return $this->renderClient("profile");
    }
}

?>