<?php
namespace Quockhanh\Asignment2\Controllers\Admin;

use Quockhanh\Asignment2\common\Controller;

class PostController extends Controller{
    protected $path = "Posts.";
    public function index(){

    }

    public function create(){
        $this->renderAdmin($this->path.__FUNCTION__);
    }   
}