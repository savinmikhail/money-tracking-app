@extends('layout')

@section('content')
<div class="container">
    <h1>Sign up</h1>
    <form action="{{ route('signUp') }}" method="POST">
        @csrf

        <label>
            <input type="text" name="name" placeholder="Name" required />
        </label>

        <label>
            <input type="password" name="password" placeholder="Password" required />
        </label>

        <label>
            <input type="email" name="email" placeholder="Email" required />
        </label>

        <button type="submit" >Sign Up</button>
        <button onclick="location.href='http://localhost:81/signin'" class="btn btn-primary btn-block btn-large" type="button">Sign In</button>
    </form>
</div>
@endsection



