<?php

use App\Controller\EventNoticecontroller;
use App\Controller\UserController;
use App\Controller\LoginController;




return[
    'GET|/Novo_APAE/public/' => [LoginController::class,'show'],
    'POST|/Novo_APAE/public/login' => [LoginController::class,'logar'],

    'GET|/Novo_APAE/public/formulario' => [UserController::class,'create'],
    'POST|/Novo_APAE/public/user/register' => [UserController::class,'store'],
    'GET|/Novo_APAE/public/login?nivel=comum' => [UserController::class,'show'],
    'GET|/Novo_APAE/public/login?nivel=admin' => [UserController::class,'show'],

    'GET|/Novo_APAE/public/comum' => [EventNoticeController::class,'index'],

];