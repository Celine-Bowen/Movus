@extends('layouts.customer')

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
                      <div type="text" class="form-control" placeholder="Username">{{$customers->name}}</div>
                    </div>
                  </div>
                  <div class="col-md-3 px-1">
                    <div class="form-group">
                      <label>ID</label>
                      <div type="text" class="form-control" placeholder="Matric Number">{{ $customers->matric }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <div type="email" class="form-control" placeholder="Email">{{ $customers->email }}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <div type="text" class="form-control" placeholder="Home Address">{{ $customers->address }}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label>Gender</label>
                      <div type="text" class="form-control" placeholder="Gender">{{ $customers->gender }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 px-1">
                    <div class="form-group">
                      <label>No. Phone</label>
                      <div type="text" class="form-control" placeholder="Phone">{{ $customers->phone }}</div>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>City</label>
                      <div type="text" class="form-control" placeholder="Faculty">{{ $customers->faculty }}</div>
                    </div>
                  </div>
                </div>
                <a href="{{ url('profile-edit/'.$customers->customer_id) }}"  class="btn btn-sm btn-success float-right">Edit</a>
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
                <img class="avatar border-gray" src="/uploads/avatars/{{ $customers->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                <h5>{{ $customers->name }}'s Profile,</h5>{{ $customers->gender }}
              </a>
              <hr>
              <div class="text-left ml-5 pt-2">
                <ul class="fa-ul text-muted">
                    <li><span class="fa-li "><i class="fas fa-id-card"></i></span> ID: {{ $customers->matric }}</li>
                    <li><span class="fa-li"><i class="fas fa-phone"></i></span> Phone: {{ $customers->phone }}</li>
                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span> Email: {{ $customers->email }}</li>
                    <li><span class="fa-li"><i class="fas fa-school"></i></span> City: {{ $customers->faculty }}</li>
                </ul>
              </div>
            </div><hr>
          </div>
        </div>
      </div>

    </div>

  </div>

@endsection

@section('scripts')

@endsection