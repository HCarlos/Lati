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

By @DevCH

*/

Route::get('/', function () {
    return view('welcome');
});
// INIT
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/storage/{root}/{archivo}', 'Funciones\FuncionesController@showFile')->name('callFile/');

Route::group(['middleware' => 'auth'], function () {

    Route::get('edit', 'Auth\EditUserDataController@showEditUserData')->name('edit');
    Route::put('Edit', 'Auth\EditUserDataController@update')->name('Edit');

    Route::get('/index/{id}/','Catalogos\CatalogosListController@index')->name('listItem');
    Route::post('/catalogo/search/','Catalogos\CatalogosListController@indexSearch')->name('listItemSearch');

    Route::group(['middleware' => ['role:user']], function () {

        Route::get('catalogos/{id}/{idItem}/{action}', 'Catalogos\CatalogosController@index')->name('catalogos/');
        Route::get('catalogos/ficha-clone/{id}/{idItem}/{action}', 'Catalogos\CatalogosController@clone')->name('catalogosFichasClone/');
        Route::get('catalogos/subir-imagen-ficha/{id}/{idItem}/{action}', 'Catalogos\CatalogosController@subirImagen')->name('catalogosSubirImagenFichas/');

//        Route::get('/catajax/{id}', 'Catalogos\CatalogosListController@ajaxIndex')->name('ajaxIndexCatList');

        // Editoriales
        Route::post('/store_editorial','Catalogos\EditorialController@store')->name('editorialStore/');
        Route::put('/update_editorial/{edi}','Catalogos\EditorialController@update')->name('editorialUpdate/');
        Route::get('/destroy_editorial/{id}/{idItem}/{action}', 'Catalogos\EditorialController@destroy')->name('editorialDestroy/');

        // Fichas Bibliográficas
        Route::post('/store_ficha','Catalogos\FichaController@store')->name('fichaStore/');
        Route::put('/update_ficha/{oFicha}','Catalogos\FichaController@update')->name('fichaUpdate/');
        Route::get('/destroy_ficha/{id}/{idItem}/{action}', 'Catalogos\FichaController@destroy')->name('fichaDestroy/');
        Route::put('/clone_ficha/{oFicha}','Catalogos\FichaController@clone')->name('fichaClone/');
        Route::post('/subir_imagen_ficha/{oFicha}','Storage\StorageFichaController@subirArchivoFicha')->name('storageFichaUpload/');
        Route::get('/quitar_imagen_ficha/{cat_id}/{idItem}/{action}/{idFF}','Storage\StorageFichaController@quitarArchivoFicha')->name('storageFichaRemove/');

        // Codigo de Lenguaje de Paises
        Route::post('/store_clp','Catalogos\CodigoLenguajePaisController@store')->name('clpStore/');
        Route::put('/update_clp/{clp}','Catalogos\CodigoLenguajePaisController@update')->name('clpUpdate/');
        Route::get('/destroy_clp/{id}/{idItem}/{action}', 'Catalogos\CodigoLenguajePaisController@destroy')->name('clpDestroy/');


    });

    // Fichas Usuarios
    Route::post('/create_usuario','Catalogos\UsuarioController@create')->name('usuarioCreate/');
    Route::put('/update_usuario/{usr}','Catalogos\UsuarioController@update')->name('usuarioUpdate/');
    Route::get('/destroy_usuario/{id}/{idItem}/{action}', 'Catalogos\UsuarioController@destroy')->name('usuarioDestroy/');

    // Fichas Roles
    Route::post('/create_role','Catalogos\RoleController@create')->name('roleCreate/');
    Route::put('/update_role/{rol}','Catalogos\RoleController@update')->name('roleUpdate/');
    Route::get('/destroy_role/{id}/{idItem}/{action}', 'Catalogos\RoleController@destroy')->name('roleDestroy/');

    // Fichas Permissions
    Route::post('/create_permission','Catalogos\PermissionController@create')->name('permissionCreate/');
    Route::put('/update_permission/{perm}','Catalogos\PermissionController@update')->name('permissionUpdate/');
    Route::get('/destroy_permission/{id}/{idItem}/{action}', 'Catalogos\PermissionController@destroy')->name('permissionDestroy/');

    // Asignaciones Roles -> Usuarios
    Route::get('/list_left_config/{ida}/{iduser}/','Asignaciones\AsignacionListController@index')->name('asignItem/');
    Route::get('/asign_role_user/{idUser}/{nameRoles}/{cat_id}','Asignaciones\RoleUsuarioController@asignar')->name('assignRoleToUser/');
    Route::get('/unasign_role_user/{idUser}/{nameRoles}/{cat_id}','Asignaciones\RoleUsuarioController@desasignar')->name('unAssignRoleToUser/');

    // Asignaciones Permissions -> Roles
    Route::get('/asign_permission_role/{idRole}/{namePermissions}/{cat_id}','Asignaciones\PermisoRoleController@asignar')->name('assignPermissionToRole/');
    Route::get('/unasign_permission_role/{idRole}/{namePermissions}/{cat_id}','Asignaciones\PermisoRoleController@desasignar')->name('unAssignPermissionToRole/');



});
