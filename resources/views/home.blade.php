{{-- @extends('layouts.app')

@section('content')
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

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

 @extends('layouts.customer')


 @section('title')
     Dashboard | MOVUS
 @endsection


 @section('content')
 @php
 use App\Customer;
 use App\User;
 use Illuminate\Support\Facades\Auth;
 @endphp
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

                     You are logged in as <strong>CUSTOMER!</strong><br><br>
                     @if(DB::table('customers')->where('customer_id', Auth()->user()->id)->doesntExist())
                     Confirm Your Information and click on <strong>Submit!</strong>
                        {!!Form::open(['action' => 'Customer\DashboardController@confirmInfo', 'method' => 'GET'])!!}
                        {{ csrf_field() }}
                        <h4>Name: {{Auth()->user()->name}}</h4>
                        <h4>Email: {{Auth()->user()->email}}</h4>
                        <input type="hidden" name="id" id="id" value="{{Auth::id()}}">
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                        {!!Form::close()!!}
                     </form>
                     @else

                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div>

 @endsection


 @section('scripts')

 @endsection
