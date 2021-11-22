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

// Route::get('/', function () {
//     return view('template.pages.main');
//     // return view('auth.login');
// });

Route::get('/', 'WebsiteController@index')->name('website.main');
Route::get('/detail/{id}', 'WebsiteController@detail')->name('website.detail');
Route::post('/contract', 'WebsiteController@contract')->name('website.contract');
Route::post('/comment', 'WebsiteController@storeComment')->name('website.comment');



Route::post('frontend-register', 'LoginController@storeRegister')->name('store.register');
Route::post('frontend-login', 'LoginController@postLogin')->name('post.login');
Route::get('frontend-logout', 'LoginController@getLogout')->name('get.logout');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/type-music', 'TypeMusicController@index')->name('typemusic.index');
Route::get('/type-music/create', 'TypeMusicController@create')->name('typemusic.create');
Route::post('/type-music/store', 'TypeMusicController@store')->name('typemusic.store');
Route::get('/type-music/edit/{id}', 'TypeMusicController@edit')->name('typemusic.edit');
Route::post('/type-music/update', 'TypeMusicController@update')->name('typemusic.update');
Route::get('/type-music/delete/{id}', 'TypeMusicController@delete')->name('typemusic.delete');

Route::group(['prefix' => 'music'], function() {
    Route::get('/','MusicController@index')->name('music.index');
    Route::get('/create','MusicController@create')->name('music.create');
    Route::post('/store','MusicController@store')->name('music.store');
    Route::get('/edit/{id}','MusicController@edit')->name('music.edit');
    Route::post('/update','MusicController@update')->name('music.update');
    Route::get('/delete-image/{id}','MusicController@deleteImage')->name('music.deleteImage');
    Route::get('/delete-embed/{id}','MusicController@deleteEmbed')->name('music.deleteEmbed');
    Route::get('/delete/{id}','MusicController@delete')->name('music.delete');

    Route::get('/image','MusicController@getImage')->name('music.image.index');
    Route::get('/image/create','MusicController@createImage')->name('music.image.create');
    Route::post('/image/store','MusicController@storeImage')->name('music.image.store');
    Route::get('/image/edit/{id}','MusicController@editImage')->name('music.image.edit');
    Route::post('/image/update','MusicController@updateImage')->name('music.image.update');
    Route::get('/image/delete/{id}','MusicController@deleteMusicImage')->name('music.image.delete');

});

Route::group(['prefix' => 'job'], function() {
    Route::get('/user','JobController@indexUser')->name('job.index.user');
    Route::get('/admin','JobController@indexBand')->name('job.index.band');
    Route::get('/admin/edit/{id}','JobController@editBand')->name('job.edit.band');
    Route::post('/admin/updateStatus','JobController@updateStatusBand')->name('job.updateStatus.band');

    // Route::get('/admin','JobController@indexBand')->name('job.index.band');
});

Route::get('/profile/edit/band/{id}', 'ProfileController@editBand')->name('profile.edit.band');
Route::get('/profile/edit/user/{id}', 'ProfileController@editUser')->name('profile.edit.user');

Route::post('/profile/update/band', 'ProfileController@updateBand')->name('profile.update.band');
Route::post('/profile/update/user', 'ProfileController@updateUser')->name('profile.update.user');










