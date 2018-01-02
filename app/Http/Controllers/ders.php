<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use DB;

class ders extends Controller
{
    function cek(){

       $a=student::get();
        return View("anasayfa",compact("a"));

    }

    function sil($sid){
        student::where(["sid"=>$sid])->delete();

    }

    function ekle(Request $request){
        $y= $request->input("no");
        $b= $request->input("ad");
        $c= $request->input("soyad");
        $d= $request->input("dtarihi");
        $x= $request->input("dyeri");
        $f= $request->input("deptid");
       student::insert(["sid"=>$y,"fname"=>"$b","lname"=>"$c","birthdate"=>"$d","birthplace"=>"$x","did"=>$f]);


        $a=student::get();
        return View("anasayfa",compact("a"));

    }

    function kaydet($sid,$fname,$lname,$birthdate,$birthplace,$did){
        student::insert(["sid"=>$sid,"fname"=>"$fname","lname"=>"$lname","birthdate"=>"$birthdate","birthplace"=>"$birthplace","did"=>$did,"password"=>NULL]);

    }

    function goster(Request $request){
         $b=$request->input("id");
        $a=student::where(["sid"=>$b])->get();
        return View("guncellemeformu",compact("a"));

    }

    function guncelle($sid,$fname,$lname,$birthdate,$birthplace,$did){
        student::where(["sid"=>$sid])->update(["fname"=>"$fname","lname"=>"$lname","birthdate"=>"$birthdate","birthplace"=>"$birthplace","did"=>$did]);

    }

    function ara(Request $request){
        $b=$request->input("mytext");
        $a=student::where ('fname', 'like', "$b%")->get();
        return View("anasayfa",compact("a"));

    }

    function git(Request $request){
        $b=$request->input("id");
        $a=student::where(["sid"=>$b])->get();
        return View("ogrsayfa",compact("a"));

    }
    function dersgoster($sid){
        $a=DB::select('SELECT take.sid,course.cid, course.title, course.description, course.credits,course.did FROM take, course WHERE take.cid=course.cid AND take.sid=:sid',['sid'=>$sid]);

        return View("dersgoster",compact("a"));
    }

    function ogrgoster($sid){
        $a=student::where(["sid"=>$sid])->get();

        return View("anasayfa",compact("a"));
    }

    function dersprogrami($sid){
        $a=DB::select('SELECT * FROM course c, take t, schedule s, room r WHERE t.cid=s.cid AND r.rid=s.rid AND t.cid=c.cid AND t.sid=:sid',['sid'=>$sid]);
        return View("programigoster",compact("a"));
    }


}