@extends('layout.main')
@section('title', 'Cập nhật Danh mục')
@section('content')
    <div class="container mt-3">
       
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="hidden" name="id">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                    value="{{ $catgories['name'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
