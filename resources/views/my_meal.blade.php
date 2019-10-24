@extends('layouts.sidebar');
@section('content')
    <div class="container">
        <h3 class="text-primary text-center">Month:<span class="text-success"> @php
            echo date("F");
        @endphp
        </span>
        </h3>
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Lunch</th>
                        <th scope="col">Dinner</th>
                      </tr>
                    </thead>
                    <tbody>
                            @php ($count = 0)
                        @foreach ($meals as $row)
                        @php ($count++)
                        <tr>
                                <th scope="row">{{ $count}}</th>
                                <td>{{date("F j, Y", strtotime($row->date))}}</td>
                                <td>
                                    @if ($row->lunch == 1)
                                        <p class="text-success">Yes</p>
                                    @else
                                        <p class="text-danger">No</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->dinner == 1)
                                       <p class="text-success">Yes</p> 
                                    @else
                                        <p class="text-danger">No</p>
                                    @endif
                                   </td>
                              </tr>  
                        @endforeach
                    </tbody>
                  </table>
    </div>
@endsection