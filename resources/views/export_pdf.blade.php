<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Текст для трека</title>
</head>
<style>
    body {
        font-family: 'DejaVu Serif', 'Roboto Slab', serif;
    }

    h2 {
        font-family: 'DejaVu Serif', 'Roboto Slab', serif;
    }

</style>
<body>
    <h2> Название: {{$data['Название']}}</h2>
    <div>
        <div><h5>Текст:</h5></div>
        <div>{!!$data['Текст']!!}</div>
    </div>
</body>
</html>