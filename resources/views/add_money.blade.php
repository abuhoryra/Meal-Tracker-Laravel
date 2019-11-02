@extends('layouts.sidebar');
@section('content')
    <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
    <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
        {{ session()->get('message') }}
    </div>
@endif
    <form action="{{URL('/savemeal')}}" method="POST">
        @csrf
        <div class="row">
        
            <div class="col-md-2">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select User</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                              <option value="">Select User</option>
                              @foreach ($user as $row)
                            <option value="{{$row->id}}">{{$row->first_name.' '.$row->last_name}}</option>
                              @endforeach
                            </select>
                    </div>
            </div>
            <div class="col-md-2">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Month</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="month">
                              <option value="">Select Month</option>
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="Jun">Jun</option>
                              <option value="July">July</option>
                              <option value="August">August</option>
                              <option value="September">September</option>
                              <option value="October">October</option>
                              <option value="November">November</option>
                              <option value="December">December</option>
                            </select>
                    </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Year</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="year">
                          <option value="">Select Year</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                        </select>
                </div>
        </div>
            <div class="col-md-2">
                    <div class="form-group">
                            <label for="formGroupExampleInput">Enter Ammount</label>
                            <input type="number" class="form-control" name="value" id="formGroupExampleInput" placeholder="Ex: 1000">
                    </div>
            </div>
            
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-success" style="margin-top: 30px;">Save</button>
            </div>
        </form>
              
        </div>
    </div>
@endsection