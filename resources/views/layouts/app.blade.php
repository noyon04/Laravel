<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-btween mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{route('home')}}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{route('uploadcsv')}}" class="p-3">Upload CSV</a>
            </li>
        </ul>
    </nav>


    @yield('content')
</body>
</html>