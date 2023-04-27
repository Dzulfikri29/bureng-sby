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
Route::get('profile', [App\Http\Controllers\PageController::class, 'profile'])->name('profile');
Route::get('structure', [App\Http\Controllers\PageController::class, 'structure'])->name('structure');

Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('product/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity');
Route::get('activity/{slug}', [App\Http\Controllers\ActivityController::class, 'show'])->name('activity.show');
Route::get('event', [App\Http\Controllers\ActivityController::class, 'event'])->name('activity.event');

Route::get('blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::resource('registration', App\Http\Controllers\RegistrationController::class);

Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth'],
        'namespace' => '\App\Http\Controllers\Admin',
    ],
    function () {
        Route::resource('home', HomeController::class);
        Route::get('user-types', [HomeController::class, 'user_types'])->name('home.user-types');

        Route::resource('user', UserController::class);
        Route::post('user/multiple-destroy', [App\Http\Controllers\Admin\UserController::class, 'multiple_destroy'])->name('user.multiple-destroy');

        Route::resource('general', GeneralController::class);

        Route::resource('structure', StructureController::class);
        Route::post('structure/multiple-destroy', [App\Http\Controllers\Admin\StructureController::class, 'multiple_destroy'])->name('structure.multiple-destroy');

        Route::resource('product-category', ProductCategoryController::class);
        Route::post('product-category/multiple-destroy', [App\Http\Controllers\Admin\ProductCategoryController::class, 'multiple_destroy'])->name('product-category.multiple-destroy');

        Route::resource('product', ProductController::class);
        Route::post('product/{id}/toggle', [App\Http\Controllers\Admin\ProductController::class, 'toggle'])->name('product.toggle');
        Route::post('product/multiple-destroy', [App\Http\Controllers\Admin\ProductController::class, 'multiple_destroy'])->name('product.multiple-destroy');

        Route::resource('product-image', ProductImageController::class);
        Route::post('product-image-delete', [App\Http\Controllers\Admin\ProductImageController::class, 'destroy']);

        Route::resource('blog-category', BlogCategoryController::class);
        Route::post('blog-category/multiple-destroy', [App\Http\Controllers\Admin\BlogCategoryController::class, 'multiple_destroy'])->name('blog-category.multiple-destroy');

        Route::resource('blog', BlogController::class);
        Route::post('blog/{id}/toggle', [App\Http\Controllers\Admin\BlogController::class, 'toggle'])->name('blog.toggle');
        Route::post('blog/multiple-destroy', [App\Http\Controllers\Admin\BlogController::class, 'multiple_destroy'])->name('blog.multiple-destroy');
        Route::post('blog/upload-image', [App\Http\Controllers\Admin\BlogController::class, 'upload_image'])->name('blog.upload-image');
        Route::post('blog/delete-image', [App\Http\Controllers\Admin\BlogController::class, 'delete_image'])->name('blog.delete-image');

        Route::resource('activity', ActivityController::class);
        Route::post('activity/{id}/toggle', [App\Http\Controllers\Admin\ActivityController::class, 'toggle'])->name('activity.toggle');
        Route::post('activity/multiple-destroy', [App\Http\Controllers\Admin\ActivityController::class, 'multiple_destroy'])->name('activity.multiple-destroy');
        Route::post('activity/upload-image', [App\Http\Controllers\Admin\ActivityController::class, 'upload_image'])->name('activity.upload-image');
        Route::post('activity/delete-image', [App\Http\Controllers\Admin\ActivityController::class, 'delete_image'])->name('activity.delete-image');

        Route::resource('training', TrainingController::class);
        Route::post('training/multiple-destroy', [App\Http\Controllers\Admin\TrainingController::class, 'multiple_destroy'])->name('training.multiple-destroy');
        Route::post('training/{id}/toggle', [App\Http\Controllers\Admin\TrainingController::class, 'toggle'])->name('training.toggle');

        Route::resource('page', PageController::class);

        Route::resource('section', SectionController::class);
        Route::resource('section-image', SectionImageController::class);
        Route::post('section-image-delete', [App\Http\Controllers\Admin\SectionImageController::class, 'destroy']);
    }
);

Route::group(
    [
        'as' => 'select.',
    ],
    function () {
        Route::post('blog-category/select', [App\Http\Controllers\Admin\BlogCategoryController::class, 'select'])->name('blog-category.select');
        Route::post('product-category/select', [App\Http\Controllers\Admin\ProductCategoryController::class, 'select'])->name('product-category.select');
        Route::post('structure/select', [App\Http\Controllers\Admin\StructureController::class, 'select'])->name('structure.select');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
