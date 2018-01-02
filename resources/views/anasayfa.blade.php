<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

</head>
<style>

    table, th, td {
        border: 1px solid black;
        width: 1000px;
    }

</style>
<body>

<td><form method="get" action="/ara">
        <input name="mytext" type="text">
        <input type="submit" value="Ara">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form></td>



<table><thead> <th>No</th><th>Ad</th><th>Soyad</th><th>Doğum Tarihi</th><th>Doğum Yeri</th><th>Departman</th><th colspan=2>Düzenle</th></thead>
    <tbody id="tbody"><tr>
        <td><input type=text name=sid id=1></td>
        <td><input type=text name=fname id=2></td>
        <td><input type=text name=lname id=3></td>
        <td><input type=text name=birthdate id=4></td>
        <td><input type=text name=birthplace id=5></td>
        <td><input type=text name=did id=6></td>
        <td colspan="2"><input type=button id="26" onclick='ekle()' value="Yeni Kayıt"></td>
    </tr>
@foreach($a as $row)
        <tr id ="29">
            <td id="7">{{$row['sid']}}</td>
            <td id="8">{{$row['fname']}}</td>
            <td id="9">{{$row['lname']}}</td>
            <td id="10">{{$row['birthdate']}}</td>
            <td id="11">{{$row['birthplace']}}</td>
            <td id="12">{{$row['did']}}</td>
            <td><button id="30" onclick="degistir('{{$row['sid']}}','{{$row['fname']}}','{{$row['lname']}}','{{$row['birthdate']}}','{{$row['birthplace']}}','{{$row['did']}}',this)">Güncelle</button></td>
            <td><button onclick="sil('{{$row['sid']}}',this)">Sil</button></td>
            <td><button onclick="yukaritasi(this)">Yukarı</button></td>
            <td><button onclick="asagitasi(this)">Aşağı</button></td>
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript">
var edit = false;
var eskidegerler = array();

    function degistir(sid,fname,lname,birthdate,birthplace,did,nesne){

        if(edit) {
            if (confirm('Yeni değişikliğe başamadan eski değişiklikleri saklamak istermisiniz')){
                guncelle(document.getElementById('28').parentNode.parentNode.childNodes[1].innerHTML,document.getElementById('28'));

            }
            else {
                var parent = document.getElementById('28').parentNode.parentNode;
                var child = parent.childNodes;
                eskiyedondur(child[3].firstChild.value,child[5].innerHTML,child[7].innerHTML,child[9].innerHTML,child[11].innerHTML,document.getElementById('28'));
                alert("eskiye döndü");
            }
        }
        edit = true;
        eskidegerler
        var parent = nesne.parentNode.parentNode;
        var parent2= nesne.parentNode;
        var buton = document.createElement("BUTTON");
        buton.innerHTML="Kaydet";
        buton.id ="28";
        var child = parent.childNodes;
        parent2.replaceChild(buton,nesne);
        child[3].innerHTML="<input type=text id='21' value='"+fname+"'>";
        child[5].innerHTML="<input type=text id='22' value='"+lname+"'>";
        child[7].innerHTML="<input type=text id='23' value='"+birthdate+"'>";
        child[9].innerHTML="<input type=text id='24' value='"+birthplace+"'>";
        child[11].innerHTML="<input type=text id='25' value='"+did+"'>";
        buton.onclick = function(){guncelle(sid,this)};

    }

    function guncelle(sid,buton){
       fname = document.getElementById('21').value;
       lname = document.getElementById('22').value;
       birthdate = document.getElementById('23').value;
       birthplace =  document.getElementById('24').value;
       did = document.getElementById('25').value;

        var td1 = document.getElementById('21').parentNode;
        var td2 = document.getElementById('22').parentNode;
        var td3 = document.getElementById('23').parentNode;
        var td4 = document.getElementById('24').parentNode;
        var td5 = document.getElementById('25').parentNode;
        td1.innerHTML = fname;
        td2.innerHTML = lname;
        td3.innerHTML = birthdate;
        td4.innerHTML = birthplace;
        td5.innerHTML = did;

        var x = new XMLHttpRequest(); // adim-1 nesne olustur
        x.onreadystatechange = function() { //adım-2: nesnenin onreadystatechange function'ı oluştur
            if (this.readyState == 4 && this.status == 200) {}
        };
        var tmp = "/guncelle/"+sid+"/"+fname+"/"+lname+"/"+birthdate+"/"+birthplace+"/"+did+"";
        x.open("GET", tmp, true); //adım-3: bağlantı ac
        x.send(); // adım-4: ajax isteği yap, (isteği gönder)
        //var parent = document.getElementById('28').parentNode;
        //parent.replaceChild(nesne,document.getElementById('28'));
        var parent = buton.parentNode;
        var buton2 = document.createElement("BUTTON");
        buton2.innerHTML = "Güncelle";
        parent.replaceChild(buton2,buton);
        buton2.onclick = function(){degistir(sid,fname,lname,birthdate,birthplace,did,this)};
        edit = false;
    }

    function sil(sid,nesne){
        var tr = nesne.parentNode.parentNode; //alert(tr.nodeName);
        var tbody = tr.parentNode; //alert(tbody.nodeName);
        tbody.removeChild(tr);
        ajaxSil(sid);
    }

    function ajaxSil(sid){
        var x = new XMLHttpRequest(); // adim-1 nesne olustur
        x.onreadystatechange = function() { //adım-2: nesnenin onreadystatechange function'ı oluştur
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        var tmp = "/sil/"+sid+"";
        x.open("GET", tmp, true); //adım-3: bağlantı ac
        x.send(); // adım-4: ajax isteği yap, (isteği gönder)
    }

    function ekle(){
        var sid = document.getElementById('1').value;
        var fname = document.getElementById('2').value;
        var lname = document.getElementById('3').value;
        var birthdate = document.getElementById('4').value;
        var birthplace = document.getElementById('5').value;
        var did = document.getElementById('6').value;

        var x = new XMLHttpRequest(); // adim-1 nesne olustur
        x.onreadystatechange = function() { //adım-2: nesnenin onreadystatechange function'ı oluştur
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        var tmp = "kaydet/"+sid+"/"+fname+"/"+lname+"/"+birthdate+"/"+birthplace+"/"+did+"";
        x.open("GET", tmp, true); //adım-3: bağlantı ac
        x.send(); // adım-4: ajax isteği yap, (isteği gönder)

        var tr  = document.createElement('TR');
        var td1 = document.createElement('TD'); td1.innerHTML = sid;
        var td2 = document.createElement('TD'); td2.innerHTML = fname;
        var td3 = document.createElement('TD'); td3.innerHTML = lname;
        var td4 = document.createElement('TD'); td4.innerHTML = birthdate;
        var td5 = document.createElement('TD'); td5.innerHTML = birthplace;
        var td6 = document.createElement('TD'); td6.innerHTML = did;
        var td7 = document.createElement('TD'); td7.innerHTML = "<input type=button value=Güncelle onclick='degistir("+sid+",this)'>";
        var td8 = document.createElement('TD'); td8.innerHTML = "<input type=button value=Sil onclick='sil("+sid+",this)'>";
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(td6);
        tr.appendChild(td7);
        tr.appendChild(td8);
        document.getElementById('tbody').appendChild(tr);

        document.getElementById('1').value='';
        document.getElementById('2').value='';
        document.getElementById('3').value='';
        document.getElementById('4').value='';
        document.getElementById('5').value='';
        document.getElementById('6').value='';
    }

    function eskiyedondur(fname,lname,birthdate,birthplace,did,buton){
        alert(lname);
        var parent = buton.parentNode.parentNode;
        var parent2= buton.parentNode;
        var buton2 = document.createElement("BUTTON");
        buton2.innerHTML="Güncelle";
        var child = parent.childNodes;
        parent2.replaceChild(buton2,buton);
        buton2.onclick = function(){degistir(sid,fname,lname,birthdate,birthplace,did,this)};
       /* child[3].innerHTML="<input type=text id='21' value='"+fname+"'>";
        child[5].innerHTML="<input type=text id='22' value='"+lname+"'>";
        child[7].innerHTML="<input type=text id='23' value='"+birthdate+"'>";
        child[9].innerHTML="<input type=text id='24' value='"+birthplace+"'>";
        child[11].innerHTML="<input type=text id='25' value='"+did+"'>";*/

    }

    function yukaritasi(nesne){
        var tr = nesne.parentNode.parentNode;
        var tbody = tr.parentNode;
        var uptr = tr.previousSibling.previousSibling;
        var downtr = tr.nextSibling.nextSibling;
        tbody.replaceChild(tr,uptr);
        tbody.insertBefore(uptr,downtr);

    }

function asagitasi(nesne){
    var tr = nesne.parentNode.parentNode;
    var tbody = tr.parentNode;
    var uptr = tr.previousSibling.previousSibling;
    var downtr = tr.nextSibling.nextSibling;
    tbody.replaceChild(tr,downtr);
    tbody.insertBefore(downtr,tr);
    tbody.re
}

</script>

</body>
</html>