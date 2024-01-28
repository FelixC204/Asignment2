@extends('layout.main')
@section('title', 'Create Post')
@section('content')
<div class="col-md-12 offset-md-0.5">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titlePost">
            <h3 class="font-weight-bold text-dark">Tiêu đề bài viết</h3>
        </label>
        <input type="text" name="titlePost" id="titlePost" class="form-control" placeholder="Nhập tiêu đề bài viết">
        <pre></pre>
        <label for="thumbnail">
            <h3>Ảnh bìa bài viết</h3>
        </label>
        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
        <pre></pre>
        <label for="summernote">
            <h3>Nội dung bài viết</h3>
        </label>
        <div id="summernote" class="form-control"></div>
        <button class="btn btn-success">Đăng bài</button>
    </form>
</div>
    
@endsection
