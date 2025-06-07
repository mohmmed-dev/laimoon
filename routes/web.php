<?php

use App\Events\Notifications;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticlesController as AdminArticlesController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\Admin\CoursesController as AdminCourses;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\admin\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\Payment\BuyingController;
use App\Http\Controllers\Payment\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}' , LanguageController::class)->name('lang');
Route::get('', [HomeController::class , 'home'])->name('home');
Route::get('articles', [HomeController::class , 'articles'])->name('articles');
Route::get('course/{course}', [CoursesController::class , 'show'])->name('course');
Route::get('article/{article}', [ArticlesController::class , 'show'])->name('article');
Route::get('lesson/{lesson}', [LessonsController::class , 'show'])->name('lesson');
Route::get('category/{category:slug}',  ControllersCategoryController::class)->name('category.list');

Route::get('mycourses', [CoursesController::class , 'myCourses'])->name('myCourses')->middleware('auth');

Route::name('admin.')->middleware(['auth','can:teacher'])->group(function () {
    Route::get('admin/dashboard',AdminController::class)->name('dashboard');
    Route::resource('admin/courses', AdminCourses::class);
    Route::resource('admin/articles', AdminArticlesController::class);
    Route::get('admin/courses/{course}/lessons', [AdminCourses::class,'lessons'])->name('courses.lessons');
    Route::get('admin/categories', CategoryController::class)->name('categories');
    Route::get('admin/users', [UsersController::class ,'users'])->name('users');
    Route::get('admin/subscribers', [UsersController::class ,'subscribers'])->name('subscribers');
    Route::get('admin/buyers', [UsersController::class ,'buyers'])->name('buyers');
    Route::get('admin/comments', CommentsController::class)->name('comments');
});

Route::name('payment.')->middleware('auth')->prefix('payment')->group(function() {
    Route::get('buying/coheckout/{course}', [BuyingController::class , 'checkout'])->name('buying.checkout');
    Route::get('buying/success', [BuyingController::class , 'success'])->name('buying.success');
    Route::get('buying/cancel', [BuyingController::class , 'cancel'])->name('buying.cancel');
    Route::get('subscription/coheckout/index', [SubscriptionController::class , 'index'])->name('subscription.index');
    Route::get('subscription/coheckout/{plan}', [SubscriptionController::class , 'subscript'])->name('subscription.checkout');
    Route::get('subscription/success', [SubscriptionController::class , 'success'])->name('subscription.success');
    Route::get('subscription/cancel', [SubscriptionController::class , 'cancel'])->name('subscription.cancel');
});

