@extends('layouts.driver')

@section('title')
Booking Details | MOVUS 
@endsection


@section('content')

<style>
    table{
     border-collapse: collapse;
     border-spacing: 0;
     box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
     border-radius: 12px 12px 0 0;
     overflow: hidden;

    }

    tbody tr:last-of-type {
    border-bottom: 2px solid #057dbd;
    }
    
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
    </style>

    <section class="content">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"> Booking Details</h5>
              </div>
        <section class="panel panel-default">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped m-b-none text-center" id="datatable">
                        <thead>
                            <tr>
                                <th>Booking Location</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Notes</th>
                                <th>Payment</th>
                                <th>Ride</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->from }} <li class="fas fa-arrow-right" ></li> {{ $order->going }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->time }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->note }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->complete }}</td>
                                    <td>
                                        <a href="/driverinvoice/{{ $order->order_id }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-print" ></i></a>
                                    </td>
                                </tr>
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

<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>

@endsection