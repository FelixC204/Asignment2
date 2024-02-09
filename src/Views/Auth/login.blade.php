@extends('layout.master')
@section('title', 'Đăng Nhập')


@section('content')
<div class="fixed top-0 right-0 p-4 
  @if (empty($_SESSION['error'])) {
    hidden
  } @endif
">
  @if (!empty($_SESSION['error']))
      <div id="errorToast" class="toast h-25" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
          <div class="toast-header 
            @if (empty($_SESSION['error']['logout'])) {
              bg-danger
            } @else {
             bg-success
            }
            @endif
            text-white">
              <strong class="mr-auto">Hệ thống</strong>
              <small>Now</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="toast-body">
              @foreach ($_SESSION['error'] as $error)
                  {{ $error }}<br>
              @endforeach
          </div>
      </div>
  @endif
</div>
@php
if (!empty($_SESSION['error'])) {
    $_SESSION['error'] = null;
}
@endphp


    <div class="flex h-screen w-full items-center justify-center bg-[#800080]">

        <div class="w-[400px] rounded-lg bg-white p-8 text-center shadow-lg">
            <h1 class="mb-6 text-2xl font-bold">Login Form</h1>
            <form action="" method="post">
                <div class="mb-4">
                    <input
                        class="flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full rounded border px-3 py-2"
                        placeholder="Email" type="text" name="email" />
                </div>
                <div class="mb-8">
                    <input
                        class="flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full rounded border px-3 py-2"
                        placeholder="Password" type="password" name="password" />
                </div>
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 mb-4 w-full rounded bg-gradient-to-r from-red-500 to-yellow-500 py-2 text-white">
                    Login
                </button>
                <div>
                    <a class="text-sm text-gray-700" href="#">
                        Not a member? <span class="font-medium text-blue-600">Signup now</span>
                    </a>
                </div>
                <div>
                    <a class="text-sm text-gray-700" href="/">
                        You want return <span class="font-medium text-blue-600">Home</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
   
@endsection
