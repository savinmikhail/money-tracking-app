@extends('layout')

@section('content')

<div class="container">
    <h1>Sign in</h1>
    <form action="{{ route('signIn') }}" method="POST">
        @csrf

        <label>
            <input type="password" name="password" placeholder="Password" required />
        </label>

        <label>
            <input type="email" name="email" placeholder="Email" required />
        </label>

        <button type="submit">Sign In</button>
        <button onclick="location.href='http://localhost:81/signin/google'" class="btn btn-primary btn-block btn-large" type="button">Sign In with Google</button>
{{--        <a href="/signin/google">Sign in with Google</a>--}}
    </form>
</div>

@endsection


