@extends('layouts.admin')


@section('title')
    Registered Role | MOVUS
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title" >Registered Role</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table id="datatable" class="table">
                        <thead class=" text-primary">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Usertype</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->usertype }}</td>
                                    <td>
                                        <a href="/role-edit/{{ $data->id }}" class="btn btn-sm btn-warning">EDIT</a>
                                        <form class="pt-1" action="/role-delete/{{ $data->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to DELETE this user?')">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
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
