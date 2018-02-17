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
// INIT
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/index/{id?}','CatalogListController@index')->name('listItem');
    Route::post('admin/home/role', 'RoleController@store')->name('admin/home/role/post');
    Route::get('edit/role/id/{user}', 'RoleController@index')->name('edit/role/id/');

    Route::group(['middleware' => ['role:Capturista_A_Reloaded']], function () {
/*
        Route::get('show/role/form/{id}', 'RoleController@showRoleNewForm')->name('show/role/form/');
        Route::post('admin/home/role/create', 'RoleController@create')->name('admin/home/role/create');
        Route::get('catalogos/{id}/{idItem}/{action}', 'Catalogos\CatalogosController@index')->name('catalogos/');
*/

        // Editoriales
        Route::get('/index_editorial/','Catalogos\EditorialController@index')->name('editorialIndex/');
        Route::post('/store_editorial','Catalogos\EditorialController@store')->name('editorialStore/');
        Route::post('/update_editorial','Catalogos\EditorialController@update')->name('editorialUpdate/');
        Route::get('/destroy_editorial/{id}/{idItem}/{action}', 'Catalogos\EditorialController@destroy')->name('editorialDestroy/');
/*
        // Lugares
        Route::post('/store_lugar','Catalogos\LugaresController@store');
        Route::post('/update_lugar','Catalogos\LugaresController@update');
        Route::get('/destroy_lugar/{id}/{idItem}/{action}', 'Catalogos\LugaresController@destroy')->name('destroy_lugar/');

        // Roles
        Route::post('/store_role','Catalogos\RolesController@store');
        Route::post('/update_role','Catalogos\RolesController@update');
        Route::get('/destroy_role/{id}/{idItem}/{action}', 'Catalogos\RolesController@destroy')->name('destroy_role/');
*/
    });

});
