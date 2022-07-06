<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Customer;
use App\Location;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public  function indexbooking()
    {
        return view ('customer.booking',array('user'=>Auth::user()));
    }

    public  function booking_details()
    {
        $orders = Order::where('customer_id', '=', Auth()->user()->id)->get();
        return view ('customer.booking-details')->with( 'orders', $orders );
    }

    public  function store(Request $request)
    {
        $orders = new Order;

        $orders->from = $request->input('from');
        $orders->going = $request->input('going');
        $orders->date = $request->input('date');
        $orders->time = $request->input('time');
        $orders->payment_option = $request->input('payment_option');
        $orders->note = $request->input('note');
        $orders->price = $request->input('price');
        $orders->customer_id = Auth()->user()->id;
        $orders->customer_name = $request->input('customer_name');
        $orders->order_status = 'ongoing';
        $orders->payment = 'unpaid';
        
        $orders->save();

        return redirect('timeline')->with('status','Request Successful ');

    }

    public function bookingdelete(Request $request, $id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect ('/timeline')->with('status','Your Data is Deleted');
    }

    public  function select_location()
    {
        $locations = Location::all();
        return view('customer.select-location')->with('locations',$locations);
    }

    public  function temp_order($id)
    {
        $customers = Customer::find(auth()->user()->id);
        $choice = Location::find($id);
        $locations= Location::all();

        $customers->choice = $id;

        $customers->save();

        $info = [
            'locations' => $locations,
            'customers' => $customers,
            'choice' => $choice
        ];

        return view('customer.select-location')->with($info);
    }

    public  function pre_order()
    {
        $customers = Customer::find(auth()->user()->id);
        $custOrder = Location::find($customers->choice);

        return view('customer.booking')->with('custOrder',$custOrder);
    }

    // public  function price(Request $request, $id)
    // {
    //     $price = Order::find($id);
    //     $price->price = $request->input('price');

    //     $price->save();

    //     return view('customer.select-location');
    // }
}
