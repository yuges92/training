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

Route::group(['middleware'=>['auth:api']], function(){
  Route::resource('/courses', 'Api\CourseController');
  Route::get('/classAddresses', 'ClassAddressController@index');
  // Route::get('/courses/{course}', 'Api/CourseController@show');
  Route::post('/courses/{course}/courseBodies', 'Api\CourseController@addBody')->name('courses.addBody');
  Route::delete('/courseBodies/{courseBody}', 'Api\CourseBodyController@destroy')->name('courseBodies.destroy');
  Route::patch('/courseBodies/{courseBody}', 'Api\CourseBodyController@update')->name('courseBodies.update');
  Route::resource('/courseTypes', 'Api\CourseTypeController');
  Route::resource('/courses/{course}/courseDocuments', 'Api\CourseDocumentController');
  Route::post('/classEvents/{classEvent}/trainers', 'Api\ClassEventController@addTrainer')->name('classes.trainers.store');
  Route::post('/classEvents/{classEvent}/classTrainer', 'Api\ClassEventController@getATrainer')->name('classes.trainers.get');
  Route::delete('/classEvents/{classEvent}/classTrainer', 'Api\ClassEventController@deleteATrainer')->name('classes.trainers.destroy');

  Route::resource('/classEvents', 'Api\ClassEventController');
  Route::resource('/classEvents/{classEvent}/classDates', 'Api\ClassDateController');
  Route::resource('/trainers', 'ClassTrainerController');
  // Route::resource('/courseTypes', 'CourseTypeController');
  Route::resource('/courses/{course}/assessmentCriterias', 'Api\AssessmentCriteriaController');
  Route::resource('/courses/{course}/assignments', 'Api\AssignmentController');

});

