<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\service_provider_middleware;

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

Route::name('admin.')->prefix('admin/')->controller(adminController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/admin_login', 'admin_login')->name('admin_login');
    Route::get('/reset_password', 'reset_password')->name('reset-password-page');
    Route::post('/reset_pass', 'reset_pass_change')->name('reset_pass');
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/admin-profile', 'adminProfile')->name('profile');
        Route::get('/change_password', 'change_password')->name('changePassword');
        Route::get('/add_services_cat', 'add_services_cat')->name('add-services_cat');
        Route::get('/manage_service_category', 'manage_service_category')->name('manage_service_cat');
        Route::get('/view_service_provider', 'view_service_provider')->name('view-service-provider');
        Route::get('/manage_service_provider', 'manage_service_provider')->name('manage-service-provider');
        Route::get('/view_service', 'view_service')->name('view-service');
        Route::get('/add_staff', 'add_staff')->name('add-staff');
        Route::get('/manage_staff', 'manage_staff')->name('manage-staff');
        Route::get('/manage_customer', 'manage_customer')->name('manage-customer');
        Route::get('/view_customer', 'view_customer')->name('view-customer');
        Route::get('/view_staff', 'view_staff')->name('view-staff');
        Route::get('/manage_services', 'manage_service')->name('manage-service');
        Route::get('/add_services', 'add_services')->name('add-services');
        Route::get('/staff_permission', 'staff_permission')->name('staff-permission');
        Route::get('/send_notification', 'send_notification')->name('send-notification');
        Route::get('/notification_list', 'notification_list')->name('notification-list');
        Route::get('/view_notification', 'view_notification')->name('view-notification');
        Route::get('/inquiry_list', 'inquiry_list')->name('inquiry-list');
        Route::get('/send_inquires', 'send_inquires')->name('send-inquiry');
        Route::post('/send_notification', 'send_notify')->name('send-notify');
        Route::post('/save_service', 'save_service')->name('save-service');
        Route::get('/delete', 'delete')->name('delete');
        Route::post('/update_profile', 'update_profile')->name('update_profile');
        Route::post('/change_password', 'change_pass_save')->name('change_password');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/save_service_cat', 'save_service_cat')->name('save_service_cat');
        Route::post('/statusChange', 'statusChange')->name('statusChange');
    });
});
Route::prefix('service_provider/')->name('provider.')->controller(ServiceProviderController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/login', 'login')->name('login');
    Route::get('/reset_password_page', 'reset_password_page')->name('reset_password_page');
    Route::post('/reset_pass', 'reset_pass_change')->name('reset_pass');
    Route::middleware(service_provider_middleware::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/change_password', 'change_password')->name('changePassword');
        Route::get('/manage_services', 'manage_services')->name('manageServices');
        Route::get('/add_services', 'add_services')->name('addServices');
        Route::post('/update_profile', 'update_profile')->name('update_profile');
        Route::post('/change_password', 'change_pass_save')->name('change_pass');
        Route::post('/save_service', 'save_service')->name('save_service');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/statusChange', 'statusChange')->name('statusChange');
        Route::get('/delete', 'delete')->name('delete');
    });
});
