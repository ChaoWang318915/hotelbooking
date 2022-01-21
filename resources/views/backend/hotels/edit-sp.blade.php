@extends('layouts.backend')
@section('content')


@php

$MealOptions1 = array(0=>'select','BB'=>'B&B','HB'=>'HB','FB'=>'FB','AI'=>'AI','HBP'=>'HBP','PAI'=>'PAI','PLAI'=>'PLAI','K1'=>'K1','K2'=>'K2','SB'=>'SB');
$MealOptions2 = array(0=>'','BB'=>'B&B','HB'=>'HB','FB'=>'FB','AI'=>'AI','SB'=>'SB','HBP'=>'HBP','PAI'=>'PAI','PLAI'=>'PLAI');
$ZahlungsOpts = array(0=>'select',1=>'On request',2=>'Direct Booking',3=>'Special Rate');
$Mindestaufenthalt = array(1,2,3,4,5,6,7,8,9,10);

  $spOptions2 = array(
  
  'Gala-Dinner-Weihnachten' => 'Gala Dinner Christmas',
  'Gala-Dinner-Sylvester' => 'Gala Dinner New Year\'s Eve',
  'Gala-Dinner-Chinesisches-Weihnachten' => 'Gala Dinner Chinese Christmas',
  'Gala-Dinner-Chinesisches-Neujahr' => 'Gala Dinner Chinese New Year',
  'Gala-Dinner' => 'Gala-Dinner',
  'Gala-Dinner-Valentinestag' => 'Gala-Dinner-Valentinestag',
  'Gala-Dinner-Ostern ' => 'Gala-Dinner-Ostern'
  

  
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
						<li><a onclick="return confirm('Are you sure?')" href="{{route('price-sp-delete',['sessionid'=>$SessionId])}}"><span class="far fa-trash-alt" ></span>delete</a></li>
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
            <li><a href="{{route('price-mealplan',[$hotelId,$rate_menuplan->id])}}">{{$rate_menuplan->Start}} - {{$rate_menuplan->End}}</a></li>
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
            <li><a  href="{{url('/edit-transfer',[$hotelId,$rate_transfer->id])}}">{{$rate_transfer->Start}} - {{$rate_transfer->End}}</a></li>
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
            <li><a  @if($additional_service->id == $SessionId) class="activeclass" @endif  href="{{url('/edit-sp',[$hotelId,$additional_service->id])}}">{{$additional_service->Start}} -{{$additional_service->End}} </a></li>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
    <div class="tab-content">

      <form action="{{ route('sp_updatedata',[$hotelId,$SessionId]) }}" method="POST" id="MyForm">
        @csrf
       
      <div class="table-blue-holder">
        <div class="container">
          <div class="row" style="justify-content: center">
            
            <div class="col-md-3" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Type</label>
              <select name="Type" id="" class="form-control">
                @foreach($spOptions2 as $top)
                     <option value="{{$top}}" @if($top ==@$sp->Type) selected @endif >{{$top}}</option>
                @endforeach
              </select>
            </div>


            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Adults</label>
              <input type="text" name="Value_Adult" value="{{@$sp->Adult}}" class="form-control">
              
  
            </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Baby</label>
               <input type="text" name="Value_Baby" value="{{@$sp->Baby}}" class="form-control">
              
  
            </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Child</label>
               <input type="text" name="Value_Child" value="{{@$sp->Child}}" class="form-control">
              
  
            </div>
            <div class="col-md-2" style="text-align: center">
              <label for="" style="font-size: 15px; font-weight: 500">Teen</label>
               <input type="text" name="Value_Teen" value="{{@$sp->Teen}}" class="form-control">
              
  
            </div>
          </div>
          
          
          
          
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
          $ht = App\HotelSessionSp::findorfail($SessionId);
        @endphp
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('update-session-sp',$SessionId)}}">
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
