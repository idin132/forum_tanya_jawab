<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Register</title>

    <link rel="stylesheet" href="{{asset('css/register.css')}}">

</head>

<body>
    <div class="container">
        <div class="form">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register.store')}}">
                @csrf
                <div class="inputBox">
                    <input type="text" id="name" class="" name="name" required>
                    <label>Nama</label>
                </div>
                <div class="inputBox">
                    <input type="text" id="username" class="" name="username" required>
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="email" id="email" class="" name="email" required>
                    <label>Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" id="password" class="" name="password" required>
                    <label>Password</label>
                </div>
                <h5>Sudah punya akun ?</h5>
                <div class="links">
                    <a href="{{ route('login')}}">Login</a>
                </div>
                <!-- <div class="inputBox">
                    <input type="password" id="password_confirmation" class="" name="password_confirmation" required>
                    <label>Confirm Password</label>
                </div> -->
                <div class="inputBox">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</body>

</html>