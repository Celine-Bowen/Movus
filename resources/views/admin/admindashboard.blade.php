@extends('layouts.admin')


@section('title')
    Dashboard | MOVUS
@endsection

<style>

.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 17px;
    top: 15px;
    transition: all .3s linear;
}

</style>

@section('content')

<?php

use App\Customer;
use App\Driver;
use App\Order;
use App\Charts\AdminChart;

$customer = Customer::all()->count();
$driver = Driver::all()->count();
$order = Order::all()->count();



?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>ADMIN!</strong>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-4">
                <div class="card p-1">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner p-2">
                        <h3><?php
                            echo $customer;
                          ?></h3>
        
                        <p>Registered Customer</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-alt"></i>
                        </div>
                        <a href="/customer-info" class="d-block p-2 bg-secondary text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4">
                <div class="card p-1">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner p-2">
                        <h3><?php
                            echo $driver;
                          ?></h3>
        
                        <p>Registered Driver</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-alt"></i>
                        </div>
                        <a href="/driver-info" class="d-block p-2 bg-secondary text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4">
                <div class="card p-1">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner p-2">
                        <h3><?php
                            echo $order;
                          ?></h3>
        
                        <p>Total Booking</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-car-side"></i>
                        </div>
                        <a href="/adminbooking-list" class="d-block p-2 bg-secondary text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            {{-- <div class="col-lg-3 col-6">
                <div class="card p-1">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner p-2">
                        <h3>65</h3>
        
                        <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="d-block p-2 bg-secondary text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div> --}}
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-7">
                    <div class="card pl-2 pr-2 pb-2">
                        <div class="card-header">
                            <h4 class="card-title"> Latest Order</h4>
                          </div>
                        <div class="table-responsive">
                            <table class="table table-striped m-b-none" id="datatable1">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Location</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->from }} <li class="fas fa-arrow-right" ></li> {{ $order->going }} </td>
                                            <td>{{ $order->order_status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card p-3">
                        <div class="table-responsive">
                            <table class="table table-striped m-b-none" id="datatable2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td>
                                                @if ($user->isOnline())
                                                    <li class="text-success" >Online</li>
                                                @else
                                                    <li class="text-danger" >Offline</li> 
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        

    </div>


</div>

@endsection


@section('scripts')

<script>
    $(document).ready( function () {
    $('#datatable1').DataTable();
} );
</script>

<script>
    $(document).ready( function () {
    $('#datatable2').DataTable();
} );
</script>
    
@endsection