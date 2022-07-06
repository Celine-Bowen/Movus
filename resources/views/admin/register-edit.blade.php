@extends('layouts.admin')


@section('title')
    Edit-Registered Role | MOVUS
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Registered Role</h5>
                </div>
                <div class="card-body">
                   <div class="row justify-content-center">
                       <div class="col-md-8">
                        <form action="/role-register-update/{{ $users->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $users->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Give Role</label>
                                <select name="usertype" class="form-control">
                                    <option value="">None</option>
                                    <option value="customer">Customer</option>
                                    <option value="driver">Driver</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success float-right">Update</button>
                            <a href="/role-register" class="btn btn-sm float-right">Cancel</a>
                            
                       </form>
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