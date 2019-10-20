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
            </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection