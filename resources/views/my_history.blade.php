@extends('layouts.sidebar')
@section('content')

<style>

body{
    background: #000;
}
.col-md-3{
    
    float: none;
    margin: 0 auto;
    height: 700px;
}
.c1{
    background: linear-gradient(to bottom, #009933 0%, #66ff66 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 15px #00cc66;
   
}

.col-md-3:hover{
   
   margin-top: 2%;
   transition:all 1s linear;
}

.c2{
    background: linear-gradient(to bottom, #0066ff 0%, #33ccff 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 15px #0073e6;
}

.c3{
    background: linear-gradient(to bottom, #ff0066 0%, #ff66cc 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 15px #ff3385;
}
</style>
    <div class="container-fluid">
        <div class="row" style="">
            <div class="col-md-3 c1">
                <br>
               <h3 class="text-center text-white">Account</h3>
            </div>
            <div class="col-md-3 c2">
                <br>
               <h3 class="text-center text-white">Total Meal</h3>
            </div>
            <div class="col-md-3 c3">
                <br>
                <h3 class="text-center text-white">My Profile</h3>
            </div>
        </div>
    </div>
@endsection