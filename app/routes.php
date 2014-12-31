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
    return View::make('articles', array('articles' => $articles));
});

Route::get('/grouped', function()
{
    $firstArticles = GroupedArticle::where('category', 'first')->sorted()->get();
    $secondArticles = GroupedArticle::where('category', 'second')->sorted()->get();
    return View::make('grouped_articles', array('firstArticles' => $firstArticles, 'secondArticles' => $secondArticles));
});


Route::post('sort', '\Rutorika\Sortable\SortableController@sort');