<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Thank you for registering. Please verify your email address by clicking the link below:</p>
    <p>
        <a href="{{ url('/email/verify/' . $user->email_verification_token) }}" style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #2563eb; text-decoration: none; border-radius: 5px;">
            Verify Email Address
        </a>
    </p>
    <p>If you did not register, you can safely ignore this email.</p>
    <p>Thank you,<br>The Team</p>
</body>
</html>
