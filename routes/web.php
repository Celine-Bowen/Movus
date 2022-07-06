<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Order;

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
use App\Location;
Route::get('/', function () {
    $locations = Location::all();
    return view('welcome')->with('locations',$locations);
});

Auth::routes();
/* Route::get('/customerdashboard','HomeController@customerdashboard'); */
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/admindashboard', function () {

        $users = User::all();
        $orders = Order::where('order_status', '=', 'ongoing')->get();

        return view('admin.admindashboard')->with('users',$users)->with('orders',$orders);
    });

    Route::get('/adminbooking-list','Admin\DashboardController@bookinglist')->name('adminbooking-list');

    //Role Register
    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    //Customer Info
    Route::get('/customer-info','Admin\DashboardController@customerindex');
    Route::get('/customer-edit/{id}','Admin\DashboardController@customeredit');
    Route::put('/customer-update/{id}','Admin\DashboardController@customerupdate');
    Route::delete('/customer-delete/{id}','Admin\DashboardController@customerdelete');

    //Driver Info
    Route::get('/driver-info','Admin\DashboardController@driverindex');
    Route::get('/driver-edit/{id}','Admin\DashboardController@driveredit');
    Route::put('/driver-update/{id}','Admin\DashboardController@driverupdate');
    Route::delete('/driver-delete/{id}','Admin\DashboardController@driverdelete');

    //Booking
    Route::post('/adminsave-booking','Admin\DashboardController@store');
    Route::get('/adminbooking', 'Admin\DashboardController@indexbooking');
    Route::get('/admintimeline', 'Admin\DashboardController@admintimeline');

    //Location
    Route::get('/adminselect-location','Admin\DashboardController@select_location');
    Route::post('/adminsave-locations','Admin\DashboardController@locationstore');
    Route::get('/adminlocation-edit/{id}','Admin\DashboardController@locationedit');
    Route::put('/adminlocation-update/{id}','Admin\DashboardController@locationupdate');
    Route::delete('/adminlocation-delete/{id}','Admin\DashboardController@locationdelete');

    Route::post('/adminselect-location/{id}','Admin\DashboardController@admintemp_order')->name('admintempOrder');
    Route::get('/adminpreOrder','Admin\DashboardController@adminpre_order')->name('adminpreOrder');

    Route::get('/admininvoice/{id}', 'Admin\DashboardController@invoices');

});

Route::group(['middleware' => ['auth','customer']], function () {

    // Route::get('/customerdashboard', function () {
    //     return view('customer.customerdashboard');
    // });

    Route::get('/customerdashboard','HomeController@customerdashboard');

    // Customer Profile
    Route::get('/profile','Customer\ProfileController@profile');
    Route::get('profile-edit/{id}','Customer\ProfileController@edit')->name('profile.edit');
    Route::put('/profile-update/{id}','Customer\ProfileController@update');
    Route::post('/profile','Customer\ProfileController@update_avatar');
    Route::get('/confirmInfo','Customer\DashboardController@confirmInfo');

    // Booking
    Route::post('/save-booking','Customer\OrderController@store');
    Route::get('/booking', 'Customer\OrderController@indexbooking');
    Route::get('/booking-details', 'Customer\OrderController@booking_details');
    Route::delete('/booking-delete/{id}','Customer\OrderController@bookingdelete');

    Route::get('/invoice/{id}', 'Customer\DashboardController@invoices');
    Route::get('/timeline', 'Customer\DashboardController@timeline');

    Route::get('/select-location','Customer\OrderController@select_location');
    Route::post('/select-location/{id}','Customer\OrderController@temp_order')->name('tempOrder');
    Route::get('/preOrder','Customer\OrderController@pre_order')->name('preOrder');

    Route::get('/print','Customer\DashboardController@prints');

    // Route::post('/price/{id}','Customer\OrderController@price')->name('price');
});

Route::group(['middleware' => ['auth','driver']], function () {

    Route::get('/driverdashboard', function () {
        return view('driver.driverdashboard');
    });

    // Driver Profile
    Route::get('/driverprofile','Driver\ProfileController@profile');
    Route::get('driverprofile-edit/{id}','Driver\ProfileController@edit')->name('driverprofile.edit');
    Route::put('/driverprofile-update/{id}','Driver\ProfileController@update');
    Route::post('/driverprofile','Driver\ProfileController@update_avatar');

    // Booking
    Route::get('/driverbooking-details', 'Driver\OrderController@booking_details');

    Route::get('/driverinvoice/{id}', 'Driver\OrderController@invoices');
    Route::get('/drivertimeline', 'Driver\DashboardController@timeline');

    //Action Status
    Route::get('/actionstatus/{id}', 'Driver\DashboardController@actionstatus')->name('actionstatus');
    Route::post('/dropoff/{id}', 'Driver\DashboardController@dropoff')->name('dropoff');
    Route::post('/payment/{id}', 'Driver\DashboardController@payment')->name('payment');
    Route::post('/complete/{id}', 'Driver\DashboardController@complete')->name('complete');
    Route::post('/pick/{id}', 'Driver\DashboardController@pick')->name('pick');
    Route::get('/driverride', 'Driver\DashboardController@ride');

    Route::get('/driverprint','Driver\DashboardController@prints');
});





