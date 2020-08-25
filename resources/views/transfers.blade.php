<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/api/transfers" method="POST">
        <label for="to">Para:</label>
        <select name="to" id="to">
            <option value="" selected disabled>escolher usuário</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button>Transferir</button>
    </form>
</body>

</html>
