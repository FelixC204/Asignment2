@extends('layout.main')
@section('title', 'Danh mục')
@section('content')
    <div class="container mt-5">
        <div class="add-btn">
            <button class="btn btn-success"><a class="text-reset" href="/admin/categories/create">Add Category</a></button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Create At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $cate)
                    <tr>
                        <th scope="row">{{ $cate['id'] }}</th>
                        <td>{{ $cate['name'] }}</td>
                        <td>{{ $cate['create_at'] }}</td>
                        <td>
                            <button class="btn btn-primary"><a href="/admin/categories/{{ $cate['id'] }}/update"
                                    class="text-reset">Update</a></button>
                            <button class="btn btn-danger delete-category"
                                data-url="/admin/categories/{{ $cate['id'] }}/delete">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        var deleteButtons = document.querySelectorAll('.delete-category');
    
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
