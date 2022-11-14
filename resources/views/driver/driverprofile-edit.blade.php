@extends('layouts.driver')

@section('title')
Edit-Profile | MOVUS 
@endsection



@section('content')


<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Edit Profile Information</h5>
          </div>
          
          <form action="/driverprofile-update/{{ $drivers->driver_id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
          <div class="card-body">
              <div class="row">
                <div class="col-md-5 pr-1">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $drivers->name }}">
                  </div>
                </div>
                <div class="col-md-3 px-1">
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control"  name="matric" placeholder="ID" value="{{ $drivers->matric }}">
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  name="email" placeholder="Email" value="{{ $drivers->email }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Home Address" value="{{ $drivers->address }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                      <label>No. Phone</label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ $drivers->phone }}">
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label>City</label>
                    <select name="faculty" class="form-control">
                        <option value=""></option>
                        <option value="Nairobi">Nairobi</option>
                        <option value="Nakuru">Nakuru</option>
                        <option value="Mombasa">Mombasa</option>
                        <option value="Kisumu">Kisumu</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-header title">Car Information</div><br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Car Name</label>
                    <input type="text" class="form-control" name="car_name" placeholder="Car Name" value="{{ $drivers->car_name }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Car Number</label>
                    <input type="text" class="form-control" name="car_number" placeholder="Car Number" value="{{ $drivers->car_number }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Car Type</label>
                    <select name="car_type" class="form-control">
                      <option value=""> Type of Car</option>
                      <option value="four">Pickup</option>
                      <option value="six">Truck</option>
                    </select>                  
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Car Colour</label>
                    <input type="text" class="form-control" name="car_colour" placeholder="Car Colour" value="{{ $drivers->car_colour }}">
                  </div>
                </div>
              </div>
              
              <div class="card-footer">
                <div class="modal-footer">
                    <a href="/driverprofile" class="btn btn-sm btn-secondary m-2">Back</a>
                  <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
              </div>

          </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="../assets/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              
                <img class="avatar border-gray" src="/uploads/avatars/{{ $drivers->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                <h5>{{ $drivers->name }}'s Profile</h5>
              
  
              <form enctype="multipart/form-data" action="/driverprofile" method="POST">
                  <label>Update Profile Image</label>
                  <input type="file" name="avatar">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="pull-right btn btn-sm btn-primary">Submit</button>
              </form>
  
          </div>
          
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')

@endsection