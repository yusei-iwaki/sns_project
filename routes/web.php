<?php

use Illuminate\Support\Facades\Route;

// ホームページ
Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);

// トップページ
Route::get('/top', [App\Http\Controllers\TopController::class, 'index']);

// サンプルページ
Route::get('/sample', [App\Http\Controllers\SampleController::class, 'index']);

// 登録・ログインページ
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']); // 追加

// ログイン処理ページ
Route::post('/login/sign_up', [App\Http\Controllers\LoginController::class, 'sign_up']); // 追加

// 登録処理ページ
Route::post('/login/register', [App\Http\Controllers\LoginController::class, 'register']); // 追加

// ログアウト処理ページ
Route::get('/login/unregister', [App\Http\Controllers\LoginController::class, 'unregister']); // 追加
