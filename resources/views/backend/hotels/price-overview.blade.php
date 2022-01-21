@extends('layouts.backend')
@section('content')

@php

$MealOptions1 = array(0=>'select','BB'=>'B&B','HB'=>'HB','FB'=>'FB','AI'=>'AI','HBP'=>'HBP','PAI'=>'PAI','PLAI'=>'PLAI','K1'=>'K1','K2'=>'K2','SB'=>'SB');
$MealOptions2 = array(0=>'','BB'=>'B&B','HB'=>'HB','FB'=>'FB','AI'=>'AI','SB'=>'SB','HBP'=>'HBP','PAI'=>'PAI','PLAI'=>'PLAI');
$ZahlungsOpts = array(0=>'On request',1=>'Direct Booking',2=>'Special Rate');
$Mindestaufenthalt = array(1,2,3,4,5,6,7,8,9,10);

  $spOptions2 = array(
  
  'Gala-Dinner-Weihnachten' => 'Gala Dinner Christmas',
  'Gala-Dinner-Sylvester' => 'Gala Dinner New Year\'s Eve',
  'Gala-Dinner-Chinesisches-Weihnachten' => 'Gala Dinner Chinese Christmas',
  'Gala-Dinner-Chinesisches-Neujahr' => 'Gala Dinner Chinese New Year',
  'Gala-Dinner' => 'Gala-Dinner',
  'Gala-Dinner-Valentinestag' => 'Gala-Dinner',
  'Gala-Dinner-Ostern ' => '-Dinner-Ostern'
  

  
  );

$MaxAdult = array(0,1,2,3,4,5,6);
$MaxChildren = array(0,1,2,3,4,5,6);

@endphp
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <div class="d-flex">
<div class="main-sidebar"></div>
      <div class="content-area">
        
        <nav class="content-menu">
          <ul class="nav">
            <li><a href="{{url('/hotel-administration')}}" ><span class="fas fa-chevron-left"></span>back</a></li>
            <li><a href="{{url('/add-prices',$hotelId)}}"  data-toggle="modal" data-target="#myModal"><span class="fas fa-plus"></span>add session (room rates)</a></li>
            <li><a href="{{url('/price-menuplan',$hotelId)}}" data-toggle="modal" data-target="#myModal1"><span class="fas fa-plus" ></span>add session (Meal plan)</a></li>
            <li><a href="{{url('/price-transfer',$hotelId)}}" data-toggle="modal" data-target="#myModal2"><span class="fas fa-plus"></span>add session (transfer)</a></li>
            <li><a href="{{url('/price-additional-service')}}" data-toggle="modal" data-target="#myModal3"><span class="fas fa-plus"></span>add session (additional service)</a></li>

            <!-- <li><a href="#" id="opener"><span class="fas fa-plus"></span>add session (additional service)</a></li> -->
            <!-- <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="fas fa-plus"></span>add session (additional service)</button></li> -->
          </ul>
          <!-- <p>Date: <input type="text" id="datepicker"></p> -->
          <!-- <div id="dialog1" title="Dialog Title" hidden="hidden">I'm a dialog</div> -->

        </nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
  <div class="tab-block">
    <div class="tab-sidebar">
      <div class="tab-sidebar-box">
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
    <div class="price-content">
      @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
      @if(count($rooms)>0)
      @foreach($rooms as $k => $v)

      <div class="price-table">
        <table>
          <thead>
            <tr >
              <th colspan="14" class="table-title" colspan="12">{{$v->room_name}}</th>
            </tr>
            <tr>
              <th class="date"></th>
              <th>Single</th>
              <th>Double</th>
              <th>Triple</th>
              <th>Rooms</th>
              <th>Extra Pax</th>
              <th>Babies</th>
              <th>Child</th>
              <th>Teen</th>
              <th>Meal plan</th>
              <th>Price for <br/> X Adult</th>
              <th>Price for <br/> X Children</th>
              <th>Payment option</th>
              <th>Minimum stay</th>

            </tr>
          </thead>
          <tbody>
            @if(count($Preise)>0)


            @foreach($hotel_session as $s => $sv)
            <tr>
                
              <td class="date">{{$sv['Start']}} - {{$sv['End']}}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceSingle']=='0'?'':@$Preise[$v->id][$sv->id]['PriceSingle'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceDoppel']=='0'?'':@$Preise[$v->id][$sv->id]['PriceDoppel'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceTripple']=='0'?'':@$Preise[$v->id][$sv->id]['PriceTripple'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceRoom']=='0'?'':@$Preise[$v->id][$sv->id]['PriceRoom'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceExtraPax']=='0'?'':@$Preise[$v->id][$sv->id]['PriceExtraPax'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceKind1']=='0'?'':@$Preise[$v->id][$sv->id]['PriceKind1'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceKind2']=='0'?'':@$Preise[$v->id][$sv->id]['PriceKind2'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['PriceKind3']=='0'?'':@$Preise[$v->id][$sv->id]['PriceKind3'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['MainMeal']=='0'?'':@$Preise[$v->id][$sv->id]['MainMeal'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['ShowPricePerson']=='0'?'':@$Preise[$v->id][$sv->id]['ShowPricePerson'] }}</td>
              <td>{{ @$Preise[$v->id][$sv->id]['ChildInc']=='0'?'':@$Preise[$v->id][$sv->id]['ChildInc'] }}</td>
              <td>
                
                {{ @$ZahlungsOpts[$Preise[$v->id][$sv->id]['StornoType']] }} ( {{ @$Preise[$v->id][$sv->id]['StornoValue']=='0'?'':@$Preise[$v->id][$sv->id]['StornoValue'] }} )

              </td>
              <td>{{ @$Preise[$v->id][$sv->id]['MinStay']=='0'?'':@$Preise[$v->id][$sv->id]['MinStay'] }} Nights</td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
        
      </div>
    @endforeach
    @endif
    </div>
  </div>
</div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Session</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('add-session',$hotelId)}}">
        @csrf
      <div class="modal-body">
       <input type="hidden" name="rate_type" value="room_rates">
         <div class="row"><div class="col-md-2">Period: </div> 
         <div class="col-md-4 mr-5"><input type="date" name="from"  required="required">
          <p class="frmto mt-1">From</p>
         </div> 
         <div class="col-md-4 "> <input type="date" name="to"  required="required">
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
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Session (mealplan)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('add-session-meal',$hotelId)}}">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="rate_type" value="rate_menuplan">
         <div class="row"><div class="col-md-2">Period: </div> 
         <div class="col-md-4 mr-5"><input type="date" name="from">
          <p class="frmto mt-1">From</p>
         </div> 
         <div class="col-md-4 "> <input type="date" name="to">
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





