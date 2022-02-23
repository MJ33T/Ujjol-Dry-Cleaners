<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view('/admin_dash', 'admin_dash');

Route::view('/user_dash', 'user_dash');

Route::view('/login', "login");

Route::post('/login', [UserController::class, 'login']);

Route::get('/admin_dash', [ProductController::class, 'show_product']);

Route::post('/admin_dash', [ProductController::class, 'add_product']);

Route::get('/delete_added_product/{id}', [ProductController::class, 'delete']);

Route::post('/print_bill', [ProductController::class, 'print']);

Route::get('/search_customer', [ProductController::class, 'show']);

Route::post('/search_customer', [ProductController::class, 'search_customer']);

// Route::view('change_rate', 'change_rate');

Route::get('/change_rate', [ProductController::class, 'show_change_rate']);

Route::get('/change_product_rate/{id}', [ProductController::class, 'edit_product']);

Route::post('/change_rate', [ProductController::class, 'update_product']);

Route::get('/reports', [ReportController::class, 'show_all_report']);

Route::get('/daily_report', [ReportController::class, 'show_daily_report']);

Route::post('/report_search', [ReportController::class, 'report_search']);

Route::get('/search_id', [ProductController::class, 'showbyId']);

Route::post('/search_id', [ProductController::class, 'searchId']);

Route::get('/shares', [ReportController::class, 'shares']);

Route::post('/shares_search', [ReportController::class, 'shares_search']);

Route::post('/paid_status', [ReportController::class, 'paid_status']);

Route::get('/delete_invoice', [ProductController::class, 'showforDelete']);

Route::post('/delete_invoice', [ProductController::class, 'deleteId']);

Route::post('/invoice_delete', [ReportController::class, 'deletebyId']);

Route::post('/wash_worker_invoice', [ReportController::class, 'wash_worker_invoice']);

Route::post('/iron_worker_invoice', [ReportController::class, 'iron_worker_invoice']);

Route::post('/tony_invoice', [ReportController::class, 'tony_invoice']);

Route::get('/iron_wash_add', [ReportController::class, 'iron_wash_add_view']);

Route::post('/iron_worker_add', [ReportController::class, 'iron_worker_add']);

Route::post('/wash_worker_add', [ReportController::class, 'wash_worker_add']);

Route::get('/iron_worker', [ReportController::class, 'iron_worker_view']);

Route::get('/wash_worker', [ReportController::class, 'wash_worker_view']);

Route::post('/iron_worker_search', [ReportController::class, 'iron_worker_search']);

Route::post('/wash_worker_search', [ReportController::class, 'wash_worker_search']);

Route::get('/mobile_report', [ReportController::class, 'mobile_report_view']);

Route::post('/mobile_report_search', [ReportController::class, 'mobile_report_search']);

Route::get('/due_reports', [ReportController::class, 'show_all_due_report']);

Route::get('/paid_reports', [ReportController::class, 'show_all_paid_report']);

Route::get('/add_utility', [ReportController::class, 'show_utility']);

Route::post('/add_utility', [ReportController::class, 'add_ulility']);

Route::get('/paid_report_search', [ReportController::class, 'paid_report_search_view']);

Route::post('/paid_report_search', [ReportController::class, 'paid_report_search']);







