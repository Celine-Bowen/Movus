<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Customer;
use App\Driver;

class OrderController extends Controller
{
    public  function booking_details()
    {
        $orders = Order::where('driver_id', '=', Auth()->user()->id)->get();
        return view ('driver.driverbooking-details')->with( 'orders', $orders );
    }

    public  function invoices(Request $request, $id)
    {
        $orders = Order::where('driver_id', '=', Auth()->user()->id)->get();

        $drivers = Driver::find(Auth()->user()->id);
        return view ('driver.driverinvoice')->with( 'orders', $orders )->with( 'drivers', $drivers );
    }
}
