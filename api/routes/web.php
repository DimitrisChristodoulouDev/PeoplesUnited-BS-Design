<?php

use App\Http\Middleware\FindModel;
use Illuminate\Support\Facades\Route;
use App\UserLogin;

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type, AuthToken' );

Route::post('/authenticate', 'UserLoginController@authenticate')->middleware('authentication');

Route::post('/authenticate/login', 'UserLoginController@login');// To add a route to middleware:   ->middleware('authentication');
Route::post('/authenticate/register', 'LoginController@register');
Route::post('/authenticate/forgot', 'LoginController@forgot');
Route::post('/test', function (){
    echo response()->json(['a'=>'asd'], 200);
});

Route::post('/contacts','ContactsController@index');
Route::post('/contact/{id}','ContactsController@show');//->middleware([FindModel::class]);
Route::post('/contact/{id}/edit/personal','ContactsController@editPersonal');
Route::post('/contact/{id}/delete/soft','ContactsController@deleteSoft');

Route::post('/contact/{id}/relations', function (){
    $users = UserLogin::all();
    foreach ($users as $user) {
            $user->userContacts;
        }
    return response()->json($users);
});

Route::post('authenticate/logout', 'UserLoginController@logout')->middleware('authentication');

