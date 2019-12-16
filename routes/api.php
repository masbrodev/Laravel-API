<?php

use Illuminate\Http\Request;

Route::post('auth/login', 'Auth_C@login');
Route::post('auth/register', 'Auth_C@register');
Route::get('users', 'User_C@users');
Route::get('user/profile','User_C@profile')->middleware('auth:api');
Route::post('post', 'Post_C@add')->middleware('auth:api');
Route::get('postshow', 'Post_C@showall');