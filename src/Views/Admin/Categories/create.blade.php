@extends('layout.main')
@section('title', 'Thêm Danh mục')    
@section('content')
<div class="container mt-3">
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên danh mục" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection