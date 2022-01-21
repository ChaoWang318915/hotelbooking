@extends('layouts.backend')
@section('content')

<div class="d-flex">
	<div class="main-sidebar"></div>
    <div class="content-area">
        <nav class="content-menu">
          	<ul class="nav">
          		<?php $hid=request()->route('id');?>
            	<li><a href="{{url('/hotel-edit',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
            	<li><a href="{{url('/add-restaurants',$hid)}}"><span class="fas fa-plus"></span>add a restaurant or bar</a></li>
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
         
        	<div class=" content-rest">

        	<!-- <div class="restaurants-tabs">
				<ul>
					<li class="active"><a href="{{url('/restaurants-bars-overview',$hid)}}">Restaurant</a></li>
					<li><a href="{{url('/bar-overview',$hid)}}">Bar</a></li>
					<li><a href="{{url('/menuplan-overview',$hid)}}">Menuplan</a></li>
				</ul>
			</div> -->
			<div class="hotel-admin">
			<table class="hotel-admin-table">
				<thead>
					<tr>
						<th>No.</th>
						<!-- <th>ID</th> -->
						<th>Restaurant , Bars & Menuplan Name</th>
						<th>Category</th>
						<th> </th>
						<th> </th>
						<th> </th>
						<th>Offline/On</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@php
					$index = 1;
					@endphp
					@foreach($restBar as $rb)
					<tr class="" data-href="">
						<td>{{$index}}</td>
						<!-- <td>{{$rb->id}}</td> -->
						<td>
							@if ($rb->category === 'Restaurnts')
							<a href="{{route('restaurant-edit',[$hid,$rb->id])}}">{{ $rb->restaurant_name }}</a>
							@endif

							@if ($rb->category === 'Bar')
							<a href="{{route('bar-edit',[$hid,$rb->id])}}">{{ $rb->bar_name }}</a>
							@endif

							@if ($rb->category === 'Menuplan')
							<a href="{{route('menuplan-edit',[$hid,$rb->id])}}">{{ $rb->menuplan_name1 }}</a>
							@endif
						</td>
						<td>{{$rb->category}}</td>
						<td> </td>
						<td> </td>
						<td> </td>
						<td> <label class="switch">
                <?php if($rb->rest_status==1){ ?>
                	@if ($rb->category === 'Restaurnts')
               			<input type="checkbox" class="rest_status" id="{{$rb->id}}" checked>
               		@endif
               		@if ($rb->category === 'Bar')
               			<input type="checkbox" class="bar_status" id="{{$rb->id}}" checked>
               		@endif
               		@if ($rb->category === 'Menuplan')
               			<input type="checkbox" class="menuplan_status" id="{{$rb->id}}" checked>
               		@endif	
               <?php } else{ ?>
               		@if ($rb->category === 'Restaurnts')
               			<input type="checkbox" class="rest_status" id="{{$rb->id}}">
               		@endif
               		@if ($rb->category === 'Bar')
               			<input type="checkbox" class="bar_status" id="{{$rb->id}}">
               		@endif
               		@if ($rb->category === 'Menuplan')
               			<input type="checkbox" class="menuplan_status" id="{{$rb->id}}">
               		@endif	
               
               <?php }?>
                   <span class="slider round"></span>
                </label></td>
				</span></td>
						<td class="btn-holder">
							@if ($rb->category === 'Restaurnts')
								<a onclick="return confirm('Are you sure?')" href="{{route('restaurant-delete',['id'=>$hid,'tid'=>$rb->id])}}" class="btn-delete">
									<span class="far fa-trash-alt"></span>
									<span>Delete</span>
								</a>
							@endif
               				@if ($rb->category === 'Bar')
               					<a onclick="return confirm('Are you sure?')" href="{{route('bar-delete',['id'=>$hid,'tid'=>$rb->id])}}" class="btn-delete">
									<span class="far fa-trash-alt"></span>
									<span>Delete</span>
								</a>
               				@endif
               				@if ($rb->category === 'Menuplan')
               					<a onclick="return confirm('Are you sure?')" href="{{route('menuplan-delete',['id'=>$hid,'tid'=>$rb->id])}}" class="btn-delete">
									<span class="far fa-trash-alt"></span>
									<span>Delete</span>
								</a>
               				@endif
							
						</td>
					</tr>
					@php
						$index++;
					@endphp
					@endforeach
				
					<!-- <tr class="row-link" data-href="http://ww.google.com">
						<td>2</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="toggle-off fas fa-toggle-on first-click"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>3</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>4</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>5</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>6</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>7</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>8</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>9</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>10</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr>

					<tr class="row-link" data-href="http://ww.google.com">
						<td>11</td>
						<td>312873</td>
						<td>Aarahveli Maldives</td>
						<td></td>
						<td></td>
						<td> </td>
						<td></td>
						<td><span class="fas fa-toggle-on"></span></td>
						<td class="btn-holder">
							<a href="#" class="btn-delete">
								<span class="far fa-trash-alt"></span>
								<span>Delete</span>
							</a>
						</td>
					</tr> -->

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
    $('#rest_bar').addClass('active');


$('.rest_status').change(function() {
   
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
                  url: "{{ url('/restaurant-status') }}",
                  method: 'post',
                  data: {
                     rest_status:$status,
                       rest_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });


$('.bar_status').change(function() {
   
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
                  url: "{{ url('/bar-status') }}",
                  method: 'post',
                  data: {
                     rest_status:$status,
                       rest_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });


$('.menuplan_status').change(function() {
   
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
                  url: "{{ url('/menuplan-status') }}",
                  method: 'post',
                  data: {
                     rest_status:$status,
                       rest_id: id
                  },
                  success: function(result){
                     console.log(result);
                  }});
           
    });
});

</script>
<script>
$(document).ready(function(){
    $('#rest_bar').addClass('active');
});
</script>

@endsection
