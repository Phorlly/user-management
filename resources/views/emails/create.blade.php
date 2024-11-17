<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User Mail</title>
</head>

<body>
    <h2>Your account created, and below are the your details!</h2>
    <p><strong>Your Name: -</strong>{{ $details['name'] }}</p>
    <p><strong>Email Address: -</strong>{{ $details['email'] }}</p>
    <p><strong>Password: -</strong>{{ $details['password'] }}</p>

    <p>You can login with your account now!</p>
    <p><b>Thank You!</b></p>
</body>

</html>
