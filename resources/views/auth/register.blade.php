<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>

<body>

    <div class="login-container">
        <form class="login-form" action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Register</h2>

            <!-- Error Messages -->
            <div class="error-messages">
                @foreach ($errors->get('name') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
                @foreach ($errors->get('email') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
                @foreach ($errors->get('password') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
                @foreach ($errors->get('password_confirmation') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
            </div>
            <!-- Name -->
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username">

            <!-- Password -->
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">

            <!-- Confirm Password -->
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">

            <!-- Error Messages -->
            <div class="error-messages">
                @foreach ($errors->get('name') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
                @foreach ($errors->get('email') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
                @foreach ($errors->get('password') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
                @foreach ($errors->get('password_confirmation') as $error)
                <p class="error">{{ $error }}</p>
                @endforeach
            </div>

            <!-- Register Button -->
            <button type="submit">Register</button>

            <!-- Link to Login -->
            <div class="login-link">
                <a href="{{ route('login') }}">Already registered?</a>
            </div>
        </form>
    </div>

</body>

</html>