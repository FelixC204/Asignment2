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
            <label for="excerpt">
                <h3>Mô tả ngắn</h3>
            </label>
            <input type="text" name="excerpt" id="excerpt" class="form-control">
            <label for="summernote">
                <h3>Nội dung bài viết</h3>
            </label>
            <textarea id="summernote" name="content" class="form-control note-editable"></textarea>
            <label for="cate">Category</label>
            <select class="form-control" name="category_id" id="cate" required>
                <option value="">Chọn danh mục</option>

                @foreach ($category as $cate)
                    <option value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                @endforeach
            </select>
            <button type="submit" name="posting" class="btn btn-success float-right mt-2">Đăng bài</button>
            <div class="clearfix"></div>
        </form>
        <style>
            .note-editable {
                background-color: #fff;
            }
        </style>
    </div>
@endsection
