@extends('layouts.driver')

@section('title')
Your Ride | MOVUS
@endsection

@section('content')

<style>

.containers .card{
      position: relative;
      display: flex;
      flex-direction: column;
      max-width: 310px;
      height: 160px;
      background: rgba(255, 255, 255, 0.5);
      margin: 25px 10px;
      padding: 35px 15px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
      transition: 0.3s ease-in-out;
    }
    
    .containers .card:hover{
      height: 320px;
    }
    
    .containers .card .imgBox{
      position: relative;
      width: 100%;
      top: -50px;
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
     border-bottom: 2px solid #04476b;
     }
     td , th{
      padding: 15px 20px;
      text-align: center;
      
     
     }
     th{
      background-color: #04476b;
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
   .btndesign button {
     background: none;
     color: black;
     border: 2px solid #0097e6;
     font-size: 15px;
     border-radius: 4px;
     transition: .6s;
     overflow: hidden;
   }
   .btndesign button:focus{
     outline: none;
   }
   .btndesign button::before{
     content: '';
     display: block;
     background: rgba(255,255,255,.5);
     width: 60px;
     height: 100%;
     left: 0;
     top: 0;
     opacity: .5s;
     filter: blur(30px);
     transform: translateX(-130px) skewX(-15deg);
   }
   .btndesign button::after{
     content: '';
     display: block;
     background: rgba(255,255,255,.2);
     width: 30px;
     height: 100%;
     left: 30px;
     top: 0;
     opacity: 0;
     filter: blur(30px);
     transform: translateX(-100px) skewX(-15deg);
   }
   .btndesign button:hover{
     background: #0097e6;
     cursor: pointer;
   }
   .btndesign button:hover:before {
     transform: translateX(300px) skewX(-15deg);
     opacity: .6s;
     transition: .7s;
   }
   .btndesign button:hover:after {
     transform: translateX(300px) skewX(-15deg);
     opacity: 1;
     transition: .7s;
   }
 </style>

@php
use App\Order;
use App\Customer;

    $countOrders = Order::where('driver_id', '=', Auth()->user()->id)->count();
@endphp
@if( $countOrders >= 1)

<?php


    $avatar = Customer::where('name', '=', $orders->customer_name)->first('avatar');
    $avatar = substr($avatar, 11, -2);

    $gender = Customer::where('name', '=', $orders->customer_name)->first('gender');
    $gender = substr($gender, 11, -2);

    $matric = Customer::where('name', '=', $orders->customer_name)->first('matric');
    $matric = substr($matric, 11, -2);

    $phone = Customer::where('name', '=', $orders->customer_name)->first('phone');
    $phone = substr($phone, 10, -2);

    $email = Customer::where('name', '=', $orders->customer_name)->first('email');
    $email = substr($email, 10, -2);

    $faculty = Customer::where('name', '=', $orders->customer_name)->first('faculty');
    $faculty = substr($faculty, 12, -2);

?>
<section class="content">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Your Rides</h4>

        </div>
  <section class="panel panel-default">
      <div class="container">
          <div class="table-responsive">
              <table class="table table-striped m-b-none text-center">
                  <thead>
                      <tr>
                          <th>Booking ID</th>
                          <th>Order Status</th>
                          <th>Arrived</th>
                          <th>Destination</th>
                          <th>Payment</th>
                          <th>Complete</th>
                      </tr>
                  </thead>

                  <tbody>
                      @if($orders->complete != 'Ride Complete')
                      @if($orders->count() >= 1)
                        <tr>
                            <td>{{ $orders->order_id }}</td>
                            <td>{{ $orders->order_status }}</td>
                            <td>
                                @if($orders->pickup == '')
                                <form action="/pick/{{$orders->order_id }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="btndesign">
                                    <button type="submit" >Pickup</button>
                                    </div>
                                </form>
                                @else
                                {{ $orders->pickup }}
                                @endif
                            </td>
                            <td>
                                @if($orders->dropoff == '')
                                <form action="/dropoff/{{$orders->order_id}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="btndesign">
                                    <button type="submit" >Dropoff</button>
                                    </div>
                                </form>
                                @else
                                {{ $orders->dropoff }}
                                @endif
                            </td>
                            <td>
                                @if($orders->payment == 'unpaid')
                                <form action="/payment/{{$orders->order_id }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="btndesign">
                                    <button type="submit" >Unpaid</button>
                                    </div>
                                </form>
                                @else
                                {{ $orders->payment }}
                                @endif
                            </td>
                            <td>
                                @if($orders->complete == '')
                                <form action="/complete/{{$orders->order_id }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="btndesign">
                                    <button type="submit" >Complete</button>
                                    </div>
                                </form>
                                @else
                                {{ $orders->complete}}
                                @endif
                            </td>
                        </tr>
                        @else
                        <h2>No Orders Available</h2>
                        @endif

                        @endif
                  </tbody>
                  @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
              </table>
          </div>

          {{-- Customer Info --}}
          @if($orders->complete != 'Ride Complete')
          @if($orders->count() >= 1)

              <div class="row justify-content-center">
                  <div class="col-4">
                    <div class="title">Customer Info</div><hr>
                    <div class="containers">
                      <div class="card">
                          <div class="imgBox">
                            <img src="/uploads/avatars/{{$avatar}}">
                          </div>
                            <div class="content">
                              <h5>{{ $orders->customer_name }}, {{$gender}}</h5>
                                  <div class="text-left">
                                    <ul class="fa-ul text-muted">
                                      <li><span class="fa-li "><i class="fas fa-id-card"></i></span> ID: {{$matric}}</li>
                                      <li><span class="fa-li"><i class="fas fa-phone"></i></span> Phone: {{$phone}}</li>
                                      <li><span class="fa-li"><i class="fas fa-envelope"></i></span> Email: {{$email}}</li>
                                      <li><span class="fa-li"><i class="fas fa-school"></i></span> City: {{$faculty}}</li>
                                    </ul>
                                  </div>
                                  <hr>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <h2>No Orders Available</h2>
                @endif

               @endif
               {{-- End Customer Info --}}

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
                {{-- End Booking Info --}}

              </div>


      </div>
  </section>
      </div>
  </div>
</section>

@else
<br><br><br><h1>GET OUT OF THIS PAGE! Haha.</h1>
@endif

@endsection

@section('scripts')

@endsection
