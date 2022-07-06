@extends('layouts.admin')

@section('title')
Select Location | MOVUS 
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="/adminsave-locations" method="POST">
          {{ csrf_field() }}

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" name="name" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">From:</label>
                <input type="text" name="fromlocation" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Going:</label>
                <input type="text" name="goinglocation" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Price:</label>
                <input type="text" name="pricelocation" class="form-control" id="recipient-name">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

           <!-- Back to booking -->
                <a href="/adminbooking" class="fas fa-arrow-left"></a> 

          <h5 class="title">Select Location
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table">
              <thead class=" text-primary">
                
                <th>Name</th>
                <th>Price</th>
                <th></th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
              <tbody>
                @foreach ($locations as $data)
                    <tr>
                        
                        <td> {{ $data->fromlocation }} <li class="fas fa-arrow-right" ></li> {{ $data->goinglocation }} </td>
                        <td>{{ $data->pricelocation }}</td>
                        <td>
                          <form action="{{route('admintempOrder', $data->location_id)}}" method="POST">
                            @csrf
                            <button type="submit" class="fas fa-plus-circle"></button>
                          </form>
                        </td>
                        <td>
                          <a href="/adminlocation-edit/{{ $data->location_id }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                          <form action="/adminlocation-delete/{{ $data->location_id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>

          <span class="d-block pl-3 bg-secondary text-white">
            
            Choosen : @if(isset($choice)) {{ $choice->fromlocation }} <li class="fas fa-arrow-right" ></li> {{ $choice->goinglocation }} = {{ $choice->pricelocation }}</li> @endif  <a class=" btn fas fa-check-square" href="/adminpreOrder">  Proceed Order</a>

          </span>

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