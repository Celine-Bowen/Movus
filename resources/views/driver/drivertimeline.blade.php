@extends('layouts.driver')

@section('title')
Order | MOVUS
@endsection
<meta http-equiv="refresh" content="25"/>
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

<!-- Order Info -->
<div class="modal fade" id="orderinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="author">

              @foreach ($orders as $order)
                <div class="class-form">
                  <label>Pickup:</label> {{ $order->from }}
                </div>
                <div class="class-form">
                  <label>Drop:</label> {{ $order->going }}
                </div>
                <div class="class-form">
                  <label>Price:</label> {{ $order->price }}
                </div>
                <div class="class-form">
                  <label>Time:</label> {{ $order->time }}
                </div>
                <div class="class-form">
                  <label>Date:</label> {{ $order->date }}
                </div>
                <div class="class-form">
                  <label>Notes:</label> {{ $order->note }}
                </div>
              @endforeach

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- End Order Info -->

<section class="content">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"> Your Orders</h5>

        </div>
  <section class="panel panel-default">
      <div class="container">
          <div class="table-responsive">
              <table class="table table-striped m-b-none text-center">
                  <thead>
                      <tr>
                          <th>Booking ID</th>
                          <th>Order Status</th>
                          <th>Action Status</th>
                          <th>Customer Name</th>
                          <th>Pickup</th>
                          <th>Drop</th>
                          <th>Payment</th>
                          <th>Complete</th>
                          <th></th>
                      </tr>
                  </thead>

                  <tbody>
                      @if($orders->count() >= 1)
                       @foreach ($orders as $order)
                        <tr>
                            <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#orderinfo">
                                {{ $order->order_id }}
                              </button></td>
                            <td>{{ $order->order_status }}</td>
                            <td>
                                {!!Form::open(['action' => ['Driver\DashboardController@actionstatus', $order->order_id], 'method' => 'GET'])!!}
                                {{ csrf_field() }}
                                {{-- <form action="/actionstatus/{{$order->order_id }}" method="POST"> --}}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="status" value="accepted">
                                    <input type="hidden" name="driver_name" value="{{ Auth()->user()->name }}">
                                    <div class="btndesign">
                                    {{Form::hidden('_method', 'PUT')}}
                                    {{Form::submit('Accept', ['class' => 'btn btn-success'])}}
                                    {{-- <button type="submit" >Accept</button> --}}
                                    </div>
                                    {!!Form::close()!!}
                                {{-- </form> --}}
                            </td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->pickup }}</td>
                            <td>{{ $order->dropoff }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>{{ $order->complete }}</td>
                            <td>
                                <form class="pt-1" action="/booking-delete/{{ $order->order_id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times" ></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <h2>No Orders Available</h2>
                        @endif
                  </tbody>
                  @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
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
