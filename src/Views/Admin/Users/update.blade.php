@extends('layout.main')
@section('title', 'Update User')
@section('content')
    <div class="container">
        <h2>@yield('title')</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}"
                    required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="">
            </div>

            <!-- Role (Select) -->
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select class="form-select form-control" id="role" name="role" required>
                    <option value="1" @if ($user['role'] == 1) selected @endif>Admin</option>
                    <option value="2" @if ($user['role'] == 2) selected @endif>User</option>
                </select>
            </div>

            <!-- Nút Submit -->
            <button type="submit" class="btn btn-primary ">@yield('title')</button>
        </form>
    </div>
@endsection
