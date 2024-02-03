@extends('layout.main')
@section('title', 'Create User')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 profile-header">
            <h1>{{$user['name']}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="profile-picture">
                <img src="../../../{{$user['image']}}" class="img-fluid" alt="Profile Picture">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="profile-info">
                <h1>Thông tin cá nhân</h1>
                <p><strong>Họ tên:</strong>{{$user['name']}}</p>
                <p><strong>Email:</strong> {{$user['email']}}</p>
                <p><strong>Số điện thoại:</strong> {{$user['phone']}}</p>
                <p><strong>Địa chỉ:</strong>{{$user['address']}}</p>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f0f2f5;
    }

    .profile-header {
        background-color: #4267b2;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        margin: -75px auto 10px auto;
        border: 5px solid #fff;
    }

    .profile-info {
        background-color: #fff;
        padding: 20px;
        margin: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .profile-info p {
        font-size: 16px;
    }
</style>
@endsection
