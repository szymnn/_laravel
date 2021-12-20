@extends('layouts.layout')
@section('content')

@if(session('alert'))
    <script>
        Swal.fire({
        title: '{{session('title')}}',
        text:  '{{session('subtitle')}}',
        icon:  '{{session('alert')}}',
        confirmButtonText: '{{session('button')}}'
        })
    </script>
@endif
    <div class="container">
        <form action="{{ route('login.log') }}" method="POST">
            @method("POST")
            @csrf
            <h1 class="h3 mb-3 fw-normal">Zaloguj się</h1>
            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nick" placeholder="Nick"
                    name="name">
                <label for="nick">Nick</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="pass"
                    placeholder="Password" name="password">
                <label for="pass">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Zaloguj sie</button>
        </form>
    </div>


@endsection
