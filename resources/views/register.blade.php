@extends('layouts.layout')
@section('content')
<div class="containter">
    <form action="{{ route('reg.store') }}" method="POST">
        @method("POST")
        @csrf
        <h1 class="h3 mb-3 fw-normal">Zarejstruj sie</h1>
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
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="mail"
                placeholder="name@example.com" name="email">
            <label for="mail">Email address</label>
            @error('email')
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
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
                name="password_confirmation" placeholder="Password">
            <label for="pass2">Password Confirmation</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Zarejstruj się</button>
    </form>
</div>
@endsection
