@extends('layouts.layout')
@section('content')
    <div id="main-content" class="blog-page">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    <div class="card single_post">
                        <div class="body">
                            @if(isset($post->image))
                            <div class="img-post">
                                <img class="d-block img-fluid" src="{{$post->image}}"
                                    alt="First slide">
                            </div>
                            @endif
                                <div class="container" style="display: flex">
                                    <div class="col-lg-7 col-md-7 left-box"> <p>#<b>{{$post->id}}</b></p></div>
                                    <div class="col-lg-5 col-md-5 right-box"><p><b>{{$post->created_at}}</b></p></div>
                                </div>
                            
                            <h3><a href="blog-details.html">{{$post->title}}</a></h3>
                            <p>{{$post->content}}</p>
                            <br><p>Autor <b>{{$post->author}}</b></p>
                            @if($post->created_at != $post->updated_at)
                            <br><p>Ostatnia data modyfikacji <b>{{$post->updated_at}}</b></p>
                            @endif
                        </div>
                    </div>
                    
                </div>

                    @include('layouts.components.sidebar')

            </div>

        </div>
    </div>
@endsection
