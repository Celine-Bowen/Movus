@extends('layouts.customer')

@section('title')
Ride | MOVUS
@endsection
<meta http-equiv="refresh" content="25"/>
@section('content')

<style>

.containers .card{
      position: relative;
      display: flex;
      flex-direction: column;
      max-width: 500px;
      height: 160px;
      background: rgba(255, 255, 255, 0.5);
      margin: 25px 10px;
      padding: 20px 15px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
      transition: 0.3s ease-in-out;
    }
    
    .containers .card:hover{
      height: 400px;
    }
    
    .containers .card .imgBox{
      position: relative;
      width: 50%;
      height: 150px;;
      top: -50px;
      left: 120px;
      border-radius: 7px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }
    
    .containers .card .imgBox img{
      width:280px;
      position: relative;
      height: 150px;
      max-width: 100%;
      border-radius: 7px;
    }
    
    .containers .card .content{
      position: relative;
      margin-top: -140px;
      padding: 10px 15px;
      text-align: center;
      visibility: hidden;
      opacity: 0;
    }
    
    .containers .card:hover .content{
      visibility: visible;
      opacity: 1;
      margin-top: -40px;
      transition-delay: 0.3s;
    }

  table{
     border-collapse: collapse;
     border-spacing: 0;
     box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
     border-radius: 12px 12px 0 0;
     overflow: hidden;
     font-size: 13px;
    }

    tbody tr:last-of-type {
    border-bottom: 2px solid rgb(230, 84, 84);
    }
  td , th{
   padding: 15px 20px;
   text-align: center;
   
  
  }
  th{
   background-color:  rgb(230, 84, 84);
   color: #fafafa;
   font-family: 'Open Sans',Sans-serif;
   font-weight: 100;
   text-transform: uppercase;
  
  }
  tr{
   width: 100%;
   background-color: #fafafa;
   font-family: 'Montserrat', sans-serif;
  }
  tr:nth-child(even){
   background-color: #eeeeee;
  }
  </style>

@php
use App\Order;
use App\Driver;

$countOrders = Order::where('customer_id', '=', Auth()->user()->id)->count();
@endphp

@if( $countOrders >= 1)

<?php

    $car_name = Driver::where('name', '=', $orders->driver_name )->first('car_name');
    $car_name = substr($car_name, 13, -2);

    $car_number = Driver::where('name', '=', $orders->driver_name)->first('car_number');
    $car_number = substr($car_number, 15, -2);

    $car_type = Driver::where('name', '=', $orders->driver_name)->first('car_type');
    $car_type = substr($car_type, 13, -2);

    $car_colour = Driver::where('name', '=', $orders->driver_name)->first('car_colour');
    $car_colour = substr($car_colour, 15, -2);

    $avatar = Driver::where('name', '=', $orders->driver_name)->first('avatar');
    $avatar = substr($avatar, 11, -2);

    $gender = Driver::where('name', '=', $orders->driver_name)->first('gender');
    $gender = substr($gender, 11, -2);

    $matric = Driver::where('name', '=', $orders->driver_name)->first('matric');
    $matric = substr($matric, 11, -2);

    $phone = Driver::where('name', '=', $orders->driver_name)->first('phone');
    $phone = substr($phone, 10, -2);

    $email = Driver::where('name', '=', $orders->driver_name)->first('email');
    $email = substr($email, 10, -2);

    $faculty = Driver::where('name', '=', $orders->driver_name)->first('faculty');
    $faculty = substr($faculty, 12, -2);

?>

<!-- Driver Info -->
{{-- <div class="modal fade" id="driverinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Driver Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="author">
            <a>
              <img class="avatar border-gray" src="/uploads/avatars/{{ $avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
              <h5>{{$orders->driver_name}},</h5>{{ $gender }}
            </a>
            <hr>
            <div class="text-left ml-5 pt-2">
              <ul class="fa-ul text-muted">
                  <li><span class="fa-li "><i class="fas fa-id-card"></i></span> ID: {{ $id }}</li>
                  <li><span class="fa-li"><i class="fas fa-phone"></i></span> Phone: {{ $phone }}</li>
                  <li><span class="fa-li"><i class="fas fa-envelope"></i></span> Email: {{ $email }}</li>
                  <li><span class="fa-li"><i class="fas fa-school"></i></span> Faculty: {{ $faculty }}</li>
              </ul>
            </div>
        </div><hr>
            <div class="title">Car Information</div><br>
                <ul class="pl-4 fa-ul text-muted">
                  <li><span class="fa-li"><i class="far fa-id-badge"></i></span> Car Name: {{ $car_name }}</li>
                  <li><span class="fa-li"><i class="far fa-registered"></i></span> Car Number: {{ $car_number }}</li>
                  <li><span class="fa-li"><i class="fas fa-car-side"></i></span> Car Type: {{ $car_type }}</li>
                  <li><span class="fa-li"><i class="fas fa-palette"></i></span> Car Colour: {{ $car_colour }}</li>
                </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> --}}
<!-- End Driver Info -->




