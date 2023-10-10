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
Route::get('sejarah', [App\Http\Controllers\PageController::class, 'history'])->name('history');
Route::get('galeri', [App\Http\Controllers\PageController::class, 'gallery'])->name('gallery');
Route::get('berita', [App\Http\Controllers\PageController::class, 'news'])->name('news');
Route::get('berita/{slug}', [App\Http\Controllers\PageController::class, 'news_detail'])->name('news-detail');
Route::get('kegiatan', [App\Http\Controllers\PageController::class, 'activity'])->name('activity');
Route::get('kegiatan/{slug}', [App\Http\Controllers\PageController::class, 'activity_detail'])->name('activity-detail');
Route::get('silsilah', [App\Http\Controllers\PageController::class, 'family'])->name('family');
Route::get('silsilah/{slug}', [App\Http\Controllers\PageController::class, 'family_detail'])->name('family-detail');
Route::get('family-tree-data/{id}', [App\Http\Controllers\PageController::class, 'family_tree_data'])->name('family-tree-data');

Route::get('/tree', function () {
    return view('tree');
})->name('tree');

Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth'],
        'namespace' => '\App\Http\Controllers\Admin',
    ],
    function () {
        Route::group(['middleware' => ['check.family']], function () {
            Route::resource('user', UserController::class);
            Route::post('user/multiple-destroy', [App\Http\Controllers\Admin\UserController::class, 'multiple_destroy'])->name('user.multiple-destroy');

            Route::resource('general', GeneralController::class);

            Route::resource('history', HistoryController::class);
            Route::post('history/multiple-destroy', [App\Http\Controllers\Admin\HistoryController::class, 'multiple_destroy'])->name('history.multiple-destroy');
            Route::post('history/upload-image', [App\Http\Controllers\Admin\HistoryController::class, 'upload_image'])->name('history.upload-image');
            Route::post('history/delete-image', [App\Http\Controllers\Admin\HistoryController::class, 'delete_image'])->name('history.delete-image');

            Route::resource('page', PageController::class);

            Route::resource('section', SectionController::class);
        });
        Route::resource('home', HomeController::class);

        Route::resource('news', NewsController::class);
        Route::post('news/multiple-destroy', [App\Http\Controllers\Admin\NewsController::class, 'multiple_destroy'])->name('news.multiple-destroy');
        Route::post('news/upload-image', [App\Http\Controllers\Admin\NewsController::class, 'upload_image'])->name('news.upload-image');
        Route::post('news/delete-image', [App\Http\Controllers\Admin\NewsController::class, 'delete_image'])->name('news.delete-image');

        Route::resource('gallery', GalleryController::class);
        Route::post('gallery/multiple-destroy', [App\Http\Controllers\Admin\GalleryController::class, 'multiple_destroy'])->name('gallery.multiple-destroy');


        Route::resource('family', FamilyController::class);
        Route::post('family/multiple-destroy', [App\Http\Controllers\Admin\FamilyController::class, 'multiple_destroy'])->name('family.multiple-destroy');
        Route::post('family/upload-image', [App\Http\Controllers\Admin\FamilyController::class, 'upload_image'])->name('family.upload-image');
        Route::post('family/delete-image', [App\Http\Controllers\Admin\FamilyController::class, 'delete_image'])->name('family.delete-image');

        Route::resource('family-tree', FamilyTreeController::class);
    }
);

Route::group(
    [
        'as' => 'select.',
    ],
    function () {
        Route::post('gallery/select', [App\Http\Controllers\Admin\GalleryController::class, 'select'])->name('gallery.select');
        Route::post('family/select', [App\Http\Controllers\Admin\FamilyController::class, 'select'])->name('family.select');
        Route::post('family-tree/select', [App\Http\Controllers\Admin\FamilyTreeController::class, 'select'])->name('family-tree.select');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
