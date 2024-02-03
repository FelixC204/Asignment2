@include('layout.elements.head')
<div id="wrapper">
    @include('layout.elements.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('layout.elements.topbar')

            @yield('content')
    </div>
    @include('layout.elements.footer')
</div>
@include('layout.elements.script') 