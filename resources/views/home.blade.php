@extends('layouts.sidebar')

@section('content')
<div class="container-fluid">
<h3 class="text-success text-center font-weight-bold">{{ date('F')}}</h3>
@php
    $total_meal = $total->total;
    $sum_money = $total_money->total_taka;

    $meal_rate = round($sum_money/$total_meal, 2);

@endphp
<h4 class="text-center font-weight-bold">[ Meal Rate: <span class="text-danger">{{$meal_rate}}</span> ]</h4>
<hr>
    <div class="row">
        <div class="col-md-4">
                <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Total Meal</th>
                          </tr>
                        </thead>
                        <tbody>
                                @php ($count = 0) 
                @foreach ($data as $row)
                @php ($count++)
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td class="text-success font-weight-bold">{{$row->first_name.' '.$row->last_name}}</td>
                    <td class="text-danger font-weight-bold text-center">{{$row->meal}}</td>
                  </tr>
                 @endforeach
                 <tr>
                     <td colspan="2"></td>
                     <td class="text-center text-primary font-weight-bold" colspan="">{{$total->total}}</td>
                     
                 </tr>
                     
                        </tbody>
                      </table>
        </div>
        <div class="col-md-4">
                <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Total Money</th>
                          </tr>
                        </thead>
                        <tbody>
                                @php ($count = 0) 
                @foreach ($money as $row)
                @php ($count++)
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td class="text-success font-weight-bold">{{$row->first_name.' '.$row->last_name}}</td>
                    <td class="text-danger font-weight-bold text-center taka" id="">{{$row->taka}}</td>
                  </tr>
                 @endforeach
                 <tr>
                     <td colspan="2"></td>
                     <td class="text-center text-primary font-weight-bold " colspan="">{{$total_money->total_taka}}</td>
                     
                 </tr>
                     
                        </tbody>
                      </table>
        </div>

        <div class="col-md-4">
                <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Total Due/Paid</th>
                          </tr>
                        </thead>
                        <tbody>
                                @php ($count = 0) 
                @foreach ($data as $row)           
                <?php
                $m = $row->meal;
               $cal = $m*$meal_rate;
                ?>
                @php ($count++)
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td class="text-success font-weight-bold">{{$row->first_name.' '.$row->last_name}}</td>
                    <td class="text-danger font-weight-bold text-center com">{{$cal}} <span class="cal"></span></td>
                  </tr>
                  @endforeach
                 {{-- <tr>
                     <td colspan="2"></td>
                     <td class="text-center text-primary font-weight-bold" colspan="">{{$total->total}}</td>
                     
                 </tr> --}}
                     
                        </tbody>
                      </table>
        </div>
    </div>
        
   <script>
   var items = [];
   var arr = [];
 $('.taka').each(function(){
    items.push( $(this).text() ); 
 });
 
 $('.com').each(function(){
    arr.push( $(this).text() ); 
 });   
 var x = items.map(function(item, index) {
  
  return item - arr[index];
})

    

    
 
   </script>
</div>

@endsection
