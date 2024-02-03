@extends('layout.main')
@section('title', 'Update Post')
@section('content')
    <div class="col-md-12 offset-md-0.5">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="titlePost">
                <h3 class="font-weight-bold text-dark">Tiêu đề bài viết</h3>
            </label>
            <input type="text" name="titlePost" id="titlePost" class="form-control" placeholder="Nhập tiêu đề bài viết"
                value="{{ $post['p_title'] }}">
            <pre></pre>
            <label for="thumbnail">
                <h3>Ảnh bìa bài viết</h3>
            </label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            <pre></pre>
            <label for="excerpt">
                <h3>Mô tả ngắn</h3>
            </label>
            <input type="text" name="excerpt" id="excerpt" class="form-control" value="{{ $post['p_excerpt'] }}">
            <label for="summernote">
            </label>
            <textarea id="summernote" name="content" class="form-control note-editable" value="">
                {{ $post['p_content'] }}
            </textarea>
            <label for="cate">Category</label>
            <select class="form-control" name="category_id" id="cate" required>
                @php
                    print_r($post);
                @endphp
                @foreach ($category as $cate)
                    <option @if ($cate['id'] == $post['p_category_id']) selected @endif value="{{ $cate['id'] }}">
                        {{ $cate['name'] }}</option>
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
