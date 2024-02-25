<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\ManageCarController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\User\FAQUserController;
use App\Http\Controllers\User\RecommentCarController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\WebboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'checkuser'])->group(function () {
    Route::get('/home_user', [UserHomeController::class, 'home_view'])->name('home_user');
    Route::get('/car-list', [UserHomeController::class, 'car_list'])->name('car-list');
    Route::post('/model_query', [UserHomeController::class, 'model_query'])->name('model_query');
    Route::post('/filter_car', [UserHomeController::class, 'filter_car'])->name('filter_car');
    Route::post('/increment_view_car', [UserHomeController::class, 'increment_view_car'])->name('increment_view_car');
    Route::post('/like_car', [UserHomeController::class, 'like_car'])->name('like_car');
    Route::get('/car_view/{id}', [UserHomeController::class, 'car_view'])->name('car_view');
    Route::post('/load_more_notify', [UserHomeController::class, 'load_more_notify'])->name('load_more_notify');
    Route::get('/car_mylike', [UserHomeController::class, 'car_mylike'])->name('car_mylike');
    Route::get('/car_list_make/{make}', [UserHomeController::class, 'car_list_make'])->name('car_list_make');

    Route::get('/read_notify_user', [NotifyController::class, 'read_notify_user'])->name('read_notify_user');

    Route::get('reccomment_view', [RecommentCarController::class, 'reccomment_view'])->name('reccomment_view');
    Route::post('reccoment_proccess', [RecommentCarController::class, 'reccoment_proccess'])->name('reccoment_proccess');
    Route::post('review_recomment', [RecommentCarController::class, 'review_recomment'])->name('review_recomment');
    Route::get('result_view/{category}', [RecommentCarController::class, 'result_view'])->name('result_view');
    Route::post('rec_filter_car', [RecommentCarController::class, 'rec_filter_car'])->name('rec_filter_car');
    Route::get('rec_car_view/{id}', [RecommentCarController::class, 'rec_car_view'])->name('rec_car_view');


    Route::prefix('faquser')->group(function () {
        Route::get('faq_view', [FAQUserController::class, 'faq_view'])->name('faq_view');
        Route::post('faq_post', [FAQUserController::class, 'faq_post'])->name('faq_post');
        Route::post('faq_read', [FAQUserController::class, 'faq_read'])->name('faq_read');
        Route::get('faq_in/{idLetter}', [FAQUserController::class, 'faq_in'])->name('faq_in');
        Route::post('faq_delete', [FAQUserController::class, 'faq_delete'])->name('faq_delete');
        Route::post('faq_reply_post', [FAQUserController::class, 'faq_reply_post'])->name('faq_reply_post');
    });
});

