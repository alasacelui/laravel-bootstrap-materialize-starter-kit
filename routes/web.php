<?php

// Facades

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Shared Restful Controllers
use App\Http\Controllers\All\{
    ProfileController,
    TmpImageUploadController
};

// Admin Restful Controllers
use App\Http\Controllers\Admin\{
    DashboardController,
    ActivityLogController,
    CategoryController,
    UserController
};

// User Restful Controllers
use App\Http\Controllers\User\{
    DashboardController as UserDashboardController
};

Route::get('/', function () {
    return redirect(route('login'));
});


// Admin 
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    //Route::get('role', RoleController::class)->name('role.index');
    Route::resource('activity', ActivityLogController::class);
});


// User
Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'],function() {

    Route::resource('dashboard', UserDashboardController::class);

});


// Auth
Route::group(['middleware' => ['auth']],function() {
    // TMP FILE UPLOAD
    Route::delete('tmp_upload/revert', [TmpImageUploadController::class, 'revert']);
    Route::post('tmp_upload/content', [TmpImageUploadController::class, 'faqImageUpload'])->name('tmpupload.faqImageUpload');
    Route::resource('tmp_upload', TmpImageUploadController::class);
    Route::resource('profile', ProfileController::class)->parameter('profile', 'user');;
  
});



Auth::routes();

