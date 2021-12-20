@extends('layouts.layout')

@section('content')
    @if (session('succes'))
        <script>
            Swal.fire({
                title: '{{ session('title') }}',
                text: '{{ session('subtitle') }}',
                icon: '{{ session('alert') }}',
                confirmButtonText: '{{ session('button') }}',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        </script>
    @endif
    @auth

    @endauth
    @guest
        <a href="{{route('login.page')}}">Załóż darmowe konto już dziś!</a>
    @endguest



<div id="main-content" class="blog-page">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 left-box">
               @include('posts.post')
               {{ $posts->links() }}
            </div>
            @include('layouts.components.sidebar')
        </div>

    </div>

</div>
@endsection
