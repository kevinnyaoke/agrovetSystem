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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/userhome', 'HomeController@userhome')->name('userhome');
Route::post('/myphoto','HomeController@loadpic')->name('loadpic');
Route::get('/tobuy','CustomController@tobuy')->name('tobuy');
Route::post('/purchase','CustomController@purchase')->name('purchase');
Route::get('/orders','CustomController@orders')->name('orders');
Route::get('/stock','CustomController@stock')->name('stock');
Route::post('/addstock','CustomController@addstock')->name('addstock');
Route::get('/update','CustomController@update')->name('update');
Route::post('/postupdate','CustomController@postupdate')->name('postupdate');
Route::get('/items','CustomController@items')->name('items');
Route::get('/history','CustomController@history')->name('history');
Route::get('/userupdate','CustomController@viewupdate')->name('userupdate');
Route::get('/adminstock','CustomController@adminstock')->name('adminstock');
Route::post('/updatestock','CustomController@updatestock')->name('updatestock');
Route::get('/viewupdate','CustomController@adminupdate')->name('viewupdate');
Route::post('/updateup','CustomController@updateup')->name('updateup');
Route::post('/pupdate','CustomController@pupdate')->name('pupdate');

Route::group(['middlewere'=>'auth'], function(){
Route::get('/dashboard','CustomController@dashboard')->name('dashboard');

});



Route::post('login/custom',[
    'uses'=>'CustomController@login',
    'as'=>'login.custom',
]);

Route::get('delete/{id}',[
    'uses'=>'CustomController@delete',
    'as'=>'delete',
]);
Route::get('delstock/{id}',[
    'uses'=>'CustomController@delstock',
    'as'=>'delstock',
]);
Route::get('delupdate/{id}',[
    'uses'=>'CustomController@delupdate',
    'as'=>'delupdate',
]);
Route::get('delorder/{id}',[
    'uses'=>'CustomController@delorder',
    'as'=>'delorder',
]);
Route::get('/editstock/{id}',[
    'uses'=>'CustomController@editstock',
    'as'=>'editstock',
]);
Route::get('/editupdate/{id}',[
    'uses'=>'CustomController@editupdate',
    'as'=>'editupdate',
]);
Route::get('/editorder/{id}',[
    'uses'=>'CustomController@editorder',
    'as'=>'editorder',
]);
// Route::get('purchase/{id}',[
//     'uses'=>'CustomController@purchase',
//     'as'=>'purchase',
// ]);

 


