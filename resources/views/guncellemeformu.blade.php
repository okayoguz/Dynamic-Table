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
@foreach($a as $row)
    <form method=get action=/sqlguncelle>
        ad <input type=text name=ad value='<?php echo $row['fname'];?>'> <br>
        soyad <input type=text name=soyad value='<?php echo $row['lname'];?>'><br>
        dTarihi <input type=text name=dtarihi value='<?php echo $row['birthdate'];?>'><br>
        dYeri <input type=text name=dyeri value='<?php echo $row['birthplace'];?>'><br>
        did <input type=text name=deptid value='<?php echo $row['did'];?>'><br>

        <input type=submit value="Gönder"><br>
        <input type=hidden name=no value=' <?php echo $row['sid']; ?>' >
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
    @endforeach

</body>
</html>