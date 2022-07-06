@extends('layouts.driver')

@section('title')
Profile | MOVUS 
@endsection

@section('content')

<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Profile</h5>
          </div>
          <div class="card-body">

              <form>
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-5 pr-1">
                    <div class="form-group">
                      <label>Username</label>
                      <div type="text" class="form-control" placeholder="Username">{{$drivers->name}}</div>
                    </div>
                  </div>
                  <div class="col-md-3 px-1">
                    <div class="form-group">
                      <label>ID</label>
                      <div type="text" class="form-control" placeholder="Matric Number">{{ $drivers->matric }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <div type="email" class="form-control" placeholder="Email">{{ $drivers->email }}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <div type="text" class="form-control" placeholder="Home Address">{{ $drivers->address }}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label>Gender</label>
                      <div type="text" class="form-control" placeholder="Gender">{{ $drivers->gender }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 px-1">
                    <div class="form-group">
                      <label>No. Phone</label>
                      <div type="text" class="form-control" placeholder="Phone">{{ $drivers->phone }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>City</label>
                      <div type="text" class="form-control" placeholder="Faculty">{{ $drivers->faculty }}</div>
                    </div>
                  </div>
                </div>
                <div class="card-header title">Car Information</div><br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Car Name</label>
                      <div type="text" class="form-control" placeholder="Car Name">{{ $drivers->car_name }}</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Car Number</label>
                      <div type="text" class="form-control" placeholder="Car Number">{{ $drivers->car_number }}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Car Type</label>
                      <div type="text" class="form-control" placeholder="Car Type">{{ $drivers->car_type }}</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Car Colour</label>
                      <div type="text" class="form-control" placeholder="Car Colour">{{ $drivers->car_colour }}</div>
                    </div>
                  </div>
                </div>
                <a href="{{ url('driverprofile-edit/'.$drivers->driver_id) }}"  class="btn btn-sm btn-success float-right">Edit</a>
              </form> 
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="../assets/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a>
                <img class="avatar border-gray" src="/uploads/avatars/{{ $drivers->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                <h5>{{ $drivers->name }}'s Profile,</h5>{{ $drivers->gender }}
              </a>
              <hr>
              <div class="text-left ml-5 pt-2">
                <ul class="fa-ul text-muted">
                    <li><span class="fa-li "><i class="fas fa-id-card"></i></span> ID: {{ $drivers->matric }}</li>
                    <li><span class="fa-li"><i class="fas fa-phone"></i></span> Phone: {{ $drivers->phone }}</li>
                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span> Email: {{ $drivers->email }}</li>
                    <li><span class="fa-li"><i class="fas fa-school"></i></span> City: {{ $drivers->faculty }}</li>
                </ul>
              </div>
            </div><hr>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Card Car info --}}

  {{-- <div class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header title">Car Information</div><hr>
          <div class="card-body">
            <div class="row"> 
                <ul class="pl-4 fa-ul text-muted">
                  <li><span class="fa-li"><i class="far fa-id-badge"></i></span> Car Name: {{ $drivers->car_name }}</li>
                  <li><span class="fa-li"><i class="far fa-registered"></i></span> Car Number: {{ $drivers->car_number }}</li>
                  <li><span class="fa-li"><i class="fas fa-car-side"></i></span> Car Type: {{ $drivers->car_type }}</li>
                  <li><span class="fa-li"><i class="fas fa-palette"></i></span> Car Colour: {{ $drivers->car_colour }}</li>
                </ul>
            </div>
          </div>
        </div>
    </div> --}}

  {{-- End Card Car info --}}

@endsection

@section('scripts')

@endsection