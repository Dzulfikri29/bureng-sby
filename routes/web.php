<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/tree', function () {
    return view('tree');
})->name('tree');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth'],
        'namespace' => '\App\Http\Controllers\Admin',
    ],
    function () {
        Route::resource('home', HomeController::class);

        Route::resource('user', UserController::class);
        Route::post('user/multiple-destroy', [App\Http\Controllers\Admin\UserController::class, 'multiple_destroy'])->name('user.multiple-destroy');

        Route::resource('general', GeneralController::class);

        Route::resource('news', NewsController::class);
        Route::post('news/multiple-destroy', [App\Http\Controllers\Admin\NewsController::class, 'multiple_destroy'])->name('news.multiple-destroy');
        Route::post('news/upload-image', [App\Http\Controllers\Admin\NewsController::class, 'upload_image'])->name('news.upload-image');
        Route::post('news/delete-image', [App\Http\Controllers\Admin\NewsController::class, 'delete_image'])->name('news.delete-image');

        Route::resource('gallery', GalleryController::class);
        Route::post('gallery/multiple-destroy', [App\Http\Controllers\Admin\GalleryController::class, 'multiple_destroy'])->name('gallery.multiple-destroy');

        Route::resource('history', HistoryController::class);
        Route::post('history/multiple-destroy', [App\Http\Controllers\Admin\HistoryController::class, 'multiple_destroy'])->name('history.multiple-destroy');
        Route::post('history/upload-image', [App\Http\Controllers\Admin\HistoryController::class, 'upload_image'])->name('history.upload-image');
        Route::post('history/delete-image', [App\Http\Controllers\Admin\HistoryController::class, 'delete_image'])->name('history.delete-image');
    }
);

Route::group(
    [
        'as' => 'select.',
    ],
    function () {
        Route::post('gallery/select', [App\Http\Controllers\Admin\GalleryController::class, 'select'])->name('blog-category.select');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
