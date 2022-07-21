<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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

//Routes for 'static' pages
Route::middleware(['locale', 'start'])->group(function () {
    Route::get('/', [PagesController::class, 'index'])
    ->name('main');
    Route::get('/about', [PagesController::class, 'about'])
        ->name('about');
    Route::get('/tariffs', [PagesController::class, 'tariffs'])
        ->name('tariffs');
    Route::get('/partners', [PagesController::class, 'partners'])
        ->name('partners');
    Route::get('/news', [PagesController::class, 'news'])
        ->name('news');
    Route::get('/faq', [PagesController::class, 'faq'])
        ->name('faq');
    Route::get('/contacts', [PagesController::class, 'contacts'])
        ->name('contacts');
    Route::post('/contacts', [MailController::class, 'sendMessage'])
        ->name('mail');
    //------------------------

    Route::get('/feed/{id?}', [ProfileController::class, 'index'])
            ->middleware(['auth', 'verified'])
            ->name('profile');

    Route::post('/save-avatar', [ImageController::class, 'savePhoto'])
            ->middleware('auth')
            ->name('save.avatar');

    Route::get('/mail', function() {
        return view('mails.send-message', [
            'email' => 'fdsfsdf',
            'content' => 'fsdfsdf'
        ]);
    });
    Route::get('/last_login', [ProfileController::class, 'setLastLogin'])
    ->name('last_login');
    require __DIR__ . '/auth.php';
    require __DIR__ . '/payment.php';
    require __DIR__ . '/admin.php';
    Route::get('/set-locale/{locale?}', [PagesController::class, 'setLocale'])
        ->name('set-locale');
});




