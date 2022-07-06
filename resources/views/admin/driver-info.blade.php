@extends('layouts.admin')

@section('title')
Driver-Info | MOVUS
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

<!-- Car Details -->
{{-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Car Details</h5>
      </div>
      <div class="modal-body">
          @foreach ($drivers as $item)
          <ul class="pl-4 fa-ul text-muted">
            <li><span class="fa-li"><i class="far fa-id-badge"></i></span> Car Name: {{ $item->car_name }}</li>
            <li><span class="fa-li"><i class="far fa-registered"></i></span> Car Number: {{ $item->car_number }}</li>
            <li><span class="fa-li"><i class="fas fa-car-side"></i></span> Car Type: {{ $item->car_type }}</li>
            <li><span class="fa-li"><i class="fas fa-palette"></i></span> Car Colour: {{ $item->car_colour }}</li>
          </ul>
          @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}

<div class="content" >
  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Driver Information
            </h5>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable" class="table">
                <thead class=" text-primary">

                  <th>Name</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>No. Phone</th>
                  <th>Gender</th>
                  <th>City</th>
                  <th>Car Name</th>
                  <th>Car Number</th>
                  <th>Car Seat Type</th>
                  <th>Car Colour</th>
                  <th>Action</th>

                </thead>
                <tbody>
                  @foreach ($drivers as $data)
                      <tr>

                          <td>{{ $data->name }}</td>
                          <td>{{ $data->matric }}</td>
                          <td>{{ $data->email }}</td>
                          <td>{{ $data->address }}</td>
                          <td>{{ $data->phone }}</td>
                          <td>{{ $data->gender }}</td>
                          <td>{{ $data->faculty }}</td>
                          <td>
                            {{-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#staticBackdrop">
                              View Details
                            </button> --}}
                            {{ $data->car_name }}
                          </td>
                          <td>{{ $data->car_number }}</td>
                          <td>{{ $data->car_type }}</td>
                          <td>{{ $data->car_colour }}</td>

                          <td>
                            <a href="/driver-edit/{{ $data->driver_id }}" class="btn btn-sm btn-warning">Edit</a>

                            <form class="pt-1" action="/driver-delete/{{ $data->driver_id }}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to DELETE this Driver?')">Delete</button>
                            </form>
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
  </div>

  @endsection




  @section('scripts')

      <script>
          $(document).ready( function () {
          $('#datatable').DataTable();
      } );
      </script>

  @endsection