Route::middleware(['auth', 'checkadmin'])->group(function () {
    Route::get('/home_admin', [AdminHomeController::class, 'home_view'])->name('home_admin');
    Route::post('/load_more_noti_admin', [AdminHomeController::class, 'load_more_noti_admin'])->name('load_more_noti_admin');
    Route::get('/read_notify_admin', [NotifyController::class, 'read_notify_admin'])->name('read_notify_admin');

    Route::prefix('faqadmin')->group(function () {
        Route::get('faq_view_am', [FAQController::class, 'faq_view_am'])->name('faq_view_am');
        Route::post('faq_post_am', [FAQController::class, 'faq_post_am'])->name('faq_post_am');
        Route::post('faq_read_am', [FAQController::class, 'faq_read_am'])->name('faq_read_am');
        Route::get('faq_in_am/{idLetter}', [FAQController::class, 'faq_in_am'])->name('faq_in_am');
        Route::post('faq_delete_am', [FAQController::class, 'faq_delete_am'])->name('faq_delete_am');
        Route::post('faq_reply_post_am', [FAQController::class, 'faq_reply_post_am'])->name('faq_reply_post_am');
        Route::post('faq_post_admin', [FAQController::class, 'faq_post_admin'])->name('faq_post_admin');
    });

    Route::get('export_view', [ExportController::class, 'export_view'])->name('export_view');
    Route::get('export_get', [ExportController::class, 'export_get'])->name('export_get');
    Route::post('export_toexcel', [ExportController::class, 'export_toexcel'])->name('export_toexcel');

    Route::get('view_managecar', [ManageCarController::class, 'view_managecar'])->name('view_managecar');
    Route::post('add_car', [ManageCarController::class, 'add_car'])->name('add_car');
    Route::get('edit_car/{id}', [ManageCarController::class, 'edit_car'])->name('edit_car');
    Route::post('update_car/{id}', [ManageCarController::class, 'update_car'])->name('update_car');
    Route::get('force_delete_car/{id}', [ManageCarController::class, 'force_delete_car'])->name('force_delete_car');

    Route::get('view_manage_user', [ManageUserController::class, 'view_manage_user'])->name('view_manage_user');
    Route::post('add_user', [ManageUserController::class, 'add_user'])->name('add_user');
    Route::post('queryaddress', [ManageUserController::class, 'queryaddress'])->name('queryaddress');
    Route::get('force_delete_user/{id}', [ManageUserController::class, 'force_delete_user'])->name('force_delete_user');
    Route::get('edit_user/{id}', [ManageUserController::class, 'edit_user'])->name('edit_user');
    Route::post('/edit_profile_post_admin/{id}', [ManageUserController::class, 'edit_profile_post_admin'])->name('edit_profile_post_admin');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('webboard')->group(function () {
        Route::get('/webboard_view', [WebboardController::class, 'webboard_view'])->name('webboard_view');
        Route::post('/webborad_post', [WebboardController::class, 'webborad_post'])->name('webborad_post');
        Route::get('/webborad_in/{id}', [WebboardController::class, 'webboard_in'])->name('webborad_in');
        Route::post('/increment_post', [WebboardController::class, 'increment_post'])->name('increment_post');
        Route::post('/comment', [WebboardController::class, 'comment'])->name('comment');
        Route::post('/edit_comment', [WebboardController::class, 'edit_comment'])->name('edit_comment');
        Route::post('/delete_comment', [WebboardController::class, 'delete_comment'])->name('delete_comment');
        Route::post('/webboard_like', [WebboardController::class, 'webboard_like'])->name('webboard_like');
        Route::get('/webboard_my', [WebboardController::class, 'webboard_my'])->name('webboard_my');
        Route::post('/webboard_my_edit', [WebboardController::class, 'webboard_my_edit'])->name('webboard_my_edit');
        Route::get('/webboard_my_delete/{id_post}', [WebboardController::class, 'webboard_my_delete'])->name('webboard_my_delete');
        Route::get('/webboard_my_like', [WebboardController::class, 'webboard_my_like'])->name('webboard_my_like');
        Route::get('/webboard_my_comment', [WebboardController::class, 'webboard_my_comment'])->name('webboard_my_comment');
    });
    Route::get('/edit_profile_view', [EditProfileController::class, 'edit_profile_view'])->name('edit_profile_view');
    Route::post('/edit_profile_post/{id}', [EditProfileController::class, 'edit_profile_post'])->name('edit_profile_post');
    Route::post('/status_token', [TokenController::class, 'status_token'])->name('status_token');
    Route::get('/token_save', [TokenController::class, 'token_save'])->name('token_save');
});

// Auth
Route::get('/', [LoginController::class, 'login_view'])->name('login');
Route::post('/login_post', [LoginController::class, 'login_post'])->name('login_post');
Route::get('/register_view', [RegisterController::class, 'register_view'])->name('register_view');
Route::post('/register_post', [RegisterController::class, 'register_post'])->name('register_post');
Route::post('/register_pull_address', [RegisterController::class, 'register_pull_address'])->name('register_pull_address');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// Auth

// test
Route::get('test', [TestController::class, 'test'])->name('test');
