@extends('layout.main')
@section('title', 'User')
@section('content')
    <div class="container mt-5">
        <div class="add-btn">
            <button class="btn btn-success"><a href="/admin/user/create"class="text-reset">Add User</a></button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                  <th scope="row">{{ $user['id'] }}</th>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ $user['email'] }}</td>
                  <td>
                    <div class="password-container">
                        <input type="password" class="password-display" value="{{ $user['password'] }}" disabled>
                        <button class="btn btn-sm btn-toggle-password" type="button">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </td>
                <td>{{ $user['role'] }}</td>
                  {{-- <td>{{ str_repeat('***', strlen($user['password'])) }} <button class=""><i class="fa-solid fa-eye"></i></button></i></td> --}}
                  <td>
                    <button class="btn btn-primary"><a href="/admin/user/{{ $user['id'] }}/update"
                            class="text-reset">Update</a></button>
                            <button class="btn btn-info"><a href="/admin/user/{{ $user['id'] }}/show"
                                class="text-reset">Show</a></button>
                    <button class="btn btn-danger delete-user"
                        data-url="/admin/user/{{ $user['id'] }}/delete">Delete</button>
                </td>
              </tr>
          @endforeach
            </tbody>
        </table>
    </div>

    <script>
        var deleteButtons = document.querySelectorAll('.delete-user');
    
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
