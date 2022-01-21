@extends('layouts.backend')
@section('content')


@php

$MealOptions1 = array(0=>'select','BB'=>'B&B','HB'=>'HB','FB'=>'FB','AI'=>'AI','HBP'=>'HBP','PAI'=>'PAI','PLAI'=>'PLAI','K1'=>'K1','K2'=>'K2','SB'=>'SB');
$ZahlungsOpts = array(0=>'select',1=>'On request',2=>'Direct Booking',3=>'Special Rate');
$Mindestaufenthalt = array(1,2,3,4,5,6,7,8,9,10);

$MealOptionsCustomName = array(
0=>'select',
'B&B'=>'Bed & Breakfast',
'HB'=>'Halbpension',
'FB'=>'Vollpension',
'AI'=>'All Inclusive',
'HBP'=>'Halbpension Premium',
'PAI'=>'Premium All Inclusive',
'PLAI'=>'Platinum All Inclusive',
'K1'=>'K1',
'K2'=>'K2',
'SB'=>'Selbstverpflegung',
'SAI'=>'Silver All Inclusive'
);

$MealOptions2 = array(
0=>'0',
'BB'=>'B&B',
'HB'=>'HB',
'FB'=>'FB',
'AI'=>'AI',
'SB'=>'SB',
'HBP'=>'HBP',
'PAI'=>'PAI',
'PLAI'=>'PLAI',
'SAI'=>'SAI'
);

$MaxAdult = array(0,1,2,3,4,5,6);
$MaxChildren = array(0,1,2,3,4,5,6);

@endphp

<style>
  
  .activeclass{
    color:blue;
  }
