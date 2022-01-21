@extends('layouts.backend')
@section('content')


@php

$MealOptions1 = array(0=>'select','BB'=>'B&B','HB'=>'HB','FB'=>'FB','AI'=>'AI','HBP'=>'HBP','PAI'=>'PAI','PLAI'=>'PLAI','K1'=>'K1','K2'=>'K2','SB'=>'SB');

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
$ZahlungsOpts = array(0=>'On request',1=>'Direct Booking',2=>'Special Rate');
$Mindestaufenthalt = array(1,2,3,4,5,6,7,8,9,10);

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
						<li><a href="{{url('/price-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li><a href="javascript:$('#MyForm').submit();"><span class="far fa-save"></span>save</a></li>
						<li><a href="{{url('/add-prices',$hotelId)}}"  data-toggle="modal" data-target="#myModal"><span class="fas fa-edit"></span>edit</a></li>
						<li><a onclick="return confirm('Are you sure?')" href="{{route('price-delete',['sessionid'=>$SessionId])}}"><span class="far fa-trash-alt" ></span>delete</a></li>
            <li>
              <div style="display: flex; align-items: center">
                <input type="number" name="" placeholder="" value="" id="ToolbarPriceValue">
                <button style="background-color: #006a9a; color: white; border: none; padding: 3px 6px; margin-left: 6px" id="ToolbarSetPriceUp">To Calculate</button>
              </div>
            </li>
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
  
  <div class="tab-block">
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

            <li><a @if($room_date->id == $SessionId) class="activeclass" @endif href="{{route('add-prices',[$hotelId,$room_date->id])}}">{{$room_date->Start}} - {{$room_date->End}}</a></li>
          
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

      <form action="{{ route('update-price.store_price',[$hotelId,$SessionId]) }}" method="POST" id="MyForm">
        @csrf
        <input type="text" name="RateCode" class=" mb-4"placeholder="Rate Code" value="{{@$hotel_session_rate[0]->RateCode}}">
      <div class="table-blue-holder">
        @foreach($rooms as $k => $v)
        <header class="table-head"><h4>{{$v->room_name}}</h4></header>
        
          <table>
            <tr>
              
              <th></th>
              <th>Single</th>
              <th>Double</th>
              <th>Tripple</th>
              <th>Room</th>
              <th>Extra Pax</th>
              <th>Baby</th>
              <th>Child</th>
              <th>Teen</th>
              <th>Meal plan inkl.</th>
              <th>Price for <br>X Adult</th>
              <th>Price for <br>X Children</th>
              <th>Payment option</th>
              <!-- <th></th> -->
              <th>Mindestaufenthalt</th>
            </tr>
            
            <tr class="PriceRange">
              <td><input type="hidden" name="date_id" value={{$SessionId}}></td>
              <td><input id="PriceSingle-{{$SessionId}}-{{$v->id}}" name="PriceSingle-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice1" value="{{@$Preise[$v->id][$SessionId]['PriceSingle']}}"></td>

              <td><input id="PriceDoppel-{{$SessionId}}-{{$v->id}}" name="PriceDoppel-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice2" value="{{@$Preise[$v->id][$SessionId]['PriceDoppel']}}"></td>

              <td><input id="PriceTripple-{{$SessionId}}-{{$v->id}}" name="PriceTripple-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice3" value="{{@$Preise[$v->id][$SessionId]['PriceTripple']}}"></td>

              <td><input id="PriceRoom-{{$SessionId}}-{{$v->id}}" name="PriceRoom-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice4" value="{{@$Preise[$v->id][$SessionId]['PriceRoom']}}"></td>

              <td><input id="PriceExtraPax-{{$SessionId}}-{{$v->id}}" name="PriceExtraPax-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice5" value="{{@$Preise[$v->id][$SessionId]['PriceExtraPax']}}"></td>

              <td><input id="PriceKind1-{{$SessionId}}-{{$v->id}}" name="PriceKind1-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice6" value="{{@$Preise[$v->id][$SessionId]['PriceKind1']}}"></td>

              <td><input id="PriceKind2-{{$SessionId}}-{{$v->id}}" name="PriceKind2-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice7" value="{{@$Preise[$v->id][$SessionId]['PriceKind2']}}"></td>

              <td><input id="PriceKind3-{{$SessionId}}-{{$v->id}}" name="PriceKind3-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice8" value="{{@$Preise[$v->id][$SessionId]['PriceKind3']}}"></td>


              <td style="text-align: center">
                <select name="MainMeal-{{$SessionId}}-{{$v->id}}" id="">
                  <!-- <option value="0">select</option> -->
                  @foreach($MealOptions2 as $mealp)
                  <option value="{{$mealp}}" @isset($Preise[$v->id][$SessionId]['MainMeal']) @if($Preise[$v->id][$SessionId]['MainMeal'] == $mealp) selected @endisset @endif>{{ $MealOptionsCustomName[$mealp]}}</option>
                  @endforeach
                </select>
              </td>

              
              <td style="text-align: center"><input id="ShowPricePerson-{{$SessionId}}-{{$v->id}}" name="ShowPricePerson-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice1" value="{{@$Preise[$v->id][$SessionId]['ShowPricePerson']}}"></td>
              <td style="text-align: center"><input id="ChildInc-{{$SessionId}}-{{$v->id}}" name="ChildInc-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice1" value="{{@$Preise[$v->id][$SessionId]['ChildInc']}}"></td>

              <td style="text-align: center">
                
                <select name="StornoType-{{$SessionId}}-{{$v->id}}" id="">
                  
                  @foreach($ZahlungsOpts as $keyz=>$vz)
                  <option value="{{$keyz}}" @isset($Preise[$v->id][$SessionId]['StornoType']) @if($Preise[$v->id][$SessionId]['StornoType'] == $keyz) selected @endisset @endif>{{$vz}}</option>
                  @endforeach
                </select>

              </td>
              <!-- <td><input id="StornoValue-{{$SessionId}}-{{$v->id}}"  name="StornoValue-{{$SessionId}}-{{$v->id}}" type="text" class="form-control EditPrice1" value="{{@$Preise[$v->id][$SessionId]['StornoValue']}}"></td> -->
              <td style="text-align: center">
                  <select name="MinStay-{{$SessionId}}-{{$v->id}}" id="">
                    
                    @foreach($Mindestaufenthalt as $ms)
                    <option value="{{$ms}}" @isset($Preise[$v->id][$SessionId]['MinStay']) @if($Preise[$v->id][$SessionId]['MinStay'] == $ms) selected @endisset @endif>{{$ms}}</option>
                    @endforeach
                  </select>   
                  <span> Nights</span>             
              </td>
               
              
              
            </tr>
            
          </table>
        
        @endforeach
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
          $ht = App\Hotelsession::findorfail($SessionId);
        @endphp
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('update-session',$SessionId)}}">
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

  $("#ToolbarSetPriceUp").click(function(){
    var Faktor = ( $("#ToolbarPriceValue").val() / 100 ) +1;
    $( ".PriceRange" ).each(function( index ) {
      
      var num1 = Math.round( $(this).find(".EditPrice1").val() * Faktor) ;
      var num2 = Math.round( $(this).find(".EditPrice2").val() * Faktor) ;
      var num3 = Math.round( $(this).find(".EditPrice3").val() * Faktor) ;
      var num4 = Math.round( $(this).find(".EditPrice4").val() * Faktor) ;
      var num5 = Math.round( $(this).find(".EditPrice5").val() * Faktor) ;
      var num6 = Math.round( $(this).find(".EditPrice6").val() * Faktor) ;
      var num7 = Math.round( $(this).find(".EditPrice7").val() * Faktor) ;
      var num8 = Math.round( $(this).find(".EditPrice8").val() * Faktor) ;
      
      $(this).find(".EditPrice1").val( num1 );
      $(this).find(".EditPrice2").val( num2 );
      $(this).find(".EditPrice3").val( num3 );
      $(this).find(".EditPrice4").val( num4 );
      $(this).find(".EditPrice5").val( num5 );
      $(this).find(".EditPrice6").val( num6 );
      $(this).find(".EditPrice7").val( num7 );
      $(this).find(".EditPrice8").val( num8 );
    });    
  });



});
</script>
@endsection
