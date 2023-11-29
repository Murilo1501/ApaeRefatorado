<?php

require_once __DIR__ . '/../../autoload.php';

use App\Route\Route;
use App\Controller\{ComonController,EventNoticeController,AdminController,LoginController};
use App\Model\{EventModel,LoginModel,ComonModel};



Route::get('/Novo_APAE/public/login',LoginController::class,'show',loginModel::class);
Route::post('/Novo_APAE/public/login',LoginController::class,'logar',LoginModel::class);

Route::get('/Novo_APAE/public/formulario',ComonController::class,'create',ComonModel::class);
Route::get('/Novo_APAE/public/register',ComonController::class,'store',ComonModel::class);
Route::get('/Novo_APAE/public/login?nivel=comum',ComonController::class,'show',ComonModel::class);


Route::get('/Novo_APAE/public/login?nivel=admin',AdminController::class,'show',AdminModel::class);
Route::get('/Novo_APAE/public/admin',AdminController::class,'count',AdminModel::class);
Route::get('/Novo_APAE/public/usersList',AdminController::class,'index',AdminModel::class);

Route::get('/Novo_APAE/public/comum',EventNoticeController::class,'show',EventModel::class);
Route::get('/Novo_APAE/public/comum/notices',EventNoticeController::class,'index',EventModel::class);
Route::get('/Novo_APAE/public/comum/profile',ComonController::class,'index',ComonModel::class);
Route::get('/Novo_APAE/public/comum/card',ComonController::class,'show',ComonModel::class);








echo Route::redirect($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);