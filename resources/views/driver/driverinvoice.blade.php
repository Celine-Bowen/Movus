@extends('layouts.driver')

@section('title')
Invoice | MOVUS 
@endsection


@section('content')

<div class="content">
    @foreach ($orders as $order)

    <div class="row">
      <div class="col-md-12">
        <div class="card">
            
          <div class="card-header">
            <h5 class="title">Invoice
            <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button></h5>
          </div>
          
          <div class="card-body">
            

                <div class="scrollable wrapper m-5" id="print">
                    <h4 class="float-right">INVOICE</h4>
                    <div class="col-sm-12">
                        <div class="row">
                            <div>
                                <h2><b> MOVUS </b>Company</h2>
                                
                                <p>Nairobi,Kenya </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <strong>TO:</strong>
                                <h4>Your ID: {{ $drivers->name }}</h4>
                                <p>
                                     No. Phone: {{ $drivers->phone }}
                                </p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p class="h4">#{{ $order->order_id }}</p>
                                <p>Order Date: <strong>{{ $order->date }}</strong><br>
                                    Order Time: <strong>{{ $order->time }}</strong><br>
                                    Order ID: <strong>{{ $order->order_id }}</strong>
                                </p>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-sm-12 pt-5">
                        <div class="line"></div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="60">NO</th>
                                <th>DESCRIPTION</th>
                                <th width="120">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td> Booking from {{ $order->from }} to {{ $order->going }}</td>
                                <td>Ksh {{ $order->price }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"><strong>Subtotal</strong></td>
                                <td>Ksh {{ $order->price }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right no-border"><strong>TAX Included in Total</strong></td>
                                <td>Ksh.00</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right no-border"><strong>Total</strong></td>
                                <td><strong>Ksh {{ $order->price }}</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        
                        <div class="row">
                            <div class="col-xs-8">
                                <p><i> If you have any questions about this invoice, please contact <br> MOVUS Company, celinebowen763@gmail.com</i>
                                <br><strong>Thank You For Booking</strong></p>
                
                                <p>Received By: {{ $drivers->name }} </p>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
          </div>
        </div>
      </div>
    </div>
</div>

 


@endsection