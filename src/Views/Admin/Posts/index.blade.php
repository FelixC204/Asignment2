@extends('layout.main')
@section('title', 'Create Post')
@section('content')
    <div class="col-md-10 offset-md-1">
        <a href="/admin/post/create"class="btn btn-success">Thêm bài viết</a>
        <table class="table">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post['p_id'] }}</td>
                    <td>{{ $post['p_title'] }}</td>
                    <td><img src="{{ $post['p_thumbnail'] }}" alt="" width="100px"></td>
                    <td>{{$post['c_name']}}</td>
                    <td>
                        <a href="/admin/post/{{ $post['p_id'] }}/update" class="btn btn-primary">Sửa</a>
                        <a href="" class="btn btn-danger delete-post"data-url="/admin/post/{{ $post['p_id'] }}/delete">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <script>
        var deleteButtons = document.querySelectorAll('.delete-post');
    
        deleteButtons.forEach(function(button) {
          button.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
    
            var deleteUrl = this.getAttribute('data-url');
    
            Swal.fire({
              title: 'Bạn có chắc chắn muốn xóa?',
              text: 'Hành động này không thể hoàn tác!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Xóa',
              cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = deleteUrl;
              }
            });
          });
        });
    </script>  
@endsection
