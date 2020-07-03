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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');

Route::get('projects/revisions/{project}', 'ProjectController@revisions')->name('projects.revisions');

Route::patch('projects/updateMPO/{project}', 'ProjectController@updateMPO')->name('projects.updateMPO');
Route::resource('/projects', 'ProjectController');

Route::resource('/bprojects', 'BProjectController');

Route::resource('agencies', 'AgencyController');

Route::get('projects/exportExcel/{project}','ProjectController@exportExcel')->name('project.excel'); 

// For demo purposes
Route::get('/records', function(){
    return view('projects.records', compact('project'));

});
Route::get('/recordsAdmin', function(){
    return view('projects.recordsAdmin', compact('project'));
  
});

Route::get('/commentsAdmin', function(){
    return view('comments.admin', compact('project'));
  
});
Route::get('/commentsAgency', function(){
    return view('comments.agency', compact('project'));
  
});

Route::get('/test', function(){
    return view('projects.nonAdminView', compact('project'));
  
});

Route::get('projects/editInfo/{project}', 'ProjectController@editInfo')->name('projects.editInfo');

//Route::get('projects/comments/{project}', 'ProjectController@show_Comment')->name('projects.project_comments');


// For demo purposes
Route::get('/map', function(){
    return view('projects.map');

});