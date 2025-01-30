<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with Floating Background Image</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>

<body>

    <div class="login-container m-2">
        <form class="login-form" action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Register</h2>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>


            <button type="submit">Register</button>
        </form>
    </div>

</body>

</html>