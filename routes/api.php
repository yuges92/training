<?php

use Illuminate\Http\Request;
use App\User;

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

// Route::post('articles', function() {
//     // If the Content-Type and Accept headers are set to 'application/json',
//     // this will return a JSON structure. This will be cleaned up later.
//     return User::all();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([ 'namespace'=>'Api', 'middleware'=>['auth:api']], function(){
  Route::resource('/courses', 'CourseController');
  // Route::get('/courses/{course}', 'CourseController@show');
  Route::post('/courses/{course}/courseBodies', 'CourseController@addBody');
  Route::delete('/courseBodies/{courseBody}', 'CourseBodyController@destroy');
  Route::patch('/courseBodies/{courseBody}', 'CourseBodyController@update');
  Route::resource('/courseTypes', 'CourseTypeController');

});

