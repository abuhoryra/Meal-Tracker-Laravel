@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">
    <h3 class="text-info">All Active Users</h3>
    <br>
   <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Super</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
                @php($count = 0)
           @foreach ($users as $row)
           @php ($count++)
            <tr>
            <th scope="row">{{ $count }}</th>
                <td>{{$row->first_name}}</td>
                <td>{{$row->last_name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td>
                  @if ($row->is_super == 0)
                    <p class="text-danger font-weight-bold">No</p>
                @else
                    <p class="text-success font-weight-bold">Yes</p>
                @endif
              </td>
                <td> <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">
                          @if ($row->is_super == 0)
                          <a class="dropdown-item text-success"  href="{{url('/changeSuper/'. $row->id .'/1')}}">Make Super</a>
                      @else
                          <a class="dropdown-item text-danger"  href="{{url('/changeSuper/'. $row->id .'/0')}}">Remove Super</a>
                      @endif
                      </a>
                      <a class="dropdown-item text-info" href="{{URL('/publicMeal/'. $row->id)}}">Edit Meal</a>
                      {{-- <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                  </div></td>
            </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection