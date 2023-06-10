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
        <a href="/signin/github">Sign in with GitHub</a><br>
        <a href="/signin/google">Sign in with Google</a>
    </form>
</div>

@endsection


