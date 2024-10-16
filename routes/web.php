<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);




// Category routes
Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');

Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');


Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');

Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');





// SUBCategory routes
Route::get('/subcategory/index', [App\Http\Controllers\Admin\SubcategoryController::class, 'index'])->name('subcategory.index');

// Route::get('/subcategory/create', [App\Http\Controllers\Admin\SubcategoryController::class, 'create'])->name('subcategory.create');

Route::get('/subcategory/create', [App\Http\Controllers\Admin\SubcategoryController::class, 'create'])->name('subcategory.create');


Route::post('/subcategory/store', [App\Http\Controllers\Admin\SubcategoryController::class, 'store'])->name('subcategory.store');


Route::get('/subcategory/edit/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'edit'])->name('subcategory.edit');
Route::get('/subcategory/delete/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'destroy'])->name('subcategory.delete');

Route::post('/subcategory/update/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'update'])->name('subcategory.update');




//Post routes

Route::get('/post/index', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('post.create');
Route::get('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('post.delete');
// Route::get('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('post.delete');

Route::post('/post/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('post.update');
Route::get('/post/show/{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('post.show');







//Student CRUD Operations

Route::resource('students',StudentController::class);
















//Class CRUD routes


// Show all classes
Route::get('/class', [App\Http\Controllers\Admin\ClassController::class, 'index'])->name('class');

// Show create form
Route::get('/create', [App\Http\Controllers\Admin\ClassController::class, 'create'])->name('create');

// Store a new class
Route::post('/store', [App\Http\Controllers\Admin\ClassController::class, 'store'])->name('store');

// Show the edit form for a specific class
Route::get('/edit/{id}', [App\Http\Controllers\Admin\ClassController::class, 'edit'])->name('class.edit');

// Update a specific class (PUT method)
Route::put('/class/update/{id}', [App\Http\Controllers\Admin\ClassController::class, 'update'])->name('class.update');

// Delete a specific class
Route::get('/delete/{id}', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('delete');

// Route::delete('/delete', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('delete');








































//Auth routes er majhe sob thakbe login register
Auth::routes(['register'=>false]);
// Auth::routes();

//Email verification request route


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Verification notice

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


//Resend email route
Route::post('/verification/resend',[App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Hashing route

Route::post('/hashing/store', [App\Http\Controllers\HomeController::class, 'hashing'])->name('hashing.store');
Route::get('/details/{id}', [App\Http\Controllers\HomeController::class, 'detailss'])->name('details');


Route::get('/deposit/money', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit.money')->middleware('verified');

// Route to display the change password form (GET)
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'passchange'])->name('password.change')->middleware('verified');

// Route to handle password change submission (POST)
Route::post('/update/pass', [App\Http\Controllers\HomeController::class, 'updatepass'])->name('update.pass')->middleware('verified');
