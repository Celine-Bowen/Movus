@extends('layouts.admin')

@section('title')
Edit-Location | MOVUS 
@endsection



@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Locations</h4>

                    <form action="{{ url('adminlocation-update/'.$locations->location_id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
              
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $locations->name }}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">From:</label>
                                <input type="text" name="fromlocation" class="form-control" value="{{ $locations->fromlocation }}">
                              </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Going:</label>
                              <input type="text" name="goinglocation" class="form-control" value="{{ $locations->goinglocation }}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Price:</label>
                                <input type="text" name="pricelocation" class="form-control" value="{{ $locations->pricelocation }}">
                              </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('adminselect-location') }}" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


@endsection




@section('scripts')
    
@endsection