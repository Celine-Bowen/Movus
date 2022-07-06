<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function timeline()
    {
        $orders = Order::where('customer_id', '=', Auth()->user()->id)->latest('order_id')->first();
        return view ('customer.timeline')->with( 'orders', $orders );
    }

    public  function invoices(Request $request, $id)
    {
        $orders = Order::where('customer_id', '=', Auth()->user()->id)->get();

        $customers = Customer::find(Auth()->user()->id);
        return view ('customer.invoice')->with( 'orders', $orders )->with( 'customers', $customers );
    }

    public function prints()
    {
        $orders = Order::where('customer_id', '=', Auth()->user()->id)->get();
        $customers = Customer::find(Auth()->user()->id);
        return view ('customer.print')->with( 'orders', $orders )->with( 'customers', $customers );
    }

    public function confirmInfo(Request $request)
    {

        $customers = new Customer();
        $customers->customer_id = $request->user()->id;
        $customers->name = $request->user()->name;
        $customers->email = $request->user()->email;
        $customers->save();

        return view('customer.customerdashboard');
    }


}
