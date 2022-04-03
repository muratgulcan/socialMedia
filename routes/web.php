<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*Route::get('/login', function (){
    return view('auth.login');
})->name('login');
*/
/*Route::get('/login', [HomeController::class, 'login_page'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/', [HomeController::class, 'main'])->name('main');*/

Route::get('/register', [HomeController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [HomeController::class, 'login_page'])->name('login')->middleware('guest');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/', [HomeController::class, 'anasayfa'])->name('home');
Route::get('/settings', [HomeController::class, 'settings'])->name('settings')->middleware('auth');
Route::any('/search-users', [HomeController::class, 'searchUsers'])->name('searchUsers');
Route::get('/settings/profile', [HomeController::class, 'profileSettings'])->name('profileSettings')->middleware('auth');
Route::post('/settings/profile', [HomeController::class, 'profileSettingsPost'])->name('profileSettingsPost');
Route::post('/profile/photo', [HomeController::class, 'profilePhotoPost'])->name('profilePhotoPost');
Route::get('/icerik-olustur', [HomeController::class, 'icerik_olustur'])->name('icerik_olustur')->middleware('auth');
Route::get('/{username}/content/{id}/{link}', [HomeController::class, 'getIcerik'])->name('getIcerik');
Route::post('/icerik/olustur', [HomeController::class, 'icerik_olusturPost'])->name('icerik_olusturPost');
Route::post('/contentImage/olustur', [HomeController::class, 'contentImageUpload'])->name('contentImageUpload');
Route::post('/indexImageUpload/olustur', [HomeController::class, 'indexImageUpload'])->name('indexImageUpload');
Route::post('/indexImageUpload/olustur2', [HomeController::class, 'upload2'])->name('upload2');
Route::post('/icerik/sil/{id}', [HomeController::class, 'icerikDelete'])->name('icerikDelete');
Route::post('/icerik/comments', [HomeController::class, 'comments'])->name('comments');
Route::post('/icerik/comments/{id}', [HomeController::class, 'deleteComments'])->name('deleteComments');
Route::get('/kesfet' , [HomeController::class, 'kesfet'])->name('kesfet');
Route::get('/timeline' , [HomeController::class, 'timeline'])->name('timeline')->middleware('auth');
Route::get('/{username}/followers', [HomeController::class, 'followers'])->name('followers');
Route::get('/{username}/followings', [HomeController::class, 'followings'])->name('followings');
Route::get('/reset_password' , [HomeController::class, 'reset_password'])->name('reset_password');
Route::get('/password' , [HomeController::class, 'customPassword'])->name('customPassword')->middleware('auth');
Route::post('/password' , [HomeController::class, 'customPasswordPost'])->name('customPasswordPost');
Route::get('/follow/{id}' , [HomeController::class, 'follow'])->name('follow');
Route::get('/followSearch/{id}' , [HomeController::class, 'followSearch'])->name('followSearch');
Route::get('/unfollow/{id}' , [HomeController::class, 'unfollow'])->name('unfollow');
Route::get('/feedback' , [HomeController::class, 'feedback'])->name('feedback')->middleware('auth');
Route::get('/test/upload' , [HomeController::class, 'test2'])->name('image_crop.upload');
Route::post('/profilePhotoPost' , [HomeController::class, 'testPost'])->name('image_crop.upload');
Route::post('/feedback-post' , [HomeController::class, 'feedbackPost'])->name('feedbackPost');
Route::get('/like/{id}' , [HomeController::class, 'like'])->name('like');
Route::get('/unlike/{id}' , [HomeController::class, 'unlike'])->name('unlike');


Route::get('/{username}', [HomeController::class, 'getProfile'])->name('getProfile');





Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('design2.profile');
})->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/ayarlar', function () {
    return view('design2.settings');
})->name('settings');




