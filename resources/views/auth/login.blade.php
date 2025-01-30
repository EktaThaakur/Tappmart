<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>

<body>

    <div class="login-container">
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>

            <!-- Email Address -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <!-- Password -->
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <!-- Error Messages (Optional) -->
            @foreach ($errors->get('email') as $error)
            <p class="error">{{ $error }}</p>
            @endforeach
            @foreach ($errors->get('password') as $error)
            <p class="error">{{ $error }}</p>
            @endforeach

            <!-- Submit Button -->
            <button type="submit">Login</button>
            <div class="social-login">
                <a href="{{ url('auth/google') }}" class="btn btn-danger">
                    <i class="fab fa-google"></i> Login with Google
                </a>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
            <div class="forgot-password">
                <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
            @endif
            <div class="login-link">
                <a href="{{ route('register') }}">Not registered yet?</a>
            </div>
        </form>
    </div>

</body>

</html>