<?php

namespace Quockhanh\Asignment2\Controllers\Admin;

use Quockhanh\Asignment2\common\Controller;
use Quockhanh\Asignment2\Models\Categories;
use Quockhanh\Asignment2\Models\Posts;

class PostController extends Controller
{
    protected $path = "Posts.";
    private Posts $posts;

    const PATH_UPLOAD = "/public/uploads/posts/";
    public function __construct()
    {
        $this->posts = new Posts();
    }
    public function index()
    {
        $data['posts'] = $this->posts->getAll();
        $this->renderAdmin($this->path . __FUNCTION__, ['posts' => $data['posts']]);
    }

    public function create()
    {
        $category = new Categories();
        $cate = $category->getAll();
        if (!empty($_POST)) {
            $categoryID = $_POST['category_id'];
            $title = $_POST['titlePost'];
            $content =$_POST['content'];
            $excerpt = $_POST['excerpt'];
            $thumbnail = $_FILES['thumbnail'] ?? null;
            $pathImage = null;
            if($thumbnail){
                $pathImage = self::PATH_UPLOAD . uniqid(). $thumbnail['name'];
                if(!move_uploaded_file($thumbnail['tmp_name'], PATH_ROOT . $pathImage)){
                    $imagePath = null;
                }
            }
            $data=[
                
                'title'=> $title,
                'content'=> $this->store($content),
                'excerpt'=> $excerpt,
                'thumbnail'=> $pathImage,
                'category_id'=> $categoryID
            ];
            $this->posts->insert($data);
            $_SESSION['success'] = 'Thêm mới bài viết thành công';
            header('Location: /admin/post');
            exit();
        }

        $this->renderAdmin($this->path . __FUNCTION__, ['category' => $cate]);
    }


    public function delete($id)
    {
        $post = $this->posts->getPostById($id);
        if(empty($post)){
            die(404);
        }

        $this->posts->delete($id);

        if($post['thumbnail']
            && file_exists(PATH_ROOT . $post['thumbnail'])
        ){
            unlink(PATH_ROOT . $post['thumbnail']);
        }
        $_SESSION['success'] = 'Xoá bài viết thành công!';
        header('Location: /admin/post');
    }

    public function store($content)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($content);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $data = $img->getAttribute('src');
            $imageData = substr($data, strpos($data, ',') + 1);
            $decodedData = base64_decode($imageData);
            $target_dir = self::PATH_UPLOAD;
            $extension = $this->getImageExtension($decodedData);
            $target_file = $target_dir . uniqid() . '.' . $extension;
            file_put_contents(PATH_ROOT.$target_file, $decodedData);
            $img->setAttribute('src', $target_file);
        }
        return $dom->saveHTML();
    }

    private function getImageExtension($data)
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->buffer($data);

        switch ($mime) {
            case 'image/jpeg':
                return 'jpg';
            case 'image/png':
                return 'png';
            case 'image/gif':
                return 'gif';
            default:
                return 'png';
        }
    }

    public function update($id){
        $post = $this->posts->getPostById($id);
        if(empty( $post)){
            die(404);
        }
        if(!empty($_POST)){
            $categoryID = $_POST['category_id'];
            $title = $_POST['titlePost'];
            $content =$_POST['content'];
            $excerpt = $_POST['excerpt'];
            $thumbnail = $_FILES['thumbnail'] ?? null;
            $pathImage = $post['p_thumbnail'];
            $move = false;
            if($thumbnail){
                $pathImage = self::PATH_UPLOAD . rand() . $thumbnail['name'];
                if(!move_uploaded_file($thumbnail['tmp_name'], PATH_ROOT . $pathImage)){
                    $pathImage = $post['p_thumbnail'];
                }else{
                    $move = true;
                }
            }
            $data=[
                'title'=> $title,
                'content'=> $this->store($content),
                'excerpt'=> $excerpt,
                'thumbnail'=> $pathImage,
                'category_id'=> $categoryID
            ];
            $this->posts->update($id ,$data);
            if($move
                && $post['p_thumbnail']
                && file_exists(PATH_ROOT . $post['p_thumbnail'])
            ){
                unlink(PATH_ROOT . $post['p_thumbnail']);
            }
            $_SESSION['success'] = "Cập nhật thành công !";
            header("Location: /admin/post/$id/update");
        }
        $category = (new Categories)->getAll();
        return $this->renderAdmin($this->path . __FUNCTION__, ['post' => $post,'category'=>$category]);

    }

}
