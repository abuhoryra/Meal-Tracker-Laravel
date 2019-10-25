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
                    <th scope="col">Name</th>
                    <th scope="col">Lunch</th>
                    <th scope="col">Dinner</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                        @php ($count = 0)
                    @foreach ($meals as $row)
                    @php ($count++)
                    <tr>
                            <th scope="row">{{ $count}}</th>
                            <td>{{date("F j, Y", strtotime($row->date))}}</td>
                            <td>{{$row->first_name.' '.$row->last_name}}</td>
                            <td>
                                @if ($row->lunch == 1)
                                    <p class="text-success font-weight-bold">Yes</p>
                                @else
                                    <p class="text-danger font-weight-bold">No</p>
                                @endif
                            </td>
                            <td>
                                @if ($row->dinner == 1)
                                   <p class="text-success font-weight-bold">Yes</p> 
                                @else
                                    <p class="text-danger font-weight-bold">No</p>
                                @endif
                               </td>
                               <td>
                                   
                               <button type="button" class="btn btn-outline-primary btn-sm onshow" data-toggle="modal" data-target="#exampleModal" data-userid="{{$row->id}}" data-name="{{$row->first_name.' '.$row->last_name}}" data-lunch="{{$row->lunch}}" data-dinner="{{$row->dinner}}">
                                    Edit
                                  </button>

                               </td>
                          </tr>  
                    @endforeach
                </tbody>
              </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="name"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{URL('/editMeal')}}" method="POST">
                @csrf
            <input type="text" id="id" name="id" style="display: none;">
                <div style="float: left">
            <div class="form-check">
                <h5>Lunch</h5>
                <input class="form-check-input" type="radio" name="lunch" id="lunch1" value="1">
                <label class="form-check-label text-success font-weight-bold" for="exampleRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="lunch" id="lunch0" value="0">
                <label class="form-check-label text-danger font-weight-bold" for="exampleRadios1">
                  No
                </label>
              </div>
                </div>

                <div style="float: right;">
                        <div class="form-check">
                            <h5>Dinner</h5>
                            <input class="form-check-input" type="radio" name="dinner" id="dinner1" value="1">
                            <label class="form-check-label text-success font-weight-bold" for="exampleRadios1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="dinner" id="dinner0" value="0">
                            <label class="form-check-label text-danger font-weight-bold" for="exampleRadios1">
                              No
                            </label>
                          </div>
                            </div>
                               <br><br><br><br>
                               <div style="text-align: center;">
                                    <button type="submit" class="btn btn-success">Update</button>
                               </div>
                            

                        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  
  $(document).ready(function(){
      $(".onshow").click(function(){
        
        let name = $(this).attr("data-name");
        let lunch = $(this).attr("data-lunch");
        let dinner = $(this).attr("data-dinner");
        let id = $(this).attr("data-userid");
        $("#name").html(name);
        $("#id").val(id);

        if(lunch == 1){
         $('#lunch1').prop('checked',true);

        }

        if(lunch == 0) {
            $('#lunch0').prop('checked',true);
        }

        if(dinner == 1){
         $('#dinner1').prop('checked',true); 
        }

        if(dinner == 0){
         $('#dinner0').prop('checked',true); 
        }
        
      })
  })
  
  </script>
@endsection