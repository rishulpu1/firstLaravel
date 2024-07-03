<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Homepage</h1>
    <h3>Welcome {{ $name}}</h3>
    <p>Current Year: {{ Date::now()->year }}</p>
    <ul>
        @foreach($allUsers as $user)
        <li>{{ $user }}</li>
        @endforeach
    </ul>
    <a href="/about">About Page</a>
</body>
</html>