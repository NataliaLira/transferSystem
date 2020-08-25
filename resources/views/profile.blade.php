<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer Money</title>
</head>
<body>
<h1>Bem vindo(a) {{$name}}</h1>
@if(auth()->user()->type == 1)
<a href="/transferir"><button>Realizar Transferência</button></a> 
@endif
<div>
    <h1>Transferências Recebidas</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">Quando</th>
                <th scope="col">Valor</th>
                <th scope="col">De</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($received as $transfer)
            <tr>
                <td>{{$transfer->created_at}}</td>
                <td>{{$transfer->$value}}</td>
                <td>{{$transfer->from}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    <h1>Transferências Realizidas</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">Quando</th>
                <th scope="col">Valor</th>
                <th scope="col">Para</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sent as $transfer)
            <tr>
                <td>{{$transfer->created_at}}</td>
                <td>{{$transfer->$value}}</td>
                <td>{{$transfer->to}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>