<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Session (transfer)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('add-session-transfer',$hotelId)}}">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="rate_type" value="rate_transfer">
         <div class="row"><div class="col-md-2">Period: </div> 
         <div class="col-md-4 mr-5"><input type="date" name="from">
          <p class="frmto mt-1">From</p>
         </div> 
         <div class="col-md-4 "> <input type="date" name="to">
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
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Session (additional service)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('add-session-sp',$hotelId)}}">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="rate_type" value="additional_service">
         <div class="row"><div class="col-md-2">Period: </div> 
         <div class="col-md-4 mr-5"><input type="date" name="from">
          <p class="frmto mt-1">From</p>
         </div> 
         <div class="col-md-4 "> <input type="date" name="to">
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


<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Session</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('add-session',$hotelId)}}">
        @csrf
      <div class="modal-body">
       <input type="hidden" name="rate_type" value="additional_service">
         <div class="row"><div class="col-md-2">Period: </div> 
         <div class="col-md-4 mr-5"><input type="date" name="from"  required="required">
          <p class="frmto mt-1">From</p>
         </div> 
         <div class="col-md-4 "> <input type="date" name="to"  required="required">
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
</div> -->






<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




<script>
  $.noConflict();
  $(document).ready(function(){
    $('#hotel_admin').addClass('active');
});
$(document).ready(function(){
    $('#rates').addClass('active');
    
    $('#datepicker').datepicker({
                format: 'yy/mm/dd',
               
            });
     
     $('#datepicker1').datepicker({
                format: 'yy/mm/dd',
               
            });
    $( "#dialog1" ).dialog();

    $( "#dialog1" ).dialog({
    autoOpen: false
  });
  
  $("#opener").click(function() {
    $("#dialog1").dialog('open');
  });


});


</script>









@endsection
