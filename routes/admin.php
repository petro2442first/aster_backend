<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminController::class, 'index'])
                ->middleware(['auth'])
                ->name('admin');
Route::post('/admin/confirm-user', [AdminController::class, 'confirmUser'])
                ->middleware(['auth'])
                ->name('confirm-user');
Route::post('/admin/login', [AdminController::class, 'login'])
                ->middleware(['auth'])
                ->name('admin.profile');
Route::post('/admin', [AdminController::class, 'loginAdmin'])
                ->middleware(['auth'])
                ->name('admin.login');
Route::post('/admin/feed/set-balance', [AdminController::class, 'setBalance'])
                ->middleware(['auth'])
                ->name('user.set-balance');
Route::post('/admin/delete-user', [AdminController::class, 'deleteUser'])
->middleware(['auth'])
->name('delete-user');
Route::post('/admin/edit-tariffs', [AdminController::class, 'editUserTariffs'])
->middleware(['auth'])
->name('admin.edit-tariffs');
Route::get('/admin/get-tariffs/{id}', [AdminController::class, 'getUserTariffs'])
->middleware(['auth'])
->name('admin.get-tariffs');
Route::get('/admin/remove-tariff/{user_id}/{id}', [AdminController::class, 'removeUserTariff'])
->middleware(['auth'])
->name('admin.remove-tariff');
Route::get('/admin/add-tariff/{user_id}/{id}', [AdminController::class, 'addUserTariff'])
->middleware(['auth'])
->name('admin.add-tariff');
Route::get('/admin/remove-withdraw-request/{req_id}', [AdminController::class, 'deleteWithdrawRequest'])
->middleware(['auth'])
->name('admin.delete-withdraw-request');

Route::get('/admin/remove-transfer/{id}', [AdminController::class, 'deleteTransfer'])
->middleware(['auth'])
->name('admin.delete-transfer');

Route::get('/admin/user-info/{id}', [AdminController::class, 'userInfo'])
->middleware(['auth'])
->name('admin.user-info');

Route::get('/admin/profile-user/{id}', [ProfileController::class, 'adminIndex'])
->middleware(['auth'])
->name('admin.user-profile');
Route::get('/admin/edit-transfer-date/{id}/{user_id}', [AdminController::class, 'editTransferDate'])
->middleware(['auth'])
->name('admin.edit-transfer-date');
