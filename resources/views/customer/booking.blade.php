@extends('layouts.customer')

@section('title')
Booking | MOVUS
@endsection
@section('content')


<div class="card">
          <div class="card-header">
            <h5 class="title"> Booking</h5>
          </div>

          <div class="row justify-content-center">

          <div class="col-md-8">

            <!-- Select Location (Price List) -->
            <div class="justify-content-center p-3">
              <div class="card">
                <h4 class=" text-center title"> Book Your Ride</h4>
                <div class="row justify-content-center">
                  <a href="/adminselect-location" type="button" class="btn btn-primary">Select Location</a>
                </div>
                  <div class="card-body">

                  <form action="/save-booking" method="POST">
                    {{ csrf_field() }}

                    <div class="col-sm-12">

                      <div class="row">

                        <div class="col-sm-4">
                          <!-- From -->
                          <div class="form-group">
                            <label>I'm From</label>
                            <input type="text" class="form-control" name="from" @if(isset($custOrder)) value="{{ $custOrder->fromlocation }}" @endif>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <!-- Going -->
                          <div class="form-group">
                            <label>I'm Going to</label>
                            <input type="text" class="form-control" name="going" @if(isset($custOrder)) value="{{ $custOrder->goinglocation }}" @endif>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <!-- Price -->
                          <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" @if(isset($custOrder)) value="{{ $custOrder->pricelocation }}" @endif>
                          </div>
                        </div>

                      </div>

                      <!-- Select Location -->
                      {{-- <label>Select Location</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Choose Your Location" >

                        <div class="input-group-append">
                          <div class="input-group-text">
                            <a href="/adminselect-location" class="fas fa-arrow-right"></a>
                          </div>
                        </div>
                      </div> --}}

                        <!-- I'm From -->
                        {{-- <div class="form-group">
                          <label>I'm From</label>
                            <input class="form-control" name="from" placeholder="Your Location" required>
                        </div> --}}

                        <!-- I'm going to -->
                        {{-- <div class="input-group">
                          <input id=going type="text" name="going" class="form-control" placeholder="I'm going to" >

                          <div class="input-group-append">
                            <div class="input-group-text">
                              <a href="/adminselect-location" class="fas fa-arrow-right"></a>
                            </div>
                          </div>
                        </div> --}}

                        <!-- I'm going to -->
                        {{-- <div class="form-group">
                          <label>I'm Going to</label>
                            <select class="form-control" name="going" >
                              <option>Your Destination</option>
                              <option>KPZ</option>
                              <option>KIY</option>
                              <option>KBH</option>
                              <option>KUO</option>
                              <option>KAB</option>
                            </select>
                        </div> --}}

                    </div>

                    <div class="col-sm-12">
                        <div class="row">

                          <div class="col-sm-4">
                            <!-- Date -->
                            <div class="form-group">
                              <label>Booking Date</label>
                              <input type="date" class="form-control" name="date" required>
                            </div>
                          </div>

                          <div class="col-sm-4">
                            <!-- Time -->
                            <div class="form-group">
                              <label>Booking Time</label>
                              <input type="time" class="form-control" name="time" required>
                            </div>
                          </div>

                          <div class="col-sm-4">
                            <!-- Cash -->
                              <div class="form-group">
                                  <label for="exampleFormControlSelect1">Payment Option</label>
                                  <select class="form-control" name="payment_option" required>
                                    <option>Cash</option>
                                    <option>Credit/Debit Card -Not Available</option>
                                  </select>
                              </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <!-- Notes -->
                          <div class="form-group">
                            <label>Notes</label>
                            <textarea class="form-control" name="note" placeholder="Notes to Your Driver" required></textarea>
                          </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                      <button type="submit" class="btn btn-block btn-success btn-lg" enabled>Request Now</button>
                    </div>

                  </form>
              </div>
            </div>
            </div>

          </div>

        </div>
      </div>


@endsection


@section('scripts')

@endsection
