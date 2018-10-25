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
  Route::resource('/admin/bookings', 'BookingController');

  Route::post('/admin/classStudent', 'ClassStudentController@store')->name('giveStudentClassAccess');
  // Route::post('/admin/userDetail/store', 'UserDetailController@store')->name('addLearnerDetails');
  // Route::put('/admin/userDetail/{user_id}', 'UserDetailController@update')->name('updateLearner');

  Route::post('/admin/classEvent/{classEvent}/updateAttendance', 'ClassEventController@updateAttendance')->name('updateAttendance');
  Route::delete('/admin/classEvent/{classEvent}/removeClassAccess', 'ClassEventController@removeClassAccess')->name('removeClassAccess');

});


Route::resource('/cart', 'CartController');

Route::get('/checkout/whoIsItFor/', 'CheckoutController@whoIsItFor')->name('whoIsItFor');


Route::get('checkout', 'CheckoutController@index')->name('checkout');

//controller for buyingForSelf
Route::get('checkout/self', 'BuyForSelfController@index')->name('self.index');
Route::post('checkout/self', 'BuyForSelfController@store')->name('buyForSelf.store');
Route::get('checkout/self/create', 'BuyForSelfController@create')->name('buyForSelf.create');
Route::get('checkout/self/paymentAndBilling', 'BuyForSelfController@paymentAndBillingSelf')->name('paymentAndBillingSelf');
Route::post('checkout/self/paymentAndBilling', 'BuyForSelfController@payment')->name('paymentSelf');


Route::get('checkout/someoneElse', 'BuyForSomeoneElseController@index')->name('someoneElse.index');
Route::post('checkout/someoneElse', 'BuyForSomeoneElseController@store')->name('someoneElse.store');
Route::get('checkout/someoneElse/create', 'BuyForSomeoneElseController@create')->name('someoneElse.create');
Route::get('checkout/someoneElse/paymentAndBilling', 'BuyForSomeoneElseController@paymentAndBilling')->name('paymentAndBillingSomeoneElse');
Route::post('checkout/someoneElse/paymentAndBilling', 'BuyForSomeoneElseController@payment')->name('paymentSomeoneElse');

// Route::post('checkout/payment', 'PaymentController@store')->name('payment');
// Route::get('checkout/someoneElse/payment', 'CheckoutController@paymentSomeoneElse')->name('paymentAndBillingSomeoneElse');
// Route::resource('checkout/someoneElse', 'BuyForSomeoneElseController');


Route::get('order/thankYou', 'OrderController@thankYou')->name('thankYou');

Route::get('/course/{course}/classes', 'CourseController@getClasses');
Route::get('/course/classEvent/{classEvent}', 'ClassEventController@getshowClassDetailC')->name('showClassDetail');

//paypal payment.status
// Route::get('paywithpaypal','PaypalController@payWithPaypal' )->name('addmoney.paywithpaypal');
// Route::post('paypal', 'PaypalController@postPaymentWithpaypal')->name('addmoney.paypal');
Route::get('paypal', 'PaypalController@getPaymentStatus')->name('paypal.status');
Route::get('paypal/status', 'PaypalController@completed')->name('paypal.completed');
Route::get('paypal/order/{order}/cancelled', 'PaypalController@cancelledPayment')->name('paypal.cancelled');
