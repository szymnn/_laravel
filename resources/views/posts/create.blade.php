@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <form action="{{ route('post.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="project-info-box">
                    <p><b>Title:</b><input type="text" placeholder="Tytul" name="title"/></p>
                    <p><b>Author:</b> {{auth()->user()->name}}</p>
                </div><!-- / project-info-box -->

                <div class="project-info-box mt-0">
                    <h5>OPIS </h5>
                    <textarea class="mb-0" style="width:100%; height:300px;" name="content"></textarea>
                </div><!-- / project-info-box -->
            
            
        </div><!-- / column -->

        <div class="col-md-7">
            <img src="https://via.placeholder.com/400x300/FFB6C1/000000" alt="project-image" class="rounded">
            <div class="project-info-box">
                <input type="submit" placeholder="WYSLIJ" class="btn btn-primary d-block"/>
            </div><!-- / project-info-box -->
        </div><!-- / column -->
    </form>
    </div>
</div>
@endsection