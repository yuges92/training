<?php
use App\Role;
use App\User;
use App\Moderator;
use App\ClassEvent;
use App\CourseDocument;
use App\Mail\NewUserMail;
use App\Mail\InvoiceBooking;
use App\Notifications\NewUser;
use App\Mail\InvoiceBookingMail;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;

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



// // factory(ClassEvent::class)->create();
// $role_Trainer = Role::where('name', 'Trainer')->first();
// $trainers =   factory(User::class, 5)->create()->each(function ($user) use ($role_Trainer) {
//     $user->roles()->attach($role_Trainer);
// });

// $role_moderator = Role::where('name', 'Moderator')->first();
// $moderator =   factory(User::class, 5)->create()->each(function ($user) use ($role_moderator) {
//     $user->roles()->attach($role_moderator);
// });

Route::get('/', function () {
  $title = 'Page Title';
  // $user=User::where('email','sivayuges@gmail.com')->first();
  // Mail::to($user)->send(new NewUserMail());
  return view('welcome')->with('title', $title);
});




Route::get('/mailable', function () {
  // $title = 'Page Title';
  $user=User::where('email','sivayuges@gmail.com')->first();
  // Mail::to($user)->send(new NewUserMail());
  return new InvoiceBookingMail($user, $user->orders()->first());
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



Route::get('/courses/{courseType}', 'FrontCourseController@show')->name('courseType');
Route::get('/courses/{courseType}/{course}', 'FrontCourseController@showCourse')->name('course');
Route::post('/customlogin', 'LoginController@authenticate')->name('customLogin');
Route::post('/customlogout', 'LoginController@logout')->name('customLogout');
// Route::resource('/register', 'RegisterController');

Auth::routes();
Route::get('/login', 'LoginController@show')->name('login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function () {
  Auth::logout();
  return redirect('/login');
})->name('logout');

//admin routes. Uses admin middleware to allow access to admin area
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
  Route::get('/', 'AdminController@index')->name('adminDashboard');
  Route::get('/courses', 'CourseController@index')->name('adminCourses');
  Route::get('/courses/create', 'CourseController@create')->name('createCourse');
  Route::get('/courses/{course}', 'CourseController@show')->name('viewCourse');
  Route::get('/courses/{course}/dashboard', 'CourseController@dashboard')->name('viewCourseDashboard');
  Route::get('/courses/{course}/learner/{learner}', 'CourseController@learnerCourseOverview')->name('learnerCourseOverview');
  Route::get('/assignmentMarking', 'CourseController@assignmentMarking')->name('assignmentMarking');
  Route::get('/courses/{course}', 'CourseController@show')->name('courses.show');
  Route::get('/courses/{course}/edit', 'CourseController@edit')->name('editCourse');
  Route::post('/courses/store', 'CourseController@store')->name('storeCourse');
  Route::put('/courses/{course}', 'CourseController@update')->name('updateCourse');
  Route::delete('/courses/{course}', 'CourseController@destroy')->name('deleteCourse');
  Route::post('/courses/deleteFile/{course}', 'CourseController@removeCourseFile')->name('deleteCourseFile');
  Route::get('/myProfile', 'MyProfileController@index')->name('myProfile.index');
  Route::post('/myProfile', 'MyProfileController@update')->name('myProfile.update');
  Route::post('/myProfile/password', 'MyProfileController@updatePassword')->name('myProfile.changePassword');

  Route::get('/courses/{course}/assignments/{assignment}', 'CourseAssignmentController@show');

  Route::resource('/courseTypes', 'CourseTypeController');
  Route::get('/assignments', 'AssignmentController@index');
  Route::resource('/classes', 'ClassEventController');
  Route::post('/users/{user}/images', 'UserController@updateImage')->name('profile.changeImage');
  Route::resource('/users', 'UserController');
  Route::resource('/classAddress', 'ClassAddressController');
  Route::resource('/learners', 'LearnerController');
  Route::resource('/classTrainer', 'ClassTrainerController');
  Route::delete('/classTrainer/{class_id}/{trainer_id}', 'ClassTrainerController@destroy')->name('classTrainer.destroy');

  Route::resource('/attendance', 'AttendanceController');
  Route::get('/attendance/class/{class_id}', 'AttendanceController@showClassLearners');
  Route::resource('/userDetail', 'UserDetailController');
  Route::resource('/address', 'AddressController');
  Route::resource('/accessCode', 'AccessCodeController');
  Route::resource('/order', 'BookingController');
  Route::get('/referralCode', 'ReferralCodeController@showView')->name('referralCode.showView');

  Route::post('/classStudent', 'ClassStudentController@store')->name('giveStudentClassAccess');
  // Route::post('/userDetail/store', 'UserDetailController@store')->name('addLearnerDetails');
  // Route::put('/userDetail/{user_id}', 'UserDetailController@update')->name('updateLearner');

  Route::post('/class/{classEvent}/updateAttendance', 'ClassEventController@updateAttendance')->name('updateAttendance');
  Route::delete('/class/{classEvent}/removeClassAccess', 'ClassEventController@removeClassAccess')->name('removeClassAccess');
});



Route::get('/course/{course}/classes', 'CourseController@getClasses');
Route::get('/courses/{course}/class/{classEvent}', 'ClassEventController@showClassDetail')->name('showClassDetail');

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



//paypal payment.status
// Route::get('paywithpaypal','PaypalController@payWithPaypal' )->name('addmoney.paywithpaypal');
// Route::post('paypal', 'PaypalController@postPaymentWithpaypal')->name('addmoney.paypal');
Route::get('paypal', 'PaypalController@getPaymentStatus')->name('paypal.status');
Route::get('paypal/status', 'PaypalController@completed')->name('paypal.completed');
Route::get('paypal/order/{order}/cancelled', 'PaypalController@cancelledPayment')->name('paypal.cancelled');

//learner Routes
Route::get('learner', 'Learner\LearnerDashboardController@index')->name('learner');
Route::get('learner/dashboard', 'Learner\LearnerDashboardController@index')->name('learner.dashboard');
Route::get('learner/bookings', 'Learner\LearnerBookingController@index')->name('learner.bookings');
Route::get('learner/bookings/{order}', 'Learner\LearnerBookingController@show')->name('learner.bookings.show');


//Commissioner Routes
Route::get('commissioner', 'Commissioner\CommissinerDashboardController@index')->name('commissioner');
