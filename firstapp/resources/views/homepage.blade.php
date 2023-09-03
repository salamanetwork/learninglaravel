<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome, This is the Home Page Redered by Blade Template!!!</h1>
    <a href="/about"> About Page</a>
    <br />
    <a href="/contact"> Contact Page</a>
    <br />
    <br />
    My Pets' List:
    <ul>
        @foreach($pets as $pet)
        <li>{{ $pet }}</li>
        @endforeach
    </ul>
    <br />
    {{ "Date: " . date('Y-m-d') }}
    <br />
    <h4>{{ "Created By: " . $name }}</h4>
</body>
</html>
