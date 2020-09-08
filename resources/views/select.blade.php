<html>
<head><title>ポケモン選択</title></head>
<body>

@foreach(\App\Models\Pokemon::all() as $pokemon)
    <h1> {{$pokemon}}</h1>
@endforeach
</body>
</html>
