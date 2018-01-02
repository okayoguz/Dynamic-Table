<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get("/", "ders@cek");

Route::post("/formpost1","myform@method");

Route::get("/sil/{sid}", "ders@sil");

Route::post('/eklemeformu', function () {
    return view('eklemeformu');
});

Route::get("/sqlekle", "ders@ekle");

Route::post("/goster", "ders@goster");

Route::get("/sqlguncelle", "ders@guncelle");

Route::get("/ara", "ders@ara");

Route::get("/sayfayagit", "ders@git");

Route::get('/dersgoster/{row}', 'ders@dersgoster');

Route::get('/ogrgoster/{row}', 'ders@ogrgoster');

Route::get('/dersprogrami/{row}', 'ders@dersprogrami');

Route::get('/guncelle/{sid}/{fname}/{lname}/{birthdate}/{birthplace}/{did}', 'ders@guncelle');

Route::get('/kaydet/{sid}/{fname}/{lname}/{birthdate}/{birthplace}/{did}', 'ders@kaydet');
