<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// set_time_limit(0);


Route::get('/', function () {

  return view('welcome');
});

// Route::get('/download/{file}', function ($file='') {
//   // dd($file);
//   return response()->download(storage_path('app/public/strorage'.$file));
//
// });

Route::get('/email', function () {
  return view('email');
});
Route::get('/courses', 'FrontCourseController@index')->name('courses');

Route::get('/courses/{course}', 'FrontCourseController@show')->name('course');
Route::post('/customlogin', 'LoginController@authenticate')->name('customLogin');
Route::post('/customlogout', 'LoginController@logout')->name('customLogout');
// Route::resource('/register', 'RegisterController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//admin routes. Uses admin middleware to allow access to admin area
Route::group(['middleware' => ['admin']], function(){
  Route::get('/admin', 'AdminController@index')->name('adminDashboard');
  Route::get('/admin/courses', 'CourseController@index')->name('adminCourses');
  Route::get('/admin/courses/create', 'CourseController@create')->name('createCourse');
  Route::get('/admin/courses/{course}', 'CourseController@show')->name('viewCourse');
  Route::get('/admin/courses/{course}/edit', 'CourseController@edit')->name('editCourse');
  Route::post('/admin/courses/store', 'CourseController@store')->name('storeCourse');
  Route::put('/admin/courses/{course}', 'CourseController@update')->name('updateCourse');
  Route::delete('/admin/courses/{course}', 'CourseController@destroy')->name('deleteCourse');
  Route::post('/admin/courses/deleteFile/{course}', 'CourseController@removeCourseFile')->name('deleteCourseFile');

  Route::resource('/admin/assignments', 'AssignmentController');
  Route::resource('/admin/classEvent', 'ClassEventController');
  Route::resource('/admin/users', 'UserController');
  Route::resource('/admin/classAddress', 'ClassAddressController');
  Route::resource('/admin/learners', 'LearnerController');
  Route::resource('/admin/classTrainer', 'ClassTrainerController');
  Route::delete('/admin/classTrainer/{class_id}/{trainer_id}', 'ClassTrainerController@destroy')->name('classTrainer.destroy');

  Route::resource('/admin/attendance', 'AttendanceController');
  Route::get('/admin/attendance/class/{class_id}', 'AttendanceController@showClassLearners');
  Route::resource('/admin/userDetail', 'UserDetailController');
  Route::resource('/admin/address', 'AddressController');
  Route::resource('/admin/accessCode', 'AccessCodeController');

  Route::post('/admin/classStudent', 'ClassStudentController@store')->name('giveStudentClassAccess');
  // Route::post('/admin/userDetail/store', 'UserDetailController@store')->name('addLearnerDetails');
  // Route::put('/admin/userDetail/{user_id}', 'UserDetailController@update')->name('updateLearner');

  Route::post('/admin/classEvent/{classEvent}/updateAttendance', 'ClassEventController@updateAttendance')->name('updateAttendance');
  Route::delete('/admin/classEvent/{classEvent}/removeClassAccess', 'ClassEventController@removeClassAccess')->name('removeClassAccess');

});

Route::post('cart/', 'ShoppingCartController@addToBasket')->name('addToBasket');
Route::get('cart/', 'ShoppingCartController@showCart')->name('showCart');
Route::delete('cart/', 'ShoppingCartController@destroy')->name('removeClassFromCart');


// Route::get('/checkout/customerDetail/', 'CheckoutController@customerDetail')->name('showCustomerDetail');
Route::get('/checkout/whoIsItFor/', 'CheckoutController@whoIsItFor')->name('whoIsItFor');
Route::get('/checkout/buyForSelf/', 'CheckoutController@buyForSelf')->name('buyForSelf');
Route::get('/checkout/buyForSomeoneElse/', 'CheckoutController@buyForSomeoneElse')->name('buyForSomeoneElse');

Route::post('/checkout/payment/', 'CheckoutController@payment')->name('paymentAndBilling');



Route::get('myCart', 'CartController@store');
Route::get('myCart/show', 'CartController@index');


Route::get('/course/{course}/classes', 'CourseController@getClasses');
Route::get('/course/classEvent/{classEvent}', 'ClassEventController@getshowClassDetailC')->name('showClassDetail');


//paypal
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
