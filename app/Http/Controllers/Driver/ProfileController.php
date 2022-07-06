<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Driver;
use Image;

class ProfileController extends Controller
{
    public  function profile()
    {
        $drivers = Driver::find(Auth()->user()->id);
        return view ('driver.driverprofile')->with('drivers',$drivers);
    }

    public function edit(Request $request, $id)
    {
        $drivers = Driver::findOrFail($id);
        return view ('driver.driverprofile-edit')->with('drivers',$drivers);
    }

    public function update(Request $request, $id)
    {
        $drivers = Driver::find($id);
        $drivers->name = $request->input('name');
        $drivers->matric = $request->input('matric');
        $drivers->email = $request->input('email');
        $drivers->address = $request->input('address');
        $drivers->gender = $request->input('gender');
        $drivers->phone = $request->input('phone');
        $drivers->faculty = $request->input('faculty');
        $drivers->car_name = $request->input('car_name');
        $drivers->car_number = $request->input('car_number');
        $drivers->car_type = $request->input('car_type');
        $drivers->car_colour = $request->input('car_colour');
        $drivers->update();

        return redirect('/driverprofile')->with('status', 'Your Profile is Updated');
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $drivers = Driver::find(Auth()->user()->id);
    		$drivers->avatar = $filename;
    		$drivers->save();
        }

        return redirect('/driverprofile')->with('status', 'Picture Uploded');
    }
}
