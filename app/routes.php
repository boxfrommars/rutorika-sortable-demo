<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $articles = Article::sorted()->get();
    return View::make('layout', array('articles' => $articles));
});


Route::post('sort', '\Rutorika\Sortable\SortableController@sort');