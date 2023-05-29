
<div class="login">
    <h1>Sign in</h1>
    <?php if(isset($validationErrors['Auth'])){
        echo $validationErrors['Auth'];
    }; ?>
    <form action="{{ route('signUp') }}" method="POST">
        @csrf
        <label>
            <?php if (isset($validationErrors['Login'])) {
                echo $validationErrors['Login'];
            }?>
            <input type="text" name="name" placeholder="Name" required />
        </label>
        <label>
            <?php if (isset($validationErrors['Password'])) {
                echo $validationErrors['Password'];
            }?>
            <input type="password" name="password" placeholder="Password" required />
        </label>
        <label>

            <input type="email" name="email" placeholder="Email" required />
        </label>
        <button type="submit" class="btn btn-primary btn-block btn-large">Sign In</button>
        <button onclick="location.href='http://localhost:81/signup'" class="btn btn-primary btn-block btn-large" type="button">Sign Up</button>
    </form>
</div>
<link rel="stylesheet" href="../css/entrance.css">
