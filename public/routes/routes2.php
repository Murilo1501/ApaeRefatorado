<?php

use App\Controller\EventNoticecontroller;
use App\Controller\ComonController;
use App\Controller\LoginController;
use App\Controller\AdminController;




return[
    'GET|/Novo_APAE/public/' => [LoginController::class,'show'],
    'POST|/Novo_APAE/public/login' => [LoginController::class,'logar'],

    'GET|/Novo_APAE/public/formulario' => [ComonController::class,'create'],
    'POST|/Novo_APAE/public/user/register' => [ComonController::class,'store'],
    'GET|/Novo_APAE/public/login?nivel=comum' => [ComonController::class,'show'],

    'GET|/Novo_APAE/public/login?nivel=admin' => [AdminController::class,'show'],
    'GET|/Novo_APAE/public/admin' => [AdminController::class,'count'],
    'GET|/Novo_APAE/public/admin/usersList' => [AdminController::class,'index'],


    'GET|/Novo_APAE/public/comum' => [EventNoticeController::class,'show'],
    'GET|/Novo_APAE/public/comum/notices' => [EventNoticecontroller::class,'index'],
    'GET|/Novo_APAE/public/comum/profile' => [ComonController::class,'index']


];