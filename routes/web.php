<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;

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


// Authentication Routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');


// Dashboard Routes
Route::get('logout', [DashboardController::class, 'logout'])->name('logout'); 

Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard');


//Leads
Route::get('dashboard/leads', [LeadController::class, 'leads'])->name('leads');
Route::get('dashboard/leads-filter', [LeadController::class, 'leads_filter'])->name('leads_filter');
Route::get('dashboard/leads-detail/{id?}', [LeadController::class, 'leads_detail'])->name('leads_detail');
Route::get('dashboard/leads-api/{id?}', [LeadController::class, 'leads_api'])->name('leads_api');
Route::get('dashboard/update-leads-detail/{id?}/{status?}', [LeadController::class, 'update_leads_detail'])->name('update_leads_detail');
Route::get('/get-leads', [LeadController::class, 'getLeads'])->name('getLeads');


//User
Route::get('dashboard/user-management', [UserController::class, 'user_management'])->name('user_management');
Route::get('dashboard/add-user', [UserController::class, 'add_user'])->name('add_user');
Route::post('store-add-user', [UserController::class, 'store_add_user'])->name('store_add_user');
Route::get('dashboard/edit-user/{id?}', [UserController::class, 'edit_user'])->name('edit_user');
Route::post('update-user', [UserController::class, 'update_user'])->name('update_user');
Route::get('dashboard/delete-user/{id?}', [UserController::class, 'delete_user'])->name('delete_user');



//Brand
Route::get('dashboard/brand-management', [BrandController::class, 'brand_management'])->name('brand_management');
Route::get('dashboard/add-brand', [BrandController::class, 'add_brand'])->name('add_brand');
Route::post('store-add-brand', [BrandController::class, 'store_add_brand'])->name('store_add_brand');
Route::get('dashboard/edit-brand/{id?}', [BrandController::class, 'edit_brand'])->name('edit_brand');
Route::post('update-brand', [BrandController::class, 'update_brand'])->name('update_brand');
Route::get('dashboard/delete-brand/{id?}', [BrandController::class, 'delete_brand'])->name('delete_brand');

