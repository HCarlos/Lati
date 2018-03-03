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

    Route::get('/index/{id}/','Catalogos\CatalogosListController@index')->name('listItem');
    Route::post('/catalogo/search/','Catalogos\CatalogosListController@indexSearch')->name('listItemSearch');
//    Route::post('admin/home/role', 'RoleController@store')->name('admin/home/role/post');
//    Route::get('edit/role/id/{user}', 'RoleController@index')->name('edit/role/id/');

    Route::group(['middleware' => ['role:user']], function () {

        Route::get('catalogos/{id}/{idItem}/{action}', 'Catalogos\CatalogosController@index')->name('catalogos/');
        Route::get('/catajax/{id}', 'Catalogos\CatalogosListController@ajaxIndex')->name('ajaxIndexCatList');

        /*
                Route::get('show/role/form/{id}', 'RoleController@showRoleNewForm')->name('show/role/form/');
                Route::post('admin/home/role/create', 'RoleController@create')->name('admin/home/role/create');
        */

        // Editoriales
        Route::post('/store_editorial','Catalogos\EditorialController@store')->name('editorialStore/');
        Route::put('/update_editorial/{edi}','Catalogos\EditorialController@update')->name('editorialUpdate/');
        Route::get('/destroy_editorial/{id}/{idItem}/{action}', 'Catalogos\EditorialController@destroy')->name('editorialDestroy/');

        // Fichas Bibliográficas
        Route::post('/store_ficha','Catalogos\FichaController@store')->name('fichaStore/');
        Route::put('/update_ficha/{oFicha}','Catalogos\FichaController@update')->name('fichaUpdate/');
        Route::get('/destroy_ficha/{id}/{idItem}/{action}', 'Catalogos\FichaController@destroy')->name('fichaDestroy/');


        /*
         *
         *
                // Lugares
                Route::post('/store_lugar','Catalogos\LugaresController@store');
                Route::post('/update_lugar','Catalogos\LugaresController@update');
                Route::get('/destroy_lugar/{id}/{idItem}/{action}', 'Catalogos\LugaresController@destroy')->name('destroy_lugar/');

        */
    });

    // Fichas Usuarios
    Route::post('/create_usuario','Catalogos\UsuarioController@create')->name('usuarioCreate/');
    Route::put('/update_usuario/{usr}','Catalogos\UsuarioController@update')->name('usuarioUpdate/');
    Route::get('/destroy_usuario/{id}/{idItem}/{action}', 'Catalogos\UsuarioController@destroy')->name('usuarioDestroy/');

    // Fichas Usuarios
    Route::post('/create_role','Catalogos\RoleController@create')->name('roleCreate/');
    Route::put('/update_role/{rol}','Catalogos\RoleController@update')->name('roleUpdate/');
    Route::get('/destroy_role/{id}/{idItem}/{action}', 'Catalogos\RoleController@destroy')->name('roleDestroy/');

    // Asignaciones
    Route::get('/list_left_config/{ida}/{iduser}/','Asignaciones\AsignacionListController@index')->name('asignItem/');
    Route::get('/asign_role_user/{idUser}/{nameRoles}/{cat_id}','Asignaciones\RoleUsuarioController@asignar')->name('assignRoleToUser/');
    Route::get('/unasign_role_user/{idUser}/{nameRoles}/{cat_id}','Asignaciones\RoleUsuarioController@desasignar')->name('unAssignRoleToUser/');

});
