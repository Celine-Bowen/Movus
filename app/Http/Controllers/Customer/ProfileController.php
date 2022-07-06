<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Customer;
use Image;

class ProfileController extends Controller
{
    public  function profile()
    {
        $customers = Customer::find(Auth()->user()->id);
        return view ('customer.profile')->with('customers',$customers);
    }

    public function edit(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        return view ('customer.profile-edit')->with('customers',$customers);
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);
        $customers->name = $request->input('name');
        $customers->matric = $request->input('matric');
        $customers->email = $request->input('email');
        $customers->address = $request->input('address');
        $customers->gender = $request->input('gender');
        $customers->phone = $request->input('phone');
        $customers->faculty = $request->input('faculty');
        $customers->update();

        return redirect('/profile')->with('status', 'Your Data is Updated');
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $customers = Customer::find(Auth()->user()->id);
    		$customers->avatar = $filename;
    		$customers->save();
        }

        return redirect('/profile')->with('status', 'Picture Uploded');
    }
}
