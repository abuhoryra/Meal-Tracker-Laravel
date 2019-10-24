@extends('layouts.sidebar')
@section('content')
    <div class="container">
        @if ($meal)
        <div class="alert alert-danger text-center" role="alert">
                You Already Entered Today's Meal! <strong>Thank You</strong>
              </div>
        @else
        <div class="card">
                <h5 class="card-header text-center text-danger"><span style="color:green;">Current Date: </span>
                    @php
                    echo Date('Y-m-d');
                @endphp</h5>
                <div class="card-body">
                        <h5 class="card-title">Add Your Todays's Meal Here</h5>
                        <br>
                <form action="{{ URL('/saveMeal') }}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                                <div style="float: left">
                                        <div class="form-check">
                                                <h5>Lunch</h5>
                                                <input class="form-check-input" type="radio" name="lunch" id="exampleRadios1" value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                  Yes
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lunch" id="exampleRadios2" value="0">
                                                <label class="form-check-label" for="exampleRadios2">
                                                  No
                                                </label>
                                              </div>
                                </div>
                                <div style="float: right">
                                        <div class="form-check">
                                                <h5>Dinner</h5>
                                                <input class="form-check-input" type="radio" name="dinner" id="exampleRadios1" value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                  Yes
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dinner" id="exampleRadios2" value="0">
                                                <label class="form-check-label" for="exampleRadios2">
                                                  No
                                                </label>
                                              </div>
                                </div>
                                    
                        </div>
    
                       
                    </div>
                    <br>
                    <button class="btn btn-outline-success btn-sm">Submit</button>
                        
                </form>
                </div>
              </div> 
        @endif
       
    </div>
@endsection