</style>
    <div class="d-flex">
      <?php 
      $hid=request()->route('id');
      $did=request()->route('did');
      ?>
      
      <div class="main-sidebar"></div>
      <div class="content-area">
        <nav class="content-menu">
					<ul class="nav">
						<li><a href="{{url('/price-overview',$hotelId)}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li><a href="javascript:$('#MyForm').submit();"><span class="far fa-save"></span>save</a></li>
						<li><a href="{{url('/add-prices',$hotelId)}}"  data-toggle="modal" data-target="#myModal"><span class="fas fa-edit"></span>edit</a></li>
						<li><a onclick="return confirm('Are you sure?')" href="{{route('price-meal-delete',['sessionid'=>$SessionId])}}"><span class="far fa-trash-alt" ></span>delete</a></li>
            <li>@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif</li>

					</ul>
				</nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
  
  <div class=" tab-block">
    <div class="tab-sidebar">
      <div class="tab-sidebar-box">
        <h3><a href="{{url('/price-overview',$hid)}}">Overview</a></h3>
        <hr>
        <h3>Room Rates</h3>
        <nav>
          <ul>
            @foreach($hotel_session as $room_date)
            @php

              $room_date->Start = strtotime($room_date->Start);
              $room_date->End = strtotime($room_date->End);
              $room_date->Start = date("d-m-Y", $room_date->Start);
              $room_date->End = date("d-m-Y", $room_date->End);
            @endphp
            <li><a href="{{route('add-prices',[$hotelId,$room_date->id])}}">{{$room_date->Start}} - {{$room_date->End}}</a></li>
          
            @endforeach
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Meal Plan</h3>
        <nav>
          <ul>
            @foreach($hotel_session_meals as $rate_menuplan)
            @php

              $rate_menuplan->Start = strtotime($rate_menuplan->Start);
              $rate_menuplan->End = strtotime($rate_menuplan->End);
              $rate_menuplan->Start = date("d-m-Y", $rate_menuplan->Start);
              $rate_menuplan->End = date("d-m-Y", $rate_menuplan->End);
            @endphp
            <li><a @if($rate_menuplan->id == $SessionId) class="activeclass" @endif  href="{{route('price-mealplan',[$hotelId,$rate_menuplan->id])}}">{{$rate_menuplan->Start}} - {{$rate_menuplan->End}}</a></li>
            @endforeach
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Transfer</h3>
        <nav>
          <ul>
            @foreach($hotel_session_transfer as $rate_transfer)
            @php

              $rate_transfer->Start = strtotime($rate_transfer->Start);
              $rate_transfer->End = strtotime($rate_transfer->End);
              $rate_transfer->Start = date("d-m-Y", $rate_transfer->Start);
              $rate_transfer->End = date("d-m-Y", $rate_transfer->End);
            @endphp
            <li><a href="{{url('/edit-transfer',[$hotelId,$rate_transfer->id])}}">{{$rate_transfer->Start}} - {{$rate_transfer->End}}</a></li>
            @endforeach
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>additional service</h3>
        <nav>
          <ul>
            @foreach($hotel_session_sps as $additional_service)
            @php

              $additional_service->Start = strtotime($additional_service->Start);
              $additional_service->End = strtotime($additional_service->End);
              $additional_service->Start = date("d-m-Y", $additional_service->Start);
              $additional_service->End = date("d-m-Y", $additional_service->End);
            @endphp
            <li><a href="{{url('/edit-sp',[$hotelId,$additional_service->id])}}">{{$additional_service->Start}} -{{$additional_service->End}} </a></li>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
    <div class="tab-content">

      <form action="{{ route('meal_plan_update',[$hotelId,$SessionId]) }}" method="POST" id="MyForm">
        @csrf
       
      <div class="table-blue-holder">
        <div class="container">
          <div class="clearfix"></div>
          <br><br>
          
          @for($i=1;$i<=6;$i++)
            @php
              $mt = 'MealType'.$i;
              $a = 'AdultValue'.$i;
              $b = 'BabyValue'.$i;
              $c = 'ChildValue'.$i;
              $t = 'TeenValue'.$i;
              
              
              @endphp
            <div class="row" style="justify-content: center">
            <div class="col-md-3" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Meal Plan {{$i}}
              </label>
              <select name="Meal_{{$i}}" id="" class="form-control" style="height: 35px; width: 100%; border-radius: 4px; padding: 5px 10px">
                @foreach($MealOptions2 as $mp2)
                <option value="{{$mp2}}" @if($mp2 == @$mealplans->$mt) selected @endif>{{ $MealOptionsCustomName[$mp2]}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Adult</label>
                  <input class="form-control" type="text" name="Value_Adult_{{$i}}" value="{{@$mealplans->$a}}" 
                  style="height: 35px; width: 50%; border-radius: 4px; padding: 5px 10px">              
            </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Babies to 2 J</label>
                  <input class="form-control" type="text" name="Value_Baby_{{$i}}" value="{{@$mealplans->$b}}" 
                  style="height: 35px; width: 50%; border-radius: 4px; padding: 5px 10px">
              </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Child from 2 J</label>
                  <input class="form-control" type="text" name="Value_Child_{{$i}}" value="{{@$mealplans->$c}}" 
                  style="height: 35px; width: 50%; border-radius: 4px; padding: 5px 10px">
            </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Teen from 2 J</label>
                  <input class="form-control" type="text" name="Value_Teen_{{$i}}" value="{{@$mealplans->$t}}" 
                  style="height: 35px; width: 50%; border-radius: 4px; padding: 5px 10px">
            </div>

            </div>
            <hr>
            @endfor  
          
          
        </div>
      </div>
      
    </div>
  </form>
  </div>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Session</h5>
        @php
          $ht = App\HotelSessionMeal::findorfail($SessionId);
        @endphp
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('update-session-mealplan',$SessionId)}}">
        @csrf
      <div class="modal-body">
       <input type="hidden" name="rate_type" value="room_rates">
         <div class="row"><div class="col-md-2">Period: </div> 
         <div class="col-md-4 mr-5"><input type="date" name="from"  required="required" value="{{$ht->Start}}">
          <p class="frmto mt-1">From</p>
         </div> 
         <input type="hidden" name="SessionId" value="{{$SessionId}}">
         <div class="col-md-4 "> <input type="date" name="to"  required="required" value="{{$ht->End}}">
         <p class="frmto mt-1">To</p></div> 
         
       </div>
      
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#rates').addClass('active');
});
</script>
@endsection
