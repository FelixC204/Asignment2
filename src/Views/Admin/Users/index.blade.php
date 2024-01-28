@extends('layout.main')
@section('title', 'User')    
@section('content')
<div class="container mt-5">
    <div class="add-btn">
        <button class="btn btn-success"><a class="text-reset" href="/admin/user/add">Add User</a></button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>John Doe</td>
          <td>johndoe@example.com</td>
          <td>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection