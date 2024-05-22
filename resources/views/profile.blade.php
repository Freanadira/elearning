@php
    $nama = 'Frea';
    $role = 'Admin';
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($role == 'Admin')
        <h3>Selamat datang, {{$nama}}! Anda adalah seorang {{$role}}</h3>
    @else
        <h3>Selamat datang, {{$nama}}! Anda adalah seorang user</h3>
    @endif
</body>
</html>
