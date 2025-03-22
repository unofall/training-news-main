<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Models\Fashion;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/authregister', [LoginController::class, 'addregister']);
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/forgot', [LoginController::class, 'forgot']);


Route::middleware(['login:Admin'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'profile']);
    Route::get('/admin', [AdminController::class, 'showa']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    Route::get('/create', [BlogController::class, 'create']);
    Route::post('/add', [BlogController::class, 'add']);
    Route::get('/update/{id}', [BlogController::class, 'edit']);
    Route::post('/update/{id}', [BlogController::class, 'update']);
    Route::get('/delete/{id}', [BlogController::class, 'delete']);

    Route::get('/admin/drafts', [BlogController::class, 'drafts'])->name('admin.drafts');
    Route::get('/edit/{id}', [BlogController::class, 'editdrafts']);
    Route::put('/update/{id}', [BlogController::class, 'updateDrafts']);
    Route::post('/publish/{id}', [BlogController::class, 'publish'])->name('publish');
    Route::post('/updateStatus/{id}', [AdminController::class, 'updateStatus']);
    Route::get('/deleteDraft/{id}', [BlogController::class, 'deleteDraft']);


    // Route::get('/showadmin', [BlogController::class, 'index']);
    Route::get('/admin/category', [CategoryController::class, 'show']);
    Route::get('/createCategory', [CategoryController::class, 'create']);
    Route::get('/updateCategory/{id}', [CategoryController::class, 'update']);
    Route::post('/addCategory', [CategoryController::class, 'add']);
    Route::post('/updateCategory/{id}', [CategoryController::class, 'updated']);



});

Route::middleware(['login:User'])->group(function () {
    // Route::get('/show', [BlogController::class, 'index']);
    Route::get('/show', [UserController::class, 'show']);
    Route::get('/show', [BlogController::class, 'index']);
    Route::get('/detail/{id}', [BlogController::class, 'detail'])->middleware('update.blog.view.count');
    Route::get('/comment/{id}', [CommentController::class, 'comment']);
    Route::post('/addcomment/{id}', [CommentController::class, 'addcomment']);
    Route::post('/like/{id}', [BlogController::class, 'like'])->name('blog.like');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

});
Route::get('/profile', [BlogController::class, 'profil']);
Route::get('/logout', [LoginController::class, 'logout']);


// Route::get('/', function () {
//     return view('blog.show');
// });
