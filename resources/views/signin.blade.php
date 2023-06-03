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
    </form>
</div>

@endsection