<section class="content">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"> Your Rides</h5>
        </div>
  <section class="panel panel-default">
      <div class="container">
          <div class="table-responsive">
              <table class="table table-striped m-b-none text-center">
                  <thead>
                      <tr>
                          <th>Booking ID</th>
                          <th>Order Status</th>
                          {{-- <th>Driver Info</th> --}}
                          <th>Driver Arrived</th>
                          <th>Your Destination</th>
                          <th>Payment</th>
                          <th>Complete</th>
                          @if($orders->order_status != 'accepted')
                          <th>
                              Cancel Booking
                          </th>
                          @endif
                          <th></th>
                      </tr>
                  </thead>

                  <tbody>
                    @if($orders->complete != 'Ride Complete')
                      @if( $orders->order_status != 'rejected' )
                          <tr>
                              <td>{{ $orders->order_id }}</td>
                              <td>{{ $orders->order_status }}</td>
                              {{-- <td>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#driverinfo">
                                    {{ $orders->driver_name }}
                                  </button>
                              </td> --}}
                              <td>
                                  @if($orders->pickup != '')
                                    Arrived
                                  @endif
                              </td>
                              <td>
                                @if($orders->dropoff != '')
                                Your Destination
                              @endif
                              </td>
                              <td>
                                @if($orders->payment != 'unpaid')
                                Paid
                                @else
                                {{$orders->payment}}
                              @endif
                              </td>
                              <td>
                                @if($orders->complete != '')
                                    Ride Complete
                                @endif
                              </td>
                              <td>
                                  @if($orders->order_status != 'accepted')
                                  <form class="pt-1" action="/booking-delete/{{ $orders->order_id }}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times" ></i></button>
                                  </form>
                                  @endif
                              </td>
                          </tr>
                          @endif
                          @endif
                  </tbody>
              </table>
          </div>

          {{-- Booking Info --}}
          <div class="row justify-content-center">

            <div class="col-md-6">
              {{-- Driver Info --}}
              @if($orders->complete != 'Ride Complete')
              @if($orders->count() >= 1)

                  <div class="containers">
                    <div class="card">
                        <div class="imgBox">
                          <img class="avatar border-gray" src="/uploads/avatars/{{$avatar}}">
                        </div>
                          <div class="content">
                            <h5>{{ $orders->driver_name }}, {{$gender}}</h5>
                            <div class="row">
                              <div class="col-md-6">
                                {{-- Card Driver info --}}
                                <div class="card-header title">Driver Info</div><hr>
                                <div class="row">
                                    <ul class="pl-4 fa-ul text-muted">
                                      <li><span class="fa-li "><i class="fas fa-id-card"></i></span> ID: {{ $id }}</li>
                                      <li><span class="fa-li"><i class="fas fa-phone"></i></span> Phone: {{ $phone }}</li>
                                      <li><span class="fa-li"><i class="fas fa-school"></i></span> City: {{ $city }}</li>
                                    </ul>
                                </div>
                                {{-- End Card Driver info --}}
                              </div>
                              <div class="col-md-6">
                                {{-- Card Car info --}}
                                            
                                <div class="card-header title">Car Information</div><hr>
                                <div class="row">
                                    <ul class="pl-4 fa-ul text-muted">
                                      <li><span class="fa-li"><i class="far fa-id-badge"></i></span> Car Name: {{ $car_name }}</li>
                                      <li><span class="fa-li"><i class="far fa-registered"></i></span> Car Number: {{ $car_number }}</li>
                                      <li><span class="fa-li"><i class="fas fa-car-side"></i></span> Car Type: {{ $car_type }}</li>
                                      <li><span class="fa-li"><i class="fas fa-palette"></i></span> Car Colour: {{ $car_colour }}</li>
                                    </ul>
                                </div>
                                {{-- End Card Car info --}}
                              </div>
                            </div>
                            
                                <hr>
                          </div>
                      </div>
                  </div>

              @else
                <h2>No Orders Available</h2>
              @endif

              @endif
              {{-- End Driver Info --}}
            </div>

            {{-- Booking Info --}}
            <div class="col-md-6">
              <div class="table-responsive">
                @if($orders->complete != 'Ride Complete')
                <div class="title">Locations</div><hr>
                <table class="table table-striped m-b-none text-center">
                  <thead>
                      <tr>
                          <th>Pickup</th>
                          <th>Drop</th>
                          <th>Price</th>
                          <th>Note</th>
                      </tr>
                      @endif
                  </thead>

                  <tbody>
                    @if($orders->complete != 'Ride Complete')
                    @if($orders->count() >= 1)
                        <tr>
                          <td>{{$orders->from}}</td>
                            <td>{{$orders->going}}</td>
                            <td>{{$orders->price}}</td>
                            <td>{{$orders->note}}</td>
                        </tr>
                        @else
                      <h2>No Orders Available</h2>
                      @endif

                      @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          {{-- End Booking Info --}}

      </div>
  </section>
      </div>
  </div>
</section>

@else
<br><br><br><h1>Let's get you booking.</h1>
@endif

@endsection

@section('scripts')

@endsection
