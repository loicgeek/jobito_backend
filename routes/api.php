<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('auth/login','Api\AuthController@login');
Route::post('auth/register','Api\AuthController@register');
Route::post('auth/logout','Api\AuthController@logout');
Route::post('auth/refresh','Api\AuthController@refresh');
Route::post('auth/social/{provider}','Api\AuthController@socialLogin');

Route::group(['middleware'=>'auth:api'],function(){

    Route::apiResource('jobs', 'Api\JobController');
    Route::apiResource('jobs.applications', 'Api\JobApplicationController');

    Route::post('profiles/{profile_id}/certifications','Api\UserProfileController@addWork');
    Route::delete('profiles/{profile_id}/certifications/{work_id}','Api\UserProfileController@delWork');

    Route::post('profiles/{profile_id}/experiences','Api\UserProfileController@addExperience');
    Route::delete('profiles/{profile_id}/experiences/{experience_id}','Api\UserProfileController@delExperience');

    Route::post('profiles/{profile_id}/realisations','Api\UserProfileController@addRealisation');
    Route::delete('profile/{profile_id}/realisations/{realisation_id}','Api\UserProfileController@delRealisation');

    Route::post('profiles/{profile_id}/schools','Api\UserProfileController@addSchool');
    Route::delete('profiles/{profile_id}/schools/{school_id}','Api\UserProfileController@delSchool');

    Route::apiResource('profiles','Api\UserProfileController')->only([
        'update'
    ]);
});


