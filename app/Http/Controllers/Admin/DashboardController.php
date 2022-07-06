<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Driver;
use App\Admin;
use App\Order;
use App\Location;
use Auth;


class DashboardController extends Controller
{
    public  function invoices(Request $request, $id)
    {
        $orders = Order::where('order_id', '=', Auth()->user()->id)->get();
        return view ('admin.admininvoice')->with( 'orders', $orders );
    }

    public function registered()
    {
        $users = User::all();
        return view ('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view ('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');

        if($request->input('usertype') == "customer"){
            $customers = new Customer();
            $customers->customer_id = $id;
            $customers->name = $request->input('name');
            $customers->email = $request->input('email');
            $customers->save();
        }
        elseif($request->input('usertype') == "driver") {
            $drivers = new Driver();
            $drivers->driver_id = $id;
            $drivers->name = $request->input('name');
            $drivers->email = $request->input('email');
            $drivers->save();
        }

        $users->update();
        return redirect ('/role-register')->with('status','Your Data Role is Updated');
    }

    public function registerdelete(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect ('/role-register')->with('status','Your Data is Deleted');
    }

    public function bookinglist(){

        $orders = Order::all();
        return view('admin.adminbooking-list')->with( 'orders', $orders );
    }

//Driver

    public function driverindex(){
        $drivers = Driver::all();
        return view('admin.driver-info')->with('drivers',$drivers);
    }

    public function driveredit(Request $request, $id)
    {
        $drivers = Driver::findOrFail($id);
        return view('admin.driver-edit')->with('drivers',$drivers);
    }

    public function driverupdate(Request $request, $id)
    {
        $drivers = Driver::findOrFail($id);
        $drivers->name = $request->input('name');
        $drivers->matric = $request->input('matric');
        $drivers->email = $request->input('email');
        $drivers->address = $request->input('address');
        $drivers->phone = $request->input('phone');
        $drivers->gender = $request->input('gender');
        $drivers->faculty = $request->input('faculty');
        $drivers->car_name = $request->input('car_name');
        $drivers->car_number = $request->input('car_number');
        $drivers->car_type = $request->input('car_type');
        $drivers->car_colour = $request->input('car_colour');

        $drivers->update();

        return redirect('driver-info')->with('status','Driver data is Updated');
    } 

    public function driverdelete(Request $request, $id)
    {
        $drivers = Driver::findOrFail($id);
        $drivers->delete();
        
        return redirect('driver-info')->with('status', 'Driver Data is Deleted');
    }


//Customer 

    public function customerindex(){
        $customers = Customer::all();
        return view('admin.customer-info')->with('customers',$customers);
    }


    public function customeredit(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        return view('admin.customer-edit')->with('customers',$customers);
    }

    public function customerupdate(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->name = $request->input('name');
        $customers->matric = $request->input('matric');
        $customers->email = $request->input('email');
        $customers->address = $request->input('address');
        $customers->phone = $request->input('phone');
        $customers->gender = $request->input('gender');
        $customers->faculty = $request->input('faculty');

        $customers->update();

        return redirect('customer-info')->with('status','Customer data is Updated');
    } 

    public function customerdelete(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        
        return redirect('customer-info')->with('status', 'Customer Data is Deleted');
    }

    //Booking

    public  function indexbooking()
    {
        return view ('admin.adminbooking',array('user'=>Auth::user()));
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
        $orders->order_status = 'ongoing';
        $orders->payment = 'unpaid';

        $orders->save();

        return redirect('admin.admindashboard')->with('status','Request Successful ');

    }

    public function admintimeline()
    {
        $orders = Order::where('driver_name','!=', '')->get();
        return view ('admin.admintimeline')->with( 'orders', $orders );
    }

    //Locations

    public  function select_location()
    {
        $locations = Location::all();
        return view('admin.adminselect-location')->with('locations',$locations);
    }

    public  function locationstore(Request $request)
    {
        $locations = new Location;

        $locations->name = $request->input('name');
        $locations->fromlocation = $request->input('fromlocation');
        $locations->goinglocation = $request->input('goinglocation');
        $locations->pricelocation = $request->input('pricelocation');

        $locations->save();

        return redirect('adminselect-location')->with('status','New Locations is Added');
    }

    public function locationedit(Request $request, $id)
    {
        $locations = Location::findOrFail($id);
        return view('admin.adminlocation-edit')->with('locations',$locations);
    }

    public function locationupdate(Request $request, $id)
    {
        $locations = Location::findOrFail($id);
        $locations->name = $request->input('name');
        $locations->fromlocation = $request->input('fromlocation');
        $locations->goinglocation = $request->input('goinglocation');
        $locations->pricelocation = $request->input('pricelocation');
        $locations->update();

        return redirect('adminselect-location')->with('status','Locations data is Updated');
    } 

    public function locationdelete(Request $request, $id)
    {
        $locations = Location::findOrFail($id);
        $locations->delete();
        
        return redirect('/adminselect-location')->with('status', 'Location Selected is Deleted');
    }

    public  function admintemp_order($id)
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

        return view('admin.adminselect-location')->with($info);
    }

    public  function adminpre_order()
    {
        $customers = Customer::find(auth()->user()->id);
        $custOrder = Location::find($customers->choice);

        return view('admin.adminbooking')->with('custOrder',$custOrder);
    }
    
}
