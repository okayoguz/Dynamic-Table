<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

    table, th, td {
        border: 1px solid black;
        width: 1000px;
        text-align:center;
    }

</style>
<body>


@foreach($a as $row)
<table><tr>
        <td><a href="/dersgoster/{{$row['sid']}}">Derslerim</a></td>
        <td><a href="/dersprogrami/{{$row['sid']}}">Ders Programim</a></td>
        <td><a href="/ogrgoster/{{$row['sid']}}">Bilgilerimi Goster</a></td>
        <td><a href='?islem=cikis'>Çıkış</a></td>


    </tr></table>
    @endforeach
</body>
</html>

