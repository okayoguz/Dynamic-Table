<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
<form method=get action=/sqlekle>
    id <input type=text name=no value=''><br>
    ad <input type=text name=ad value=''> <br>
    soyad <input type=text name=soyad value=''><br>
    dtarihi <input type=text name=dtarihi value=''><br>
    dyeri <input type=text name=dyeri value=''><br>
    deptid <input type=text name=deptid value=''><br>
    <input type="submit" value="Kaydet"><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
</table>
</body>
</html>