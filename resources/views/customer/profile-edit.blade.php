@extends('layouts.customer')

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
          
          <form action="/profile-update/{{ $customers->customer_id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
          <div class="card-body">
              <div class="row">
                <div class="col-md-5 pr-1">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $customers->name }}">
                  </div>
                </div>
                <div class="col-md-3 px-1">
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control"  name="matric" placeholder="ID" value="{{ $customers->matric }}">
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  name="email" placeholder="Email" value="{{ $customers->email }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Home Address" value="{{ $customers->address }}">
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
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ $customers->phone }}">
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
              
              <div class="card-footer">
                <div class="modal-footer">
                    <a href="/profile" class="btn btn-sm btn-secondary m-2">Back</a>
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
              
                <img class="avatar border-gray" src="/uploads/avatars/{{ $customers->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                <h5>{{ $customers->name }}'s Profile</h5>
              
  
              <form enctype="multipart/form-data" action="/profile" method="POST">
                  <label>Update Profile Image</label>
                  <input type="file" name="avatar">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="pull-right btn btn-sm btn-primary">
              </form>
  
          </div>
          
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')

@endsection