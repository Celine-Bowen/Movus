<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Driver;
use Auth;

class DashboardController extends Controller
{
    public function ride()
    {
        $orders = Order::where('order_status', '=', 'accepted')->where('driver_id', '=', Auth()->user()->id)->latest('order_id')->first();
        return view ('driver.driverride')->with( 'orders', $orders );
    }

    public function timeline()
    {
        $orders = Order::where('order_status', '=', 'ongoing')->get();
        return view ('driver.drivertimeline')->with( 'orders', $orders );
    }

    public function actionstatus(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->driver_id = Auth()->user()->id;
        $orders->driver_name = $request->input('driver_name');
        $orders->order_status = 'accepted';
        $orders->save();

        return view ('driver.driverride')->with( 'orders', $orders );
    }

    public function pick(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->pickup = 'Done';

        $orders->save();

        return back();
    }

    public function dropoff(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->dropoff = 'Done';

        $orders->save();

        return back();
    }

    public function payment(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->payment = 'Paid';

        $orders->save();

        return back();
    }

    public function complete(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->complete = 'Ride Complete';

        $orders->save();

        return back();
    }

    public function prints()
    {
        $orders = Order::where('driver_id', '=', Auth()->user()->id)->get();

        $drivers = Driver::find(Auth()->user()->id);
        return view ('driver.driverinvoice')->with( 'orders', $orders )->with( 'drivers', $drivers );
    }
}
