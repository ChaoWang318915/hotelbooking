@extends('layouts.backend')
@section('content')

<div class="d-flex">
	<div class="main-sidebar"></div>
    <div class="content-area">
        <nav class="content-menu">
          	<ul class="nav">
          		<?php $hid=request()->route('id');?>
            	<li><a href="{{url('/includes-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
            	<li><a href="{{url('/include-add',$hid)}}"><span class="fas fa-plus"></span>Add </a></li>
            	<li>
            		@include('backend.message')
            	</li>
            </ul>
        </nav>
        <!-- /content-menu -->
        @include('includes.inner_nav')
        <!-- /main-tabset -->
        <?php 
          $hid=request()->route('id');
           ?>
         
        	<div class="">

			<div class="hotel-admin">
			<table class="hotel-admin-table">
				<thead>
					<tr>
						<th>No.</th>
						<!-- <th>ID</th> -->
						<th>Name</th>
						
						<th>On-/Offline</th>
						<th></th>
					</tr>
				</thead>

				<tbody id="sortable">
					@foreach($includes as $index=>$include)
					<tr class="sortable row1" data-href="" data-id="{{ $include->id }}">
						<td>{{$index+1}}</td>
						
						<td><a href="{{route('include-edit',[$hid,$include->id])}}">{{$include->include_name}}</a></td>
						
						<td> <label class="switch">
                <?php if($include->status==1){ ?>
               <input type="checkbox" class="include_status" id="{{$include->id}}" checked>
               <?php } else{ ?>
               <input type="checkbox" class="include_status"  id="{{$include->id}}">
               <?php }?>
                   <span class="slider round"></span>
                </label></td>
				
						<td class="btn-holder">
							<a onclick="return confirm('Are you sure?')" href="{{route('include-delete',['id'=>$hid,'tid'=>$include->id])}}" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>
					@endforeach
					

				</tbody>
			</table>
		</div>
	</div>
    </div>
</div>

<script>
	$(document).ready(function(){
    $('#hotel_admin').addClass('active');
});
$(document).ready(function(){
    $('#includes').addClass('active');

    $('.include_status').change(function() {
   
       var id=$(this).attr('id');
       
        if($(this).is(":checked")) {
        
           $status=1;
            
        }
        else{
          $status=0;
        }
       $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                  }
              });
         jQuery.ajax({
                  url: "{{ url('/include-status') }}",
                  method: 'post',
                  data: {
                     status:$status,
                       include_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
          });
           
    });
</script>

<script>
    
    $( "#sortable" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {

      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });

      $.ajax({
        type: "GET", 
        dataType: "json", 
        url: "{{ route('include-sort') }}",
        data: {
           order: order,
          _token: token
        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });
    }
</script>


@endsection
