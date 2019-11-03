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
    animation-name: example;
    animation-duration: 3s;
    animation-iteration-count: 1;
}
@keyframes example {
  0%   {margin-top: 0;}

  50%  {margin-top: 5%;}

  100% {margin-top: 0;}
}
.c1{
    background: linear-gradient(to bottom, #009933 0%, #66ff66 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 15px #00cc66;
   
}

.col-md-3:hover{
   
    border: 3px dashed black;
   
}

.c2{
    background: linear-gradient(to bottom, #0066ff 0%, #33ccff 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 15px #0073e6;
}

.c3{
    background: linear-gradient(to bottom, #ff0066 0%, #ff66cc 100%);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 15px #ff3385;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

</style>
    <div class="container-fluid">
    <form action="{{URL('/background')}}" method="POST" id="background">
        @csrf
                <div class="custom-control custom-switch" style="float: right;">
                <input type="checkbox" class="custom-control-input toggle" id="customSwitches" value="{{$field->status}}">
                        <label class="custom-control-label text-white tlab" for="customSwitches" id="">Change Background Color</label>
                      </div>
        </form>
           
                  <br>
                  <br>

        <div class="row" style="">
            <div class="col-md-3 col-sm-8 col-xs-12 c1">
                <br>
               <h3 class="text-center text-white">Account</h3>
               <form action="{{URL('/getMoney')}}" method="POST" id="money">
               <div class="row">
               
                       @csrf
                        <div class="col-md-5">
                            <br>
                                <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="text-white font-weight-bold">Select Month</label>
                                        <select class="form-control" id="monthSelect" name="month">
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
                        <div class="col-md-5">
                            <br>
                            <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="text-white font-weight-bold">Select Year</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="year">
                                      <option value="">Select Year</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                      <option value="2021">2021</option>
                                    </select>
                            </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button type="submit" class="btn btn-warning btn-sm" style="margin-top:35px;">Get</button>
                    </div>
            
                   
               </div>
            </form>

                        <h3 class="text-center text-white" id="moneyMonth" style="margin-top: 40%;">{{date("F")}}</h3>
                        <h5 class="text-center font-weight-bold count" id="getMoney">{{ $curr_money}}</h5>
                        <h5 class="text-center text-white font-weight-bold" >Taka</h5>
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12  c2">
                <br>
               <h3 class="text-center text-white">Total Meal</h3>
               <form action="{{URL('/yourMeal')}}" method="POST" id="meal">
                <div class="row">
                
                        @csrf
                         <div class="col-md-5">
                             <br>
                                 <div class="form-group">
                                         <label for="exampleFormControlSelect1" class="text-white font-weight-bold">Select Month</label>
                                         <select class="form-control" id="mmonthSelect" name="mmonth">
                                           <option value="">Select Month</option>
                                           <option value="01">January</option>
                                           <option value="02">February</option>
                                           <option value="03">March</option>
                                           <option value="04">April</option>
                                           <option value="05">May</option>
                                           <option value="06">Jun</option>
                                           <option value="07">July</option>
                                           <option value="08">August</option>
                                           <option value="09">September</option>
                                           <option value="10">October</option>
                                           <option value="11">November</option>
                                           <option value="12">December</option>
                                         </select>
                                 </div>
                         </div>
                         <div class="col-md-5">
                             <br>
                             <div class="form-group">
                                     <label for="exampleFormControlSelect1" class="text-white font-weight-bold">Select Year</label>
                                     <select class="form-control" id="exampleFormControlSelect1" name="myear">
                                       <option value="">Select Year</option>
                                       <option value="2019">2019</option>
                                       <option value="2020">2020</option>
                                       <option value="2021">2021</option>
                                     </select>
                             </div>
                     </div>
                     <div class="col-md-2">
                         <br>
                         <button type="" class="btn btn-warning btn-sm" style="margin-top:35px;">Get</button>
                     </div>
             
                    
                </div>
             </form>
                        <h3 class="text-center text-white" style="margin-top: 40%;" id="mmonth">{{date("F")}}</h3>
            <h5 class="text-center font-weight-bold count" id="getMeal">{{$total_meal}}</h5>
            <h5 class="text-center text-white font-weight-bold" >Meals</h5>
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12  c3">
                <br>
                <h3 class="text-center text-white">My Profile</h3>
            <div style="margin-left: 30px; margin-top: 80px;">
                    <h5 class="text-white font-weight-bold">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h5>
                    <h5 class="text-white font-weight-bold">{{Auth::user()->email}}</h5>
                    <h5 class="text-white font-weight-bold">{{Auth::user()->phone}}</h5>
            </div>
            </div>
        </div>
    </div>
    <script>
        

 $( document ).ready(function() {
     $('.toggle').click(function(){
        if ($('.toggle').val() == 'b'){
            $(this).val('w');
       $('body').css("background-color", "white");  
   }     
   else {
    $(this).val('b');
       $('body').css("background-color", "black");
   }
     });

     if ($('.toggle').val() == 'w'){
       
       $('body').css("background-color", "white");  
   }     
   else {
       
       $('body').css("background-color", "black");
   }
});

    
    </script>

<script>
        $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
    </script>

    <script>
    
    $("#money").submit(function(event){
       
       var month = $( "#monthSelect option:selected" ).text();

        event.preventDefault();
        var formData = new FormData(this);
		var url = $(this).attr('action');
          $.ajax({
             url: url,
             type: 'POST',
             data: formData,
             async: false,
             success: function(data) {
				//alert(data);
                $("#getMoney").html(data);
                $("#moneyMonth").html(month);
				
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
    </script>

<script>
    
        $("#meal").submit(function(event){
           
           var month = $( "#mmonthSelect option:selected" ).text();
    
            event.preventDefault();
            var formData = new FormData(this);
            var url = $(this).attr('action');
              $.ajax({
                 url: url,
                 type: 'POST',
                 data: formData,
                 async: false,
                 success: function(data) {
                    // alert(data);
                    $("#getMeal").html(data);
                     $("#mmonth").html(month);
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        
        </script>



















<script>
    
    $('#background').change(function(){
       
      

        event.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');
          $.ajax({
             url: url,
             type: 'POST',
             data: formData,
             async: false,
             success: function(data) {
                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

   
    //   $('#background').submit(); 
     
    

    
    </script>
@endsection