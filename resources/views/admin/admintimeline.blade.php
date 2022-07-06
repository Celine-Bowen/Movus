@extends('layouts.admin')

@section('title')
Ride | MOVUS 
@endsection

@section('content')

<style>
  table{
      border-collapse: collapse;
      border-spacing: 0;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      border-radius: 12px 12px 0 0;
      overflow: hidden;
      font-size: 13px;
     }
     
     tbody tr:last-of-type {
     border-bottom: 2px solid #04880b;
     }
     td , th{
      padding: 15px 20px;
      text-align: center;
      
     
     }
     th{
      background-color: #04880b;
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
     border: 2px solid #04880b;
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

<?php 

// use App\Driver;

//     $car_name = Driver::where('name', '=', $orders->driver_name )->first('car_name');
//     $car_number = Driver::where('name', '=', $orders->driver_name)->first('car_number');
//     $car_type = Driver::where('name', '=', $orders->driver_name)->first('car_type');
//     $car_colour = Driver::where('name', '=', $orders->driver_name)->first('car_colour');

?>

<!-- Driver Info -->
<div class="modal fade" id="driverinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <img class="avatar border-gray" src="/uploads/avatars/" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
              <h5>Name's Profile,</h5>Gender
            </a>
            <hr>
            <div class="text-left ml-5 pt-2">
              <ul class="fa-ul text-muted">
                  <li><span class="fa-li "><i class="fas fa-id-card"></i></span> ID: </li>
                  <li><span class="fa-li"><i class="fas fa-phone"></i></span> Phone: </li>
                  <li><span class="fa-li"><i class="fas fa-envelope"></i></span> Email: </li>
                  <li><span class="fa-li"><i class="fas fa-school"></i></span> City: </li>
              </ul>
            </div>
        </div><hr>
            <div class="title">Car Information</div><br>
                <ul class="pl-4 fa-ul text-muted">
                  {{-- <li><span class="fa-li"><i class="far fa-id-badge"></i></span> Car Name: {{ $car_name }}</li>
                  <li><span class="fa-li"><i class="far fa-registered"></i></span> Car Number: {{ $car_number }}</li>
                  <li><span class="fa-li"><i class="fas fa-car-side"></i></span> Car Type: {{ $car_type }}</li>
                  <li><span class="fa-li"><i class="fas fa-palette"></i></span> Car Colour: {{ $car_colour }}</li> --}}
                </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
                          <th>Driver Info</th>
                          <th>Driver Arrived</th>
                          <th>Your Destination</th>
                          <th>Payment</th>
                          <th>Complete</th>
                          @foreach ($orders as $item)
                          @if($item->order_status != 'accepted')
                          <th>
                              Cancel Booking
                          </th>
                          @endif
                      </tr>
                  </thead>

                  <tbody>
                   
                    @if($item->complete != 'Ride Complete')
                      @if( $item->order_status != 'rejected' )
                     

                          <tr>
                              <td>{{ $item->order_id }}</td>
                              <td>{{ $item->order_status }}</td>
                              <td>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#driverinfo">
                                    {{ $item->driver_name }}
                                  </button>
                              </td>
                              <td>
                                  @if($item->pickup != '')
                                    Arrived
                                  @endif
                              </td>
                              <td>
                                @if($item->dropoff != '')
                                Your Destination
                              @endif
                              </td>
                              <td>
                                @if($item->payment != 'unpaid')
                                Paid
                                @else
                                {{$item->payment}}
                              @endif
                              </td>
                              <td>
                                @if($item->complete != '')
                                    Ride Complete
                                @endif
                              </td>
                              <td>
                                  @if($item->order_status != 'accepted')
                                  <form class="pt-1" action="/booking-delete/{{ $item->order_id }}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times" ></i></button>
                                  </form>
                                  @endif
                              </td>
                          </tr>
                          
                          
                          @endif
                          @endif
                          @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </section>
      </div>
  </div>
</section>

@endsection

@section('scripts')

@endsection