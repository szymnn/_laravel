<div class="cointainer">
    @foreach ($posts as $value)
        <div class="card single_post">
            <div class="body">
                @if (isset($value->image))
                    <div class="img-post">
                        <img class="d-block img-fluid" src="{{ $value->image }}" alt="First slide">
                    </div>
                @endif
                <div class="container" style="display: flex">
                    <div class="col-lg-7 col-md-7 left-box">
                        <p>#<b>{{ $value->id }}</b></p>
                    </div>
                    <div class="col-lg-5 col-md-5 right-box">
                        <p><b>{{ $value->created_at }}</b></p>
                    </div>
                </div>
                <h3><a href="blog-details.html">{{ $value->title }}</a></h3>
                <p>{{ $value->content }}</p>
                <br>
                <p>Autor <b>{{ $value->author }}</b></p>
            </div>
            <div class="footer">
                <div class="actions">
                    <a href="{{route('post.show', $value->id)}}" class="btn btn-outline-secondary">Continue Reading</a>
                </div>
                <ul class="stats">
                    <li><a href="javascript:void(0);">General</a></li>
                    <li><a href="javascript:void(0);" class="fa fa-heart">28</a></li>
                    <li><a href="javascript:void(0);" class="fa fa-comment">128</a></li>
                </ul>
            </div>
        </div>
    @endforeach
</div>