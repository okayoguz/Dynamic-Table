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
<table>

@foreach($a as $row)
    <tr>
        <td>{{$row->sid}}</td>
        <td>{{$row->cid}}</td>
        <td>{{$row->title}}</td>
        <td>{{$row->description}}</td>
        <td>{{$row->credits}}</td>
        <td>{{$row->did}}</td>
    </tr>
    @endforeach
</table>
</body>
</html>