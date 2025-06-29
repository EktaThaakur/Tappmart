<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with Floating Background Image</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>

<body>

    <div class="login-container">
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>