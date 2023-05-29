<head>
    <title>Authorization Page</title>
</head>
<body>
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
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        padding: 20px;
        width: 300px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    input[type="email"],
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>


