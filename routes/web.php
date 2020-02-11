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

// * --- Index --- ***
Route::get('/','IndexController@postIndex');
Route::get('/post/{id}','IndexController@postShow')->name('mostrarpost');
Route::get('posts','IndexController@todosLosPost')->name('todpost');

Auth::routes();
// *** --- Dashboard --- ***
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/crear','PostsController@create')->name('crearpost');
Route::post('/lista-post','PostsController@store')->name('storepost');
Route::get('/lista-post','PostsController@index')->name('listpost');
Route::delete('/post/{id}','PostsController@destroy')->name('postdelete');
Route::get('/post/{post}/editar','PostsController@edit')->name('posteditar');
Route::put('/post/{post}','PostsController@update')->name('postupdate');
Route::get('/estadisticas','PostsController@estadisticas')->name('estadisticas');
Route::get('/lista-usuarios','UserController@index')->name('mostraruser')->middleware('checkRole');
Route::get('/editar-usuario/{user}','UserController@edit')->name('usereditar')->middleware('checkRole');
Route::put('/lista-usuarios/{user}','UserController@update')->name('userupdate')->middleware('checkRole');
Route::delete('/usuario/{id}','UserController@destroy')->name('userdelete')->middleware('checkRole');
Route::get('/crear-categoria','CategoriasController@create')->name('crearcateg')->middleware('checkRole');
Route::post('/crear-categoria','CategoriasController@store')->name('storecateg')->middleware('checkRole');
Route::get('/lista-categoria','CategoriasController@index')->name('mostrarcateg')->middleware('checkRole');
Route::get('/categoria/{id}','CategoriasController@edit')->name('editcateg')->middleware('checkRole');
Route::put('/lista-categoria/{id}','CategoriasController@update')->name('categupdate')->middleware('checkRole');

// *** --- Categorias --- ***
Route::get('/tecnologia','IndexCategorias@tecnologia')->name('cate.tecnologia');
Route::get('/cine','IndexCategorias@cine')->name('cate.cine');
Route::get('/gaming','IndexCategorias@juegos')->name('cate.juegos');
Route::get('/series','IndexCategorias@series')->name('cate.series');
Route::get('/anime','IndexCategorias@anime')->name('cate.anime');
Route::get('/comics','IndexCategorias@comics')->name('cate.comics');
Route::get('/review','IndexCategorias@reviews')->name('cate.reviews');


