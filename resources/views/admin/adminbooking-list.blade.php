@extends('layouts.admin')

@section('title')
Booking List | MOVUS 
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

    <section class="content">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"> All Booking Data</h5>
              </div>
        <section class="panel panel-default">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" id="datatable">
                        <thead>
                            <tr>
                                <th>Booking Info</th>
                                <th>Customer Info</th>
                                <th>Driver Info</th>
                                <th>Order Status</th>
                                <th>Payment</th>
                                <th>Ride</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($orders as $data)
                                <tr>
                                    <td>{{ $data->order_id }}</td>
                                    <td>{{ $data->customer_name }}</td>
                                    <td>{{ $data->driver_name }}</td>
                                    <td>{{ $data->order_status }}</td>
                                    <td>{{ $data->payment }}</td>
                                    <td>{{ $data->complete }}</td>
                                    <td>
                                        <a href="/admininvoice/{{ $data->order_id }}"  class="btn btn-sm btn-icon btn-success"><i class="fa fa-print"></i></a>
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

<script>

document.getElementById("success").onclick = function(){
    
    document.getElementById("success").onclick = bookingdetails.style.backgroundColor = 'green';
    document.getElementById("bookingdetails").innerHTML = "Accepted";
}

document.getElementById("danger").onclick = function(){
    document.getElementById("danger").onclick = bookingdetails.style.backgroundColor = 'red';
    document.getElementById("bookingdetails").innerHTML = "Rejected";
}

</script>

@endsection