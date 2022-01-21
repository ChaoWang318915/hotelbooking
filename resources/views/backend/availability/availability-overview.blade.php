@extends('layouts.backend')
@section('content')

@php

  $Days = array('Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag');
  $DaysSmall = array('So','Mo','Di','Mi','Do','Fr','Sa');
  $Months = array('Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember');
  $MonthsShort = array('Jan','Feb','Mär','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez');

@endphp

    		<div class="d-flex">
      			<div class="main-sidebar"></div>
    			<div class="content-area">
				<nav class="content-menu">
					<ul class="nav">
						<li><a href="javascript:$('#MyForm').submit();"><span class="far fa-save"></span>save</a></li>
					</ul>
				</nav>
				<!-- /content-menu -->

				<div class="availability-select">
				
						
						<select name="hotel_id" id="hotel_select">
							<option value="">Select a hotel</option>
							@foreach($hotels as $hotel)
							<option value="{{$hotel->id}}"
								@isset($hotel_id) @if($hotel->id == $hotel_id) selected @endisset @endif
								>{{$hotel->hotel_name}}</option>
							@endforeach
						</select>
					
				</div>
				<!-- /availability-select -->
			@isset($hotel_id)
    			<form action="{{ route('availability-overview.store') }}" method="POST" id="MyForm">
    				@csrf
    				<input type="hidden" name="hotel_id" value="{{$hotel_id}}">
	
        		<div class="content">
        			@php
						$Y = date('Y');
  						$M = date('m');
					
        			@endphp
        			@for ($i=1; $i<=18; $i++)

        			@php
        				$AktDateTime = mktime(0,0,1,$M,1,$Y);
        				$DayCount = date('t',$AktDateTime);

        			@endphp
        				<div class="availability-item">
						<h3 class="form-name">{{$Months[$M-1]}} {{$Y}}</h3>

							<table class="availability-table">
								<thead>
									<tr>
										<th></th>
										<th></th>
										@for ($ii=1;$ii<=$DayCount;$ii++)
											<th><p>{{$ii}}</p></th>
										@endfor
										
									</tr>
								</thead>
								<tbody>
									
									@foreach($rooms as $room)
										@if($room->room_status ==1)
										@php
											$d = App\Availability::where('room_id',$room->id)->get();
											$RoomValues = array();
											
											foreach($d as $dd){
												$RoomValues[$dd->day_id] = $dd->availability_count;
    											
											}
										
											
										@endphp
										
									<tr>
										<td class="name">{{ $room->room_name }}</td>
										<td class="change">
											<input type="button" class="change-btn btnn" id="DayUP{{$room->id}}-{{$ii}}" value="+">
											<input type="button" class="change-btn btnn" id="in_xx"  value="-">
										</td>
										@for ($ii=1;$ii<=$DayCount;$ii++)
											@php
												$DayId = $Y.str_pad($M, 2, "0", STR_PAD_LEFT).str_pad($ii, 2, "0", STR_PAD_LEFT);
											@endphp
											<td><input class="DayInput" id="in_DayValue-{{$room->id}}-{{$DayId}}" type="text" value="{{ @$RoomValues[$DayId]==''?0:@$RoomValues[$DayId] }}" name="in_DayValue-{{$room->id}}-{{$DayId}}" style="background:#{{ @$RoomValues[$DayId]>0?'cbffd2':'ffd7d7' }}"></td>
										@endfor

									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
        			
        			@php
						$M++;
					    if ($M>12)
					    {
					      $M=1;
					      $Y++;
					    } 
        			@endphp
					@endfor
					
				</div>
			</form>
			@endisset
				</div>
    		</div>

<!-- Ashish code starts here -->

  <script type="text/javascript">
  	$('#availability-li').addClass('active');
  $( function() {



    $('#hotel_select').change(function() {
    	var hotel_id = $('#hotel_select').val();
    	// console.log('hotel_id',hotel_id);
    	
    	var url = '{{ url("availability-overview/:hotel_id") }}';
		url = url.replace(':hotel_id', hotel_id);
    	$('#hotel_select_form').attr('action',url);
    	console.log("url",url);
    	window.location.href = url;
    	// $('#hotel_select_form').submit();

    
    });

    $(".DayInput").keyup(function(event){
    	this.value = this.value.replace(/[^0-9\.]/g,'');
	    if ((event.keyCode>=48 && event.keyCode<=57) || (event.keyCode>=96 && event.keyCode<=105))
	    {
	      var inputs = $(this).closest("form").find(":input");
	      inputs.eq( inputs.index(this)+ 1 ).focus().select();    
	    }
	  })
	  
	  $(".btnn").click(function(event)
	  {
	    t = $(this).parent().parent().find(".DayInput");
	    var Type = $(this).val();
	    $.each(t, function( key, value, type)
	    {
	      if (Type=="-")
	      {
	        $("#"+value.id).val(parseInt($("#"+value.id).val()) -1 );
	        if ($("#"+value.id).val()<0) $("#"+value.id).val(0);
	      }  
	      else 
	      {
	        $("#"+value.id).val(parseInt($("#"+value.id).val()) + 1);  
	      }  
	    });
	  });

  });

  </script>

@endsection






