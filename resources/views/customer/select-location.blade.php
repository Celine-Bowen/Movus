@extends('layouts.customer')

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

    }

    tbody tr:last-of-type {
    border-bottom: 2px solid rgb(230, 84, 84);
    }
  td , th{
   padding: 15px 20px;
   text-align: center;
   
  
  }
  th{
   background-color: rgb(230, 84, 84);
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

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

           <!-- Back to booking -->
                <a href="/booking" class="fas fa-arrow-left"></a> 

          <h5 class="title">Select Location</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table">
              <thead class=" text-primary">
                
                <th>Name</th>
                <th>Price</th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($locations as $data)
                    <tr>
                        
                      <td> {{ $data->fromlocation }} <li class="fas fa-arrow-right" ></li> {{ $data->goinglocation }} </td>
                      <td> {{ $data->pricelocation }}</td>
                        <td>
                          <form action="{{route('tempOrder', $data->location_id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn-danger fas fa-plus-circle"></button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>

          <span class="d-block pl-3 bg-secondary text-white">
            
              Choosen : @if(isset($choice)) {{ $choice->fromlocation }} <li class="fas fa-arrow-right" ></li> {{ $choice->goinglocation }} = {{ $choice->pricelocation }}</li> @endif  <a class=" btn fas fa-check-square" href="/preOrder">  Proceed Order</a>